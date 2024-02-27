<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = [
            [
              'email'    => 'mbyinfotech@gmail.com',
              'first_name'     => 'Muhammad',
              'middle_name'     => '',
              'sur_name'     => 'Bello',
              'password' => Hash::make('12345678'),
              'role'     => 'admin',
              'status'   => 1
            ],
            [
              'email'    => 'tasiu@gmail.com',
              'first_name'     => 'Tasiu',
              'middle_name'     => '',
              'sur_name'     => 'Nas',
              'password' => Hash::make('12345678'),
              'role'     => 'admin',
              'status'   => 1
            ],
            [
              'email'    => 'management@gmail.com',
              'first_name'     => 'Management',
              'middle_name'     => '',
              'sur_name'     => 'User',
              'password' => Hash::make('12345678'),
              'role'     => 'management',
              'status'   => 1
            ],
            [
              'email'    => 'director@gmail.com',
              'first_name'     => 'Director',
              'middle_name'     => '',
              'sur_name'     => 'User',
              'password' => Hash::make('12345678'),
              'role'     => 'director',
              'status'   => 1
            ],
          ];

         $role = new Role;
          foreach ($users as $key => $user) {
            $newUser = User::updateOrCreate([
                         'email' => $user['email']
                     ], [
                         'first_name'     => $user['first_name'],
                         'middle_name'     => $user['middle_name'],
                         'sur_name'     => $user['sur_name'],
                         'password' => $user['password']
                     ]);

                     if ($newUser->id == 1) {
                         $role = $role->updateOrCreate(['name' => 'admin']);
                     } else if ($newUser->id == 2) {
                         $role = $role->updateOrCreate(['name' => 'admin']);
                     } else if ($newUser->id == 3) {
                       $role = $role->updateOrCreate(['name' => 'management']);
                     }else if ($newUser->id == 4){
                       $role = $role->updateOrcreate(['name' => 'director']);
                     }

                    $permissions = Permission::pluck('id')->toArray();

                    $role->syncPermissions($permissions);
                    $newUser->assignRole([$role->id]);
          }
    }
}
