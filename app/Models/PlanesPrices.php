<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use OwenIt\Auditing\Auditable;

class PlanesPrices extends Model implements AuditableContract
{
    use Auditable;
    use SoftDeletes;

    protected $table = 'planes_prices';
    protected $fillable = [
        'title',
        'price',
        'short_description',
        'icon',
        'image',
        'background',
        'description',
        'type_id',
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
    public function items()
    {
        return $this->hasMany(PlanesPricesFeatures::class, 'plan_id');
    }
}
