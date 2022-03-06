<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NoticeItems extends Model
{
    protected $table = 'notice_items';
    protected $fillable = [
        'title',
        'icon',
        'image',
        'description',
        'video_url',
        'status',
        'notice_id'
    ];
    public function notice()
    {
        return $this->belongsTo(Notice::class, 'notice_id');
    }
    protected $appends = ['file_url'];
    public function getFileUrlAttribute()
    {
        return asset('').'files/images/notices/'. $this->image;
    }
}
