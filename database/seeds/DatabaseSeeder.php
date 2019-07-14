<?php

use Illuminate\Database\Seeder;
use \App\Product;
use \App\Category;
use \App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create 20 categories
        $categories = factory(Category::class, 20)->create();
        //create 100 users
        $users = factory(User::class, 100)->create();

        //Create 10 products for each user, and link those products to a random number of categories (between 2 and 5)
        $products = factory(Product::class, 1000)->make()->each(function ($product) use ($users, $categories){
            $product->user()->associate($users->random());
            $product->save();
            $product->categories()->saveMany($categories->random(rand(2,5)));
        });
    }
}
