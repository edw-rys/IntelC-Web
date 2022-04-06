<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypesFiles extends Model
{
    protected $table = 'type_files';
    protected $fillable = [
        'title',
        'system_name',
        'description',
        'icon',
        'image',
        'background',
        'video_url',
        'status',
    ];
    public function groups()
    {
        return $this->hasMany(GroupFile::class, 'type_id')->where('status', '<>', 'deleted');
    }
    protected $appends = ['file_url'];
    public function getFileUrlAttribute()
    {
        return asset('').'files/images/file/'. $this->image;
    }
}
