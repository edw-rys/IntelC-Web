<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ordenanzas extends Model
{
    protected $table = 'ordenanzas';
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
        return $this->hasMany(OrdenanzasItems::class, 'ordenanzas_id');
    }
}
