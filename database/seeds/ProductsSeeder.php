<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            ['description' => 'Silla Gales Blanca', 'image' => 'img/product-img/product1.jpg', 'price' => 150000],
            ['description' => 'Matera Manu', 'image' => 'img/product-img/product2.jpg', 'price' => 50000],
            ['description' => 'Silla Bar Fija Blanca', 'image' => 'img/product-img/product3.jpg', 'price' => 80000],
            ['description' => 'Escritorio', 'image' => 'img/product-img/product4.jpg', 'price' => 170000],
            ['description' => 'Silla Mecedora Cambridge', 'image' => 'img/product-img/product5.jpg', 'price' => 200000],
            ['description' => 'Lámpara Colgante Nogera', 'image' => 'img/product-img/product6.jpg', 'price' => 90000]
        ]);
    }
}
