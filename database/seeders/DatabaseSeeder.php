<?php

namespace Database\Seeders;

use App\Models\StokProduct;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            PermissionTableSeeder::class,
            UsersTableSeeder::class,
            WebsiteTableSeeder::class,
            CategorySeeder::class,
            ProductTableSeeder::class,
            StokProductSeeder::class,
        ]);
    }
}
