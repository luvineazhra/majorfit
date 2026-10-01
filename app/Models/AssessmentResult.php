<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AssessmentResult extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'assessment_results';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_maba',
        'email_maba',
        'no_wa',
        'asal_sekolah',
        'tahun_lulus',
        'status',
        'score_r',
        'score_i',
        'score_a',
        'score_s',
        'score_e',
        'score_c',
        'top_1_major_id',
        'top_2_major_id',
        'top_3_major_id',
        'ai_explanation',
        'started_at',
        'completed_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'score_r' => 'float',
        'score_i' => 'float',
        'score_a' => 'float',
        'score_s' => 'float',
        'score_e' => 'float',
        'score_c' => 'float',
        'started_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    /**
     * Top 1 Recommended Major.
     */
    public function top1Major(): BelongsTo
    {
        return $this->belongsTo(Major::class, 'top_1_major_id');
    }

    /**
     * Top 2 Recommended Major.
     */
    public function top2Major(): BelongsTo
    {
        return $this->belongsTo(Major::class, 'top_2_major_id');
    }

    /**
     * Top 3 Recommended Major.
     */
    public function top3Major(): BelongsTo
    {
        return $this->belongsTo(Major::class, 'top_3_major_id');
    }

    /**
     * Get Holland 2-letter or 3-letter primary Code (e.g. "IC" or "RIA").
     */
    public function getHollandCode(int $letters = 2): string
    {
        $scores = [
            'R' => (float) $this->score_r,
            'I' => (float) $this->score_i,
            'A' => (float) $this->score_a,
            'S' => (float) $this->score_s,
            'E' => (float) $this->score_e,
            'C' => (float) $this->score_c,
        ];

        arsort($scores);
        return implode('', array_slice(array_keys($scores), 0, $letters));
    }
}
