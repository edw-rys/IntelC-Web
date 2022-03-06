<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'service';
    protected $fillable = [
        'title',
        'short_description',
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
        return $this->hasMany(ServiceContent::class, 'service_id')->where('status', 'active');
    }
    protected $appends = ['file_url'];
    public function getFileUrlAttribute()
    {
        return asset('').'files/images/services/'. $this->image;
    }
}
