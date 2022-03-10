<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use OwenIt\Auditing\Auditable;

class GroupFile extends Model implements AuditableContract
{
    use Auditable;
    protected $table = 'group_file';
    protected $fillable = [
        'title',
        'icon',
        'image',
        'description',
        'status',
        'type_id',
    ];
    public function items()
    {
        return $this->hasMany(Files::class, 'group_id')->where('status', 'active');
    }

    protected $appends = ['file_url'];
    public function getFileUrlAttribute()
    {
        return asset('').'files/images/files/'. $this->image;
    }
}
