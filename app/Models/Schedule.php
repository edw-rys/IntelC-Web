<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedule';
    protected $fillable = [
        'icon',
        'title',
        'image',
        'start_date',
        'end_date',
        'location',
        'number_seats',
        'available_seats',
        'phone',
        'email',
        'website',
        'commet',
        'description',
        'status',
        'schedule_type_id',
    ];
    public function type()
    {
        return $this->belongsTo(ScheduleType::class, 'schedule_type_id');
    }
    public function participants()
    {
        return $this->hasMany(ScheduleParticipants::class, 'schedule_id')->where('status', 'active');
    }
    protected $dates =['start_date'];
    protected $appends = ['file_url'];
    public function getFileUrlAttribute()
    {
        return asset('').'files/images/schedule/'. $this->image;
    }
}
