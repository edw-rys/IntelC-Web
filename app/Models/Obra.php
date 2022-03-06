<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{
    protected $table = 'obra';
    protected $fillable = [
        'title',
        'image',
        'background',
        'description',
        'video_url',
        'content',
        'project',
        'location',
        'work_amount',
        'audit_amount',
        'percentage',
        'status',
        'type_id'
    ];
    public function type()
    {
        return $this->belongsTo(TypeObra::class, 'type_id');
    }
    protected $appends = ['file_url'];
    public function getFileUrlAttribute()
    {
        return asset('').'files/images/obras/'. $this->image;
    }
}
