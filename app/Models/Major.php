<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Major extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'majors';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'faculty_name',
        'major_name',
        'degree',
        'weight_r',
        'weight_i',
        'weight_a',
        'weight_s',
        'weight_e',
        'weight_c',
        'description',
        'career_prospects',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'weight_r' => 'integer',
        'weight_i' => 'integer',
        'weight_a' => 'integer',
        'weight_s' => 'integer',
        'weight_e' => 'integer',
        'weight_c' => 'integer',
    ];

    /**
     * Assessment results where this major is Top 1 recommendation.
     */
    public function top1AssessmentResults(): HasMany
    {
        return $this->hasMany(AssessmentResult::class, 'top_1_major_id');
    }

    /**
     * Assessment results where this major is Top 2 recommendation.
     */
    public function top2AssessmentResults(): HasMany
    {
        return $this->hasMany(AssessmentResult::class, 'top_2_major_id');
    }

    /**
     * Assessment results where this major is Top 3 recommendation.
     */
    public function top3AssessmentResults(): HasMany
    {
        return $this->hasMany(AssessmentResult::class, 'top_3_major_id');
    }

    /**
     * Get RIASEC vector array.
     */
    public function getRiasecVector(): array
    {
        return [
            'R' => (float) $this->weight_r,
            'I' => (float) $this->weight_i,
            'A' => (float) $this->weight_a,
            'S' => (float) $this->weight_s,
            'E' => (float) $this->weight_e,
            'C' => (float) $this->weight_c,
        ];
    }
}
