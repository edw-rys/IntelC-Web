<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'gallery';
    protected $fillable = [
        'title',
        'icon',
        'image',
        'short_description',
    ];
    protected $appends = ['file_url'];
    public function getFileUrlAttribute()
    {
        return asset('').'files/images/gallery/'. $this->image;
    }
}
