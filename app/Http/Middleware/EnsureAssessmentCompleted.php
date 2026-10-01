<?php

namespace App\Http\Middleware;

use App\Models\AssessmentResult;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureAssessmentCompleted
{
    /**
     * Handle an incoming request for the assessment result page.
     *
     * Protects /hasil-rekomendasi so only users with an active completed assessment can view it.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $resultId = session('current_result_id') ?? session('latest_assessment_id');

        if (!$resultId) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Halaman Hasil Rekomendasi terkunci. Silakan isi Data Diri dan selesaikan tes asesmen RIASEC terlebih dahulu.',
                ], 403);
            }

            return redirect()->route('start-test')
                ->with('info', 'Halaman Hasil Rekomendasi terkunci. Silakan isi Data Diri dan selesaikan tes asesmen RIASEC terlebih dahulu.');
        }

        $assessment = AssessmentResult::find($resultId);

        if (!$assessment || $assessment->status !== 'completed') {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Halaman Hasil Rekomendasi terkunci. Silakan selesaikan seluruh 24 pertanyaan asesmen terlebih dahulu.',
                ], 403);
            }

            return redirect()->route('start-test')
                ->with('info', 'Halaman Hasil Rekomendasi terkunci. Silakan selesaikan seluruh 24 pertanyaan asesmen terlebih dahulu.');
        }

        return $next($request);
    }
}
