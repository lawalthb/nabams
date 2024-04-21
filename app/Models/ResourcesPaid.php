<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourcesPaid extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function resources()
    {
        return $this->belongsTo(Resource::class, 'resources_id');
    }


}
