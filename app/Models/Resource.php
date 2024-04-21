<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function resources_paid()
    {
        return $this->hasMany(ResourcesPaid::class);
    }
    

    // public function setDescriptionAttribute($value)
    // {
    //     $this->attributes['description'] = strlen($value) > 100 ? substr($value, 0, 100) . '...' : $value;
    // }
    public function getDescriptionAttribute($value)
    {
        return strlen($value) > 100 ? substr($value, 0, 100) . '...' : $value;
    }

}
