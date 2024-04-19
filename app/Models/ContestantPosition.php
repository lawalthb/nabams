<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContestantPosition extends Model
{
    use HasFactory;
    protected $guarded = [];

    
    public function candidates()
    {
        return $this->hasMany(ContestantCandidate::class, 'position_id');
    }


    public function academicSession()
    {
        return $this->belongsTo(academicSession::class, 'academic_session');
    }
}
