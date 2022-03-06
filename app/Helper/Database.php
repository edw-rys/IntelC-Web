<?php

use Illuminate\Support\Facades\Config;

if (! function_exists('createConfigDB')) {
    /**
     * Can Access To
     *
     * @param $name
     * @return void
     */
    function createConfigDB($name): void
    {
        Config::set([
            'database.connections.'.$name.'.driver'          => 'mysql',
            'database.connections.'.$name.'.host'            => config('app.db.host'),
            'database.connections.'.$name.'.port'            => '3306',
            'database.connections.'.$name.'.database'        => $name,
            'database.connections.'.$name.'.username'        => config('app.db.username'),
            'database.connections.'.$name.'.password'        => config('app.db.password'),
            'database.connections.'.$name.'.collation'       => 'utf8mb4_unicode_ci',
            'database.connections.'.$name.'.charset'         => 'utf8mb4',
            'database.connections.'.$name.'.prefix_indexes'  => true,
            'database.connections.'.$name.'.options'         => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
            'database.connections.'.$name.'.strict'          => true,
            'database.connections.'.$name.'.engine'          => null,
            
        ]);
    }
}