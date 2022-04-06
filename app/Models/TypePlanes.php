<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use OwenIt\Auditing\Auditable;

class TypePlanes extends Model implements AuditableContract
{
    use Auditable;
    // use SoftDeletes;

    protected $table = 'type_planes';
    protected $fillable = [
        'title',
    ];

    public function plans()
    {
        return $this->hasMany(PlanesPrices::class, 'type_id');
    }
}
