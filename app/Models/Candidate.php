<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    // use HasFactory;

    protected $fillable = [
        'user_id',
        // Information
        'birthday',
        'address',
        'about',
        // Skill
        'skill_id',
        'skill',
        // Other
        'education',
        'certificate',
        'experience',
        // Agreement
        'tos',
        // Status
        'submitted_at',
        'approved_at',
        'rejected_at',
    ];

    protected $casts = [
        'birthday' => 'date',
        'address' => 'array',
        'skill' => 'array',
        'education' => 'array',
        'certificate' => 'array',
        'experience' => 'array',
        'submitted_at' => 'datetime',
        'approved_at' => 'datetime',
        'rejected_at' => 'datetime',
    ];

    public function main_skill()
    {
        return $this->hasOne(SkillList::class, 'id', 'skill_id');
    }

    public function unlocked()
    {
        return $this->hasOne(CandidateUnlock::class, 'candidate_id', 'id')->where('mitra_id', auth()->user()->partner->id);
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function jobCandidate()
    {
        if (!empty(auth()->user()->partner->id)) {
            return $this->hasOne(jobCandidate::class, 'candidate_id', 'id')->where('mitra_id', auth()->user()->partner->id);
        } else {
            return $this->hasOne(jobCandidate::class, 'candidate_id', 'id');
        }
    }
}
