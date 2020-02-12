<?php

use App\Product;
use App\ProductTag;
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
        factory(Product::class, 10)->create()->each(function ($product) {
            $product->productTags()->save(factory(ProductTag::class)->make());
        });
    }
}
