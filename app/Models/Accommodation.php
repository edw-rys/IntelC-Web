<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    // Alojamiento
    protected $table = 'accommodation';
    protected $fillable = [
        'title',
        'short_description',
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
        return $this->hasMany(AccommodationItems::class, 'accommodation_id')->where('status', 'active');
    }

    protected $appends = ['file_url'];
    public function getFileUrlAttribute()
    {
        return asset('').'files/images/accommodations/'. $this->image;
    }
}
