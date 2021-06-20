<?php

use Illuminate\Database\Seeder;
use App\Dish;
use Config\Dishes;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dishes = config('dishes');
        foreach ($dishes as $dish) {
            $newDish = new dish();
            $newDish->name = $dish['name'];
            $newDish->description = $dish['description'];
            $newDish->price = $dish['price'];
            $newDish->available = $dish['available'];
            $newDish->image = $dish['image'];
            $newDish->available = $dish['available'];
            $newDish->slug = // inserire funzioine slug
            $newDish->user_id = rand(1,5);
            $newDish->save();
        }
    }
}
