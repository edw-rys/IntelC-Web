<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DirectionsItems extends Model
{
    protected $table = 'direcctions_items';
    protected $fillable = [
        'icon',
        'image',
        'description',
        'video_url',
        'status',
        'direction_id'
    ];
    public function direction()
    {
        return $this->belongsTo(Service::class, 'direction_id');
    }
    protected $appends = ['file_url'];
    public function getFileUrlAttribute()
    {
        return asset('').'files/images/directions/'. $this->image;
    }
}
