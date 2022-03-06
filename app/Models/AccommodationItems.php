<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccommodationItems extends Model
{
    protected $table = 'accommodation_items';
    protected $fillable = [
        'icon',
        'image',
        'description',
        'video_url',
        'status',
        'accommodation_id'
    ];
    public function service()
    {
        return $this->belongsTo(Accommodation::class, 'accommodation_id');
    }
    protected $appends = ['file_url'];
    public function getFileUrlAttribute()
    {
        return asset('').'files/images/accommodations/'. $this->image;
    }
}
