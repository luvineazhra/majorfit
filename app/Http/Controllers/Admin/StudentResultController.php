<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AssessmentResult;
use App\Models\Major;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StudentResultController extends Controller
{
    /**
     * Display a listing of completed student RIASEC assessments.
     */
    public function index(Request $request): View
    {
        $search = $request->query('search');
        $majorId = $request->query('major_id');
        $dateFrom = $request->query('date_from');
        $dateTo = $request->query('date_to');

        $query = AssessmentResult::with(['top1Major', 'top2Major', 'top3Major']);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_maba', 'like', "%{$search}%")
                  ->orWhere('email_maba', 'like', "%{$search}%")
                  ->orWhere('no_wa', 'like', "%{$search}%")
                  ->orWhere('asal_sekolah', 'like', "%{$search}%")
                  ->orWhere('id', 'like', "%{$search}%");
            });
        }

        if ($majorId) {
            $query->where('top_1_major_id', $majorId);
        }

        if ($dateFrom) {
            $query->whereDate('completed_at', '>=', $dateFrom);
        }

        if ($dateTo) {
            $query->whereDate('completed_at', '<=', $dateTo);
        }

        $results = $query->latest('completed_at')->paginate(15)->withQueryString();

        $majors = Major::orderBy('major_name')->get();
        $totalResults = AssessmentResult::count();
        $uniqueUsersCount = AssessmentResult::distinct('email_maba')->count('email_maba');

        return view('admin.results.index', compact(
            'results',
            'majors',
            'search',
            'majorId',
            'dateFrom',
            'dateTo',
            'totalResults',
            'uniqueUsersCount'
        ));
    }

    /**
     * Display the specified assessment result detail.
     */
    public function show(AssessmentResult $result): View|JsonResponse
    {
        $result->load(['top1Major', 'top2Major', 'top3Major']);

        if (request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'result' => $result,
                'holland_code' => $result->getHollandCode(3),
            ]);
        }

        return view('admin.results.show', compact('result'));
    }

    /**
     * Remove the specified assessment result from storage.
     */
    public function destroy(Request $request, AssessmentResult $result): RedirectResponse|JsonResponse
    {
        $id = $result->id;
        $mabaName = $result->nama_maba ?: 'Maba #' . $id;

        $result->delete();

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => "Data hasil tes #{$id} ({$mabaName}) berhasil dihapus.",
            ]);
        }

        return redirect()->route('admin.results.index')
            ->with('success', "Data hasil tes #{$id} ({$mabaName}) berhasil dihapus dari sistem.");
    }
}
