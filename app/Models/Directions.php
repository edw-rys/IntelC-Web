<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Directions extends Model
{
    protected $table = 'direcctions';
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
        return $this->hasMany(DirectionsItems::class, 'direction_id')->where('status', 'active');
    }
    protected $appends = ['file_url'];
    public function getFileUrlAttribute()
    {
        return asset('').'files/images/directions/'. $this->image;
    }
}
