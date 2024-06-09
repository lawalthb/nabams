<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
