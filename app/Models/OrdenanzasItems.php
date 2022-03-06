<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdenanzasItems extends Model
{
    protected $table = 'ordenanzas_items';
    protected $fillable = [
        'icon',
        'image',
        'description',
        'video_url',
        'status',
        'ordenanzas_id',
    ];
    public function ordenanza()
    {
        return $this->belongsTo(Ordenanzas::class, 'ordenanzas_id');
    }
}
