<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Major;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MajorController extends Controller
{
    /**
     * Display a listing of all 21 UBSI majors sorted by faculty.
     */
    public function index(Request $request): View
    {
        $faculty = $request->query('faculty');
        $degree = $request->query('degree');
        $search = $request->query('search');

        $query = Major::query();

        if ($faculty) {
            $query->where('faculty_name', $faculty);
        }

        if ($degree) {
            $query->where('degree', $degree);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('major_name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('career_prospects', 'like', "%{$search}%");
            });
        }

        // Ordered by faculty, then degree (S1 first, then D3), then major name
        $majors = $query->orderBy('faculty_name')
            ->orderBy('degree', 'desc')
            ->orderBy('major_name')
            ->get();

        // Get distinct faculties for filter dropdown
        $faculties = Major::select('faculty_name')
            ->distinct()
            ->orderBy('faculty_name')
            ->pluck('faculty_name');

        // Counts per faculty
        $facultyCounts = Major::selectRaw('faculty_name, count(*) as count')
            ->groupBy('faculty_name')
            ->pluck('count', 'faculty_name')
            ->toArray();

        $totalMajors = Major::count();

        return view('admin.majors.index', compact(
            'majors',
            'faculties',
            'facultyCounts',
            'faculty',
            'degree',
            'search',
            'totalMajors'
        ));
    }

    /**
     * Show the form for editing the specified major.
     */
    public function edit(Major $major): View|JsonResponse
    {
        if (request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'major' => $major,
            ]);
        }

        return view('admin.majors.edit', compact('major'));
    }

    /**
     * Update the specified major in storage.
     */
    public function update(Request $request, Major $major): RedirectResponse|JsonResponse
    {
        $validated = $request->validate([
            'description' => ['required', 'string', 'min:20'],
            'career_prospects' => ['nullable', 'string'],
            'weight_r' => ['required', 'integer', 'min:0', 'max:100'],
            'weight_i' => ['required', 'integer', 'min:0', 'max:100'],
            'weight_a' => ['required', 'integer', 'min:0', 'max:100'],
            'weight_s' => ['required', 'integer', 'min:0', 'max:100'],
            'weight_e' => ['required', 'integer', 'min:0', 'max:100'],
            'weight_c' => ['required', 'integer', 'min:0', 'max:100'],
        ], [
            'description.required' => 'Deskripsi program studi wajib diisi.',
            'description.min' => 'Deskripsi program studi minimal 20 karakter.',
            'weight_r.between' => 'Bobot Realistic harus berada dalam rentang 0-100.',
            'weight_i.between' => 'Bobot Investigative harus berada dalam rentang 0-100.',
            'weight_a.between' => 'Bobot Artistic harus berada dalam rentang 0-100.',
            'weight_s.between' => 'Bobot Social harus berada dalam rentang 0-100.',
            'weight_e.between' => 'Bobot Enterprising harus berada dalam rentang 0-100.',
            'weight_c.between' => 'Bobot Conventional harus berada dalam rentang 0-100.',
        ]);

        $major->update([
            'description' => trim($validated['description']),
            'career_prospects' => trim($validated['career_prospects'] ?? ''),
            'weight_r' => (int) $validated['weight_r'],
            'weight_i' => (int) $validated['weight_i'],
            'weight_a' => (int) $validated['weight_a'],
            'weight_s' => (int) $validated['weight_s'],
            'weight_e' => (int) $validated['weight_e'],
            'weight_c' => (int) $validated['weight_c'],
        ]);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Bobot vektor RIASEC dan informasi Program Studi ' . $major->major_name . ' berhasil diperbarui.',
                'major' => $major,
            ]);
        }

        return redirect()->route('admin.majors.index')
            ->with('success', 'Bobot vektor RIASEC dan informasi Program Studi ' . $major->major_name . ' (' . $major->degree . ') berhasil disimpan.');
    }
}
