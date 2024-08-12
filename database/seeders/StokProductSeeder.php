<?php

namespace Database\Seeders;

use App\Models\StokProduct;
use Illuminate\Database\Seeder;

class StokProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StokProduct::create([
            'name' => 'Hair Mask Biolage',
            'brand' => 'Matrix',
            'qty' => 6,
        ]);
    }
}
