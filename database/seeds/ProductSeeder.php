<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i =0; $i < 5; $i++) {
            $product = new \App\Product();
            $product->setName(str_random(10))
                ->setQuantity(rand(1, 50))
                ->setPrice(rand(1, 100));
            $product->save();
        }
    }
}
