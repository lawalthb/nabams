<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
class SupervisorUser  extends Model
{
    //protected $table = 'supervisor_user';
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function supervisor()
    {
        return $this->belongsTo(Supervisor::class);
    }


}
