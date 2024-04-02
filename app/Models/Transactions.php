<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;

    protected $guarded = [];


    // Format paid date
    public function getPaidAtAttribute($value)
    {
        $date = Carbon::parse($value);
        return $date->format('d F Y');
    }
}
