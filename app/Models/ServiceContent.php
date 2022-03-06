<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceContent extends Model
{
    protected $table = 'service_content';
    protected $fillable = [
        'icon',
        'image',
        'description',
        'video_url',
        'status',
        'service_id'
    ];
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
    protected $appends = ['file_url'];
    public function getFileUrlAttribute()
    {
        return asset('').'files/images/services/'. $this->image;
    }
}
