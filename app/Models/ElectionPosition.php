<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElectionPosition extends Model
{
    use HasFactory;
    protected $guarded = [];

    
    public function candidates()
    {
        return $this->hasMany(ElectionCandidate::class, 'position_id');
    }


    public function academicSession()
    {
        return $this->belongsTo(academicSession::class, 'academic_session');
    }
}
