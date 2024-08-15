<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
   
    private $permissions_place = [
        'place-list',
        'place-create',
        'place-edit',
        'place-delete'
    ];
    public function run(): void
    {
        foreach ($this->permissions_place as $permission) {
            Permission::create(['name' => $permission]);
        }

        $adminRole = Role::create(['name' => 'Administrator']);
        $managerRole = Role::create(['name' => 'Manager']);
        $userRole = Role::create(['name' => 'User']);

        foreach( Permission::all() as $permission){
            $permission->assignRole($adminRole);
        }

        foreach( Permission::where('name', 'like', '%place%')->get() as $permission){
            $permission->assignRole($managerRole);
        }
 
        $adminUser = User::where('email', '=', 'usera@example.com')->first();
        $adminUser->assignRole('Administrator');

        $adminUser = User::where('email', '=', 'userb@example.com')->first();
        $adminUser->assignRole('Manager');
    }
}
