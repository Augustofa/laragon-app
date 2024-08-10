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
    private $permissions_product = [
        'product-list',
        'product-create',
        'product-edit',
        'product-delete',
    ];
    private $permissions_category = [
        'category-list',
        'category-create',
        'category-edit',
        'category-delete'
    ];
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([CategorySeeder::class]);
        $this->call([UserSeeder::class]);
        $this->call([ProductSeeder::class]);
        $this->call([OrderSeeder::class]);

        foreach ($this->permissions_product as $permission) {
            Permission::create(['name' => $permission]);
        }

        foreach ($this->permissions_category as $permission) {
            Permission::create(['name' => $permission]);
        }

        $adminRole = Role::create(['name' => 'Administrator']);
        $managerRole = Role::create(['name' => 'Manager']);

        foreach( Permission::all() as $permission){
            $permission->assignRole($adminRole);
        }

        foreach( Permission::where('name', 'like', '%product%')->get() as $permission){
            $permission->assignRole($managerRole);
        }
 
        $adminUser = User::where('email', '=', 'usera@example.com')->first();
        $adminUser->assignRole('Administrator');

        $adminUser = User::where('email', '=', 'userb@example.com')->first();
        $adminUser->assignRole('Manager');
    }
}
