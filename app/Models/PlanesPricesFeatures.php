<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use OwenIt\Auditing\Auditable;

class PlanesPricesFeatures extends Model implements AuditableContract
{
    use Auditable;
    use SoftDeletes;

    protected $table = 'planes_prices_features';
    protected $fillable = [
        'plan_id',
        'description',
        'icon',
        'link',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
}
