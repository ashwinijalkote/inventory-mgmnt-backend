<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1,10) as $index) {
            DB::table('products')->insert([
                                    'name' => Str::random(10),
                                    'vendor' => Str::random(10),
                                    'mrp' => rand(),
                                    'batchNum' => Str::random(5),
                                    'batchDate' => '05/05/2019',
                                    'qty' => rand(),
                                    'status' => 'Pending'
                                    ]);
        }
    }
}
