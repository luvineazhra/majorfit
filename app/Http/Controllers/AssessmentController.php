<?php

namespace App\Http\Controllers;

use App\Models\AssessmentResult;
use App\Models\Major;
use App\Services\AssessmentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AssessmentController extends Controller
{
    protected AssessmentService $assessmentService;

    public function __construct(AssessmentService $assessmentService)
    {
        $this->assessmentService = $assessmentService;
    }

    /**
     * Show standalone Candidate Form Data Diri page (GET /mulai-tes).
     */
    public function showCandidateForm(): View
    {
        $mabaData = [
            'nama_maba' => '',
            'email_maba' => '',
            'no_wa' => '',
            'asal_sekolah' => '',
            'tahun_lulus' => '',
        ];

        return view('pages.candidate-form', compact('mabaData'));
    }

    /**
     * Store candidate data & initialize a new Assessment in database with status 'in_progress' (POST /mulai-tes).
     */
    public function storeCandidateInfo(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'nama_maba' => ['required', 'string', 'min:2', 'max:100'],
            'email_maba' => ['required', 'email', 'max:100'],
            'no_wa' => ['required', 'string', 'min:8', 'max:30'],
            'asal_sekolah' => ['required', 'string', 'min:2', 'max:100'],
            'tahun_lulus' => ['required', 'string', 'max:10'],
        ], [
            'nama_maba.required' => 'Nama lengkap Maba wajib diisi.',
            'nama_maba.min' => 'Nama lengkap minimal 2 karakter.',
            'email_maba.required' => 'Email Maba wajib diisi.',
            'email_maba.email' => 'Format email Maba tidak valid.',
            'no_wa.required' => 'Nomor WhatsApp / HP wajib diisi.',
            'asal_sekolah.required' => 'Asal sekolah Maba wajib diisi.',
            'tahun_lulus.required' => 'Tahun lulus wajib dipilih.',
        ]);

        $candidateData = [
            'nama_maba' => trim($validated['nama_maba']),
            'email_maba' => trim($validated['email_maba']),
            'no_wa' => trim($validated['no_wa']),
            'asal_sekolah' => trim($validated['asal_sekolah']),
            'tahun_lulus' => trim($validated['tahun_lulus']),
        ];

        // Create new assessment record in DB with status = 'in_progress'
        $assessmentResult = AssessmentResult::create([
            'nama_maba' => $candidateData['nama_maba'],
            'email_maba' => $candidateData['email_maba'],
            'no_wa' => $candidateData['no_wa'],
            'asal_sekolah' => $candidateData['asal_sekolah'],
            'tahun_lulus' => $candidateData['tahun_lulus'],
            'status' => 'in_progress',
            'started_at' => now(),
        ]);

        // Reset previous test completion keys so new test starts fresh & locks /hasil-rekomendasi
        session()->forget(['current_result_id', 'latest_assessment_id', 'latest_assessment_result']);

        // Save candidate data & active assessment ID to session
        session([
            'maba_data' => $candidateData,
            'active_assessment_id' => $assessmentResult->id,
        ]);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Data Maba berhasil disimpan. Selamat mengerjakan asesmen!',
                'redirect_url' => route('assessment'),
                'assessment_id' => $assessmentResult->id,
            ]);
        }

        return redirect()->route('assessment')
            ->with('success', 'Data Maba berhasil disimpan ke database. Silakan jawab seluruh 24 pertanyaan RIASEC!');
    }

    /**
     * Show assessment questionnaire page (GET /tes-riasec).
     * Strictly requires session('maba_data') and session('active_assessment_id').
     */
    public function showAssessment(): View|RedirectResponse
    {
        if (!session()->has('maba_data') || !session()->has('active_assessment_id')) {
            return redirect()->route('start-test')
                ->with('info', 'Silakan isi Form Data Diri terlebih dahulu sebelum memulai Asesmen RIASEC.');
        }

        $mabaData = session('maba_data');
        $hasCandidateData = true;

        return view('pages.assessment', compact('hasCandidateData', 'mabaData'));
    }

    /**
     * Process RIASEC submission, update assessment_results status to 'completed', and store current_result_id in Session.
     */
    public function calculate(Request $request): JsonResponse
    {
        $request->validate([
            'answers' => ['required', 'array'],
        ], [
            'answers.required' => 'Jawaban kuesioner tidak boleh kosong.',
        ]);

        $answers = $request->input('answers', []);
        $scores = $this->assessmentService->calculateScores($answers);
        $matches = $this->assessmentService->calculateMatches($scores);
        $diagnosis = $this->assessmentService->generateDiagnosis($scores, $matches);

        // Fetch candidate details & active assessment ID from session
        $mabaData = session('maba_data', []);
        $activeAssessmentId = session('active_assessment_id');

        $top1 = $matches[0]['id'] ?? null;
        $top2 = $matches[1]['id'] ?? null;
        $top3 = $matches[2]['id'] ?? null;

        $assessmentResult = null;
        if ($activeAssessmentId) {
            $assessmentResult = AssessmentResult::find($activeAssessmentId);
        }

        if ($assessmentResult) {
            // Update existing in_progress assessment to completed
            $assessmentResult->update([
                'score_r' => $scores['R'],
                'score_i' => $scores['I'],
                'score_a' => $scores['A'],
                'score_s' => $scores['S'],
                'score_e' => $scores['E'],
                'score_c' => $scores['C'],
                'top_1_major_id' => $top1,
                'top_2_major_id' => $top2,
                'top_3_major_id' => $top3,
                'ai_explanation' => $diagnosis['summary'],
                'status' => 'completed',
                'completed_at' => now(),
            ]);
        } else {
            // Fallback if session expired or lost
            $assessmentResult = AssessmentResult::create([
                'nama_maba' => $mabaData['nama_maba'] ?? 'Calon Maba',
                'email_maba' => $mabaData['email_maba'] ?? 'maba@example.com',
                'no_wa' => $mabaData['no_wa'] ?? null,
                'asal_sekolah' => $mabaData['asal_sekolah'] ?? null,
                'tahun_lulus' => $mabaData['tahun_lulus'] ?? date('Y'),
                'status' => 'completed',
                'score_r' => $scores['R'],
                'score_i' => $scores['I'],
                'score_a' => $scores['A'],
                'score_s' => $scores['S'],
                'score_e' => $scores['E'],
                'score_c' => $scores['C'],
                'top_1_major_id' => $top1,
                'top_2_major_id' => $top2,
                'top_3_major_id' => $top3,
                'ai_explanation' => $diagnosis['summary'],
                'completed_at' => now(),
            ]);
        }

        // Store completed result ID & payload in Session
        session([
            'current_result_id' => $assessmentResult->id,
            'latest_assessment_id' => $assessmentResult->id,
            'latest_assessment_result' => $assessmentResult,
        ]);

        return response()->json([
            'success' => true,
            'redirect_url' => route('result'),
            'result_id' => $assessmentResult->id,
            'scores' => $scores,
            'matches' => $matches,
            'diagnosis' => $diagnosis,
        ]);
    }

    /**
     * Show result recommendation page (Protected by EnsureAssessmentCompleted middleware).
     */
    public function showResult(): View|RedirectResponse
    {
        $resultId = session('current_result_id') ?? session('latest_assessment_id');

        if (!$resultId) {
            return redirect()->route('start-test')
                ->with('info', 'Hasil Rekomendasi terkunci. Silakan isi Data Diri dan selesaikan tes RIASEC terlebih dahulu.');
        }

        $result = AssessmentResult::with(['top1Major', 'top2Major', 'top3Major'])->find($resultId);

        if (!$result || $result->status !== 'completed') {
            session()->forget(['current_result_id', 'latest_assessment_id', 'latest_assessment_result']);
            return redirect()->route('start-test')
                ->with('info', 'Hasil Rekomendasi terkunci. Silakan isi Data Diri dan selesaikan tes RIASEC terlebih dahulu.');
        }

        $allMajors = Major::all();

        return view('pages.result', compact('result', 'allMajors'));
    }

    /**
     * Reset / Forget test session data.
     */
    public function resetSession(Request $request): RedirectResponse|JsonResponse
    {
        session()->forget(['maba_data', 'active_assessment_id', 'current_result_id', 'latest_assessment_id', 'latest_assessment_result']);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Sesi tes berhasil direset.',
                'redirect_url' => route('start-test'),
            ]);
        }

        return redirect()->route('start-test')
            ->with('info', 'Sesi tes berhasil direset. Silakan isi Data Diri calon mahasiswa baru untuk memulai tes ulang.');
    }
}
