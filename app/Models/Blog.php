<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use OwenIt\Auditing\Auditable;

class Blog extends Model implements AuditableContract
{
    use Auditable;
    use SoftDeletes;

    protected $table = 'blog';
    protected $fillable = [
        'title',
        'description',
        'image',
        'video_url',
        'content',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
   
    protected $appends = ['file_url', 'status'];
    public function getStatusAttribute()
    {
        return $this->deleted_at != null ? 'deleted' : 'active';
    }
    public function getFileUrlAttribute()
    {
        return asset('').'files/images/blog/'.$this->image;
    }
    public function user_created()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
