<?php

namespace Database\Seeders;

use App\Models\Products;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // DB::table('products')->insert([
        //     ['product_name'=>'Sample Product 1',
        //     'product_description' => 'Description Product 1',
        //     'amount'=> 100,
        //     'currency'=> 'USD',],

        //     ['product_name'=> 'Sample Product 2',
        //     'product_description' => 'Description Product 2',
        //     'amount'=> 500,
        //     'currency'=> 'PHP',],
        //     ['product_name'=>'Sample Product 3',
        //     'product_description' => 'Description Product 3',
        //     'amount'=> 1000,
        //     'currency'=> 'PHP',],

        //     ['product_name'=> 'Sample Product 4',
        //     'product_description' => 'Description Product 4',
        //     'amount'=> 200,
        //     'currency'=> 'PHP',],
        // ]
        // );
        Products::factory()->count(20)->create();
    }
}
