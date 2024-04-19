<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContestantCandidate extends Model
{
    use HasFactory;
    protected $guarded = [];

    
    public function position()
    {
        return $this->belongsTo(ContestantPosition::class, 'position_id');
    }

    public function academicSession()
    {
        return $this->belongsTo(academicSession::class, 'academic_session');
    }

   
}
