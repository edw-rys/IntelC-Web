<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = [
        'name',
        'description',
        'status',
    ];
}
// Permission::create(['name' => 'restore_pines', 'guard_name'=>'web']);
//  $role = Spatie\Permission\Models\Role::find(1)  