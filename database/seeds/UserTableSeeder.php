<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name','admin')->first();
        //select * from roles where name='student';
        $user = new User();
        $user->name ='Edw';
        $user->last_name ='Rys';
        $user->email ='edw@edw.com';
        $user->password = bcrypt('edw@edw.com');
        $user->save();
        $user->roles()->attach($role_admin);
    }
}
