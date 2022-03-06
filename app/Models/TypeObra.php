<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeObra extends Model
{
    protected $table = 'type_obra';
    protected $fillable = [
        'title',
        'icon',
        'image',
        'description',
        'video_url',
        'status',
    ];
    public function obras()
    {
        return $this->hasMany(Obra::class, 'type_id');
    }
    protected $appends = ['file_url'];
    public function getFileUrlAttribute()
    {
        return asset('').'files/images/obras/'. $this->image;
    }
}
