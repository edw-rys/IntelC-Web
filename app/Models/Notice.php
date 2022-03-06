<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    // Alojamiento
    protected $table = 'notice';
    protected $fillable = [
        'title',
        'address',
        'phone',
        'website',
        'email',
        'icon',
        'image',
        'background',
        'description',
        'video_url',
        'content',
        'status',
    ];
    public function items()
    {
        return $this->hasMany(NoticeItems::class, 'notice_id')->where('status', 'active');
    }

    protected $appends = ['file_url', 'format_date'];
    public function getFileUrlAttribute()
    {
        return asset('').'files/images/notices/'. $this->image;
    }

    public function getFormatDateAttribute()
    {
        // setlocale(LC_ALL, 'es_MX');
        setlocale(LC_ALL,"es_ES");
        return $this->created_at->day.'/'. months()[$this->created_at->month -1 ] .'/' .$this->created_at->year; 
    }
}
