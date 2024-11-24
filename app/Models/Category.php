<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];
 
    public function resources()
    {
        return $this->hasMany(Resource::class);
    }

    //laravel code to relate users table to categories table
    
}

