<?php

namespace App\Services;

use App\Models\Major;

class AssessmentService
{
    /**
     * Standard mapping of question numbers to RIASEC dimensions.
     * Q1-4: R, Q5-8: I, Q9-12: A, Q13-16: S, Q17-20: E, Q21-24: C
     */
    protected array $dimensionMap = [
        'R' => [1, 2, 3, 4],
        'I' => [5, 6, 7, 8],
        'A' => [9, 10, 11, 12],
        'S' => [13, 14, 15, 16],
        'E' => [17, 18, 19, 20],
        'C' => [21, 22, 23, 24],
    ];

    /**
     * Calculate 6-dimensional RIASEC trait scores (0-100 scale) from raw Likert answers (1-5).
     *
     * @param array<int|string, int|float> $answers Array of [question_id => score_1_to_5]
     * @return array<string, float> Array of ['R' => float, 'I' => float, ...]
     */
    public function calculateScores(array $answers): array
    {
        $scores = [
            'R' => 0.0,
            'I' => 0.0,
            'A' => 0.0,
            'S' => 0.0,
            'E' => 0.0,
            'C' => 0.0,
        ];

        foreach ($this->dimensionMap as $dimension => $questionIds) {
            $sum = 0;
            $count = count($questionIds);

            foreach ($questionIds as $qid) {
                // If answer exists, take value (clamped between 1 and 5), default to 0.0
                $val = isset($answers[$qid]) ? (float) $answers[$qid] : 0.0;
                $sum += max(1.0, min(5.0, $val));
            }

            // Scale to 0 - 100 percentage (each item is 1 to 5, max raw sum is 20)
            $maxRaw = $count * 5.0; // 20.0
            $percentage = round(($sum / $maxRaw) * 100, 1);
            $scores[$dimension] = $percentage;
        }

        return $scores;
    }

    /**
     * Calculate Euclidean Distance & Match Percentage against all majors in the database.
     *
     * Distance = sqrt( (Ru - Rj)^2 + (Iu - Ij)^2 + (Au - Aj)^2 + (Su - Sj)^2 + (Eu - Ej)^2 + (Cu - Cj)^2 )
     * Match Rate = max(0, round(100 - (Distance / 2.45)))
     *
     * @param array<string, float> $userScores
     * @param iterable|null $majors
     * @return array Ranked majors sorted by match_rate descending
     */
    public function calculateMatches(array $userScores, $majors = null): array
    {
        if ($majors === null) {
            $majors = Major::all();
        }

        $results = [];

        foreach ($majors as $major) {
            $rUser = $userScores['R'] ?? 0;
            $iUser = $userScores['I'] ?? 0;
            $aUser = $userScores['A'] ?? 0;
            $sUser = $userScores['S'] ?? 0;
            $eUser = $userScores['E'] ?? 0;
            $cUser = $userScores['C'] ?? 0;

            $rMajor = (float) $major->weight_r;
            $iMajor = (float) $major->weight_i;
            $aMajor = (float) $major->weight_a;
            $sMajor = (float) $major->weight_s;
            $eMajor = (float) $major->weight_e;
            $cMajor = (float) $major->weight_c;

            // Euclidean Distance formula in 6D
            $distance = sqrt(
                pow($rUser - $rMajor, 2) +
                pow($iUser - $iMajor, 2) +
                pow($aUser - $aMajor, 2) +
                pow($sUser - $sMajor, 2) +
                pow($eUser - $eMajor, 2) +
                pow($cUser - $cMajor, 2)
            );

            // Match Rate normalized by max Euclidean distance (~244.95)
            $matchRate = max(0, (int) round(100 - ($distance / 2.45)));

            $results[] = [
                'id' => $major->id,
                'major_name' => $major->major_name,
                'faculty_name' => $major->faculty_name,
                'degree' => $major->degree,
                'weights' => [
                    'R' => $rMajor,
                    'I' => $iMajor,
                    'A' => $aMajor,
                    'S' => $sMajor,
                    'E' => $eMajor,
                    'C' => $cMajor,
                ],
                'distance' => round($distance, 2),
                'match_rate' => $matchRate,
                'description' => $major->description,
                'career_prospects' => $major->career_prospects,
            ];
        }

        // Sort descending by match_rate (and ascending by distance in tiebreak)
        usort($results, function ($a, $b) {
            if ($b['match_rate'] === $a['match_rate']) {
                return $a['distance'] <=> $b['distance'];
            }
            return $b['match_rate'] <=> $a['match_rate'];
        });

        return $results;
    }

    /**
     * Generate dynamic Holland code and personalized diagnosis.
     */
    public function generateDiagnosis(array $userScores, array $topMatches): array
    {
        // Sort traits descending to get Holland Code
        $sortedScores = $userScores;
        arsort($sortedScores);

        $keys = array_keys($sortedScores);
        $topDim1 = $keys[0];
        $topDim2 = $keys[1];
        $hollandCode = $topDim1 . $topDim2;

        $dimNames = [
            'R' => 'Realistic (Praktikal & Teknis)',
            'I' => 'Investigative (Analitis & Riset)',
            'A' => 'Artistic (Kreatif & Ekspresif)',
            'S' => 'Social (Sosial & Pelayanan)',
            'E' => 'Enterprising (Kepemimpinan & Bisnis)',
            'C' => 'Conventional (Terstruktur & Metodis)',
        ];

        $top1Major = $topMatches[0] ?? null;
        $majorTitle = $top1Major ? $top1Major['major_name'] : 'Program Studi UBSI';

        $summary = "Berdasarkan sintesis hasil tes, profil dominanmu adalah {$dimNames[$topDim1]} ({$sortedScores[$topDim1]}%) dan {$dimNames[$topDim2]} ({$sortedScores[$topDim2]}%). Karakter ini menunjukkan potensi optimal saat diterapkan pada studi {$majorTitle}.";

        return [
            'holland_code' => $hollandCode,
            'top_dim_1' => [
                'code' => $topDim1,
                'name' => $dimNames[$topDim1],
                'score' => $sortedScores[$topDim1],
            ],
            'top_dim_2' => [
                'code' => $topDim2,
                'name' => $dimNames[$topDim2],
                'score' => $sortedScores[$topDim2],
            ],
            'summary' => $summary,
            'top_3_majors' => array_slice($topMatches, 0, 3),
        ];
    }
}
