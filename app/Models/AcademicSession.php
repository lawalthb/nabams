<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicSession extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function electionPosition()
    {
        return $this->hasMany(ElectionPosition::class);
    }

}
