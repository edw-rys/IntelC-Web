<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use OwenIt\Auditing\Auditable;

class Testimonials extends Model implements AuditableContract
{
    use Auditable;
    use SoftDeletes;

    protected $table = 'testimonals';
    protected $fillable = [
        'person',
        'stars',
        'description',
        'place',
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
        return asset('').'/intelc/img/icons/'. $this->image;
    }
}
