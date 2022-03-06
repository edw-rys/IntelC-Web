<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScheduleType extends Model
{
    protected $table = 'schedule_types';
    protected $fillable = [
        'title',
        'status',
    ];
    public function items()
    {
        return $this->hasMany(Schedule::class, 'schedule_type_id');
    }
}
