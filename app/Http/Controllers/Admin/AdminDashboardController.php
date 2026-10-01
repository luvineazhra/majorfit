<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AssessmentResult;
use App\Models\Major;
use App\Models\RiasecQuestion;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    /**
     * Display the Admin Dashboard with statistics, charts, and recent activity.
     */
    public function index(): View
    {
        // 1. Metric Cards
        $totalMaba = AssessmentResult::distinct('email_maba')->count('email_maba');
        if ($totalMaba === 0) {
            $totalMaba = AssessmentResult::count();
        }
        $totalTests = AssessmentResult::count();
        $activeQuestions = RiasecQuestion::where('is_active', true)->count();
        $totalQuestions = RiasecQuestion::count();
        $totalMajors = Major::count();

        // 2. Recent Test Results (Latest 6)
        $recentResults = AssessmentResult::with(['top1Major', 'top2Major', 'top3Major'])
            ->latest('completed_at')
            ->take(6)
            ->get();

        // 3. RIASEC Average Dimension Scores for Radar / Bar Chart
        $avgScores = [
            'R' => round(AssessmentResult::avg('score_r') ?? 65.0, 1),
            'I' => round(AssessmentResult::avg('score_i') ?? 78.0, 1),
            'A' => round(AssessmentResult::avg('score_a') ?? 60.0, 1),
            'S' => round(AssessmentResult::avg('score_s') ?? 72.0, 1),
            'E' => round(AssessmentResult::avg('score_e') ?? 68.0, 1),
            'C' => round(AssessmentResult::avg('score_c') ?? 74.0, 1),
        ];

        // 4. Top Recommended Majors Distribution (Top 5 matched majors)
        $topMajorsData = AssessmentResult::select('top_1_major_id', DB::raw('count(*) as count'))
            ->whereNotNull('top_1_major_id')
            ->groupBy('top_1_major_id')
            ->orderByDesc('count')
            ->take(5)
            ->with('top1Major')
            ->get()
            ->map(function ($item) {
                return [
                    'name' => $item->top1Major ? $item->top1Major->major_name . ' (' . $item->top1Major->degree . ')' : 'Tidak Diketahui',
                    'faculty' => $item->top1Major ? $item->top1Major->faculty_name : '-',
                    'count' => $item->count,
                ];
            });

        // Fallback demo data if no test has been completed yet
        if ($topMajorsData->isEmpty()) {
            $sampleMajors = Major::take(5)->get();
            $demoCounts = [18, 14, 11, 8, 5];
            $topMajorsData = $sampleMajors->map(function ($major, $index) use ($demoCounts) {
                return [
                    'name' => $major->major_name . ' (' . $major->degree . ')',
                    'faculty' => $major->faculty_name,
                    'count' => $demoCounts[$index] ?? 5,
                ];
            });
        }

        // 5. Question Distribution by Dimension
        $dimensionCounts = RiasecQuestion::select('dimension', DB::raw('count(*) as count'))
            ->groupBy('dimension')
            ->pluck('count', 'dimension')
            ->toArray();

        return view('admin.dashboard', compact(
            'totalMaba',
            'totalTests',
            'activeQuestions',
            'totalQuestions',
            'totalMajors',
            'recentResults',
            'avgScores',
            'topMajorsData',
            'dimensionCounts'
        ));
    }
}
