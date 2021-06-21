<?php

use Illuminate\Database\Seeder;
use App\Dish;
use Illuminate\Support\Str;
use Config\dishes;

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
            $newDish = new Dish();
            $newDish->name = $dish['name'];
            $newDish->description = $dish['description'];
            $newDish->price = $dish['price'];
            $newDish->available = $dish['available'];
            $newDish->image = $dish['image'];
            $newDish->slug = Str::slug($dish['name'],'-');
            $newDish->restaurant_id = $dish['restaurant_id'];
            $newDish->save();
        }
    }
}
