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
            $newDish = new Dish();
            $newDish->name = $dish['name'];
            $newDish->description = $dish['description'];
            $newDish->price = $dish['price'];
            $newDish->available = $dish['available'];
            $newDish->image = $dish['image'];
            $newDish->slug = // inserire funzioine slug
            $newDish->restaurant_id = //decidere come associate il Restaurant_id ai dish
            $newDish->save();
        }
    }
}
