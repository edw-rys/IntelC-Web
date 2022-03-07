<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use OwenIt\Auditing\Auditable;

class Questions extends Model implements AuditableContract
{
    use Auditable;
    use SoftDeletes;

    protected $table = 'questions';
    protected $fillable = [
        'question',
        'answer',
        'image',
        'video_url',
        'content',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
   
    protected $appends = ['status'];
    public function getStatusAttribute()
    {
        return $this->deleted_at != null ? 'deleted' : 'active';
    }
}
