<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RiasecQuestion;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class QuestionController extends Controller
{
    /**
     * Display a listing of RIASEC questions.
     */
    public function index(Request $request): View
    {
        $dimension = $request->query('dimension');
        $status = $request->query('status');
        $search = $request->query('search');

        $query = RiasecQuestion::query();

        if ($dimension && in_array(strtoupper($dimension), ['R', 'I', 'A', 'S', 'E', 'C'])) {
            $query->where('dimension', strtoupper($dimension));
        }

        if ($status === 'active') {
            $query->where('is_active', true);
        } elseif ($status === 'inactive') {
            $query->where('is_active', false);
        }

        if ($search) {
            $query->where('question_text', 'like', "%{$search}%");
        }

        $questions = $query->orderBy('dimension')
            ->orderBy('id')
            ->get();

        // Dimension Counts
        $dimensionCounts = [
            'R' => RiasecQuestion::where('dimension', 'R')->count(),
            'I' => RiasecQuestion::where('dimension', 'I')->count(),
            'A' => RiasecQuestion::where('dimension', 'A')->count(),
            'S' => RiasecQuestion::where('dimension', 'S')->count(),
            'E' => RiasecQuestion::where('dimension', 'E')->count(),
            'C' => RiasecQuestion::where('dimension', 'C')->count(),
        ];

        $totalActive = RiasecQuestion::where('is_active', true)->count();
        $totalAll = RiasecQuestion::count();

        return view('admin.questions.index', compact(
            'questions',
            'dimension',
            'status',
            'search',
            'dimensionCounts',
            'totalActive',
            'totalAll'
        ));
    }

    /**
     * Store a newly created question in storage.
     */
    public function store(Request $request): RedirectResponse|JsonResponse
    {
        $validated = $request->validate([
            'question_text' => ['required', 'string', 'min:5', 'max:500'],
            'dimension' => ['required', 'string', 'in:R,I,A,S,E,C,r,i,a,s,e,c'],
            'is_active' => ['nullable', 'boolean'],
        ], [
            'question_text.required' => 'Teks butir pertanyaan wajib diisi.',
            'question_text.min' => 'Pertanyaan minimal terdiri dari 5 karakter.',
            'dimension.required' => 'Dimensi RIASEC wajib dipilih.',
            'dimension.in' => 'Dimensi harus salah satu dari R, I, A, S, E, atau C.',
        ]);

        $question = RiasecQuestion::create([
            'question_text' => trim($validated['question_text']),
            'dimension' => strtoupper($validated['dimension']),
            'is_active' => $request->boolean('is_active', true),
        ]);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Pertanyaan RIASEC berhasil ditambahkan.',
                'question' => $question,
            ]);
        }

        return redirect()->route('admin.questions.index', ['dimension' => $question->dimension])
            ->with('success', 'Pertanyaan RIASEC (' . $question->dimension . ') berhasil ditambahkan.');
    }

    /**
     * Update the specified question in storage.
     */
    public function update(Request $request, RiasecQuestion $question): RedirectResponse|JsonResponse
    {
        $validated = $request->validate([
            'question_text' => ['required', 'string', 'min:5', 'max:500'],
            'dimension' => ['required', 'string', 'in:R,I,A,S,E,C,r,i,a,s,e,c'],
            'is_active' => ['nullable', 'boolean'],
        ], [
            'question_text.required' => 'Teks butir pertanyaan wajib diisi.',
            'dimension.required' => 'Dimensi RIASEC wajib dipilih.',
            'dimension.in' => 'Dimensi harus salah satu dari R, I, A, S, E, atau C.',
        ]);

        $question->update([
            'question_text' => trim($validated['question_text']),
            'dimension' => strtoupper($validated['dimension']),
            'is_active' => $request->boolean('is_active', false),
        ]);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Pertanyaan RIASEC berhasil diperbarui.',
                'question' => $question,
            ]);
        }

        return redirect()->route('admin.questions.index')
            ->with('success', 'Pertanyaan #' . $question->id . ' berhasil diperbarui.');
    }

    /**
     * Toggle the active status of a question.
     */
    public function toggleStatus(Request $request, RiasecQuestion $question): RedirectResponse|JsonResponse
    {
        $question->is_active = !$question->is_active;
        $question->save();

        $statusText = $question->is_active ? 'diaktifkan' : 'dinonaktifkan';

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'is_active' => $question->is_active,
                'message' => "Pertanyaan #{$question->id} berhasil {$statusText}.",
            ]);
        }

        return back()->with('success', "Status pertanyaan #{$question->id} berhasil {$statusText}.");
    }

    /**
     * Remove the specified question from storage.
     */
    public function destroy(Request $request, RiasecQuestion $question): RedirectResponse|JsonResponse
    {
        $id = $question->id;
        $dimension = $question->dimension;
        $question->delete();

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => "Pertanyaan #{$id} ({$dimension}) berhasil dihapus.",
            ]);
        }

        return redirect()->route('admin.questions.index')
            ->with('success', "Pertanyaan #{$id} ({$dimension}) berhasil dihapus.");
    }
}
