<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScheduleParticipants extends Model
{
    protected $table = 'schedule_participants';
    protected $fillable = [
        'title',
        'phone',
        'email',
        'cargo',
        'status',
        'schedule_id',
    ];
}
