<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    protected $table = 'files';
    protected $fillable = [
        'title',
        'icon',
        'file',
        'description',
        'status',
        'group_id',
    ];
    public function items()
    {
        return $this->hasMany(File::class, 'group_id')->where('status', 'active');
    }

    protected $appends = ['file_url'];
    public function getFileUrlAttribute()
    {
        return asset('').'files/images/files/'. $this->group_id . '/'.$this->file;
    }
}
