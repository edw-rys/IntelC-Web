<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use OwenIt\Auditing\Auditable;
class Team extends Model implements AuditableContract
{
    use Auditable;
    use SoftDeletes;

    protected $table = 'team';
    protected $fillable = [
        'name',
        'image',
        'cargo',
        'description',
        'place',
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
        return asset('').'files/images/our-team/'.$this->image;
    }
}
