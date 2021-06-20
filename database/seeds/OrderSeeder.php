<?php

use Illuminate\Database\Seeder;
use App\Order;
use Config\Orders;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurants = config('restaurants');
        foreach ($restaurants as $restaurant) {
            $newRestaurant = new Restaurant();
            $newRestaurant->name = $restaurant['name'];
            $newRestaurant->address = $restaurant['address'];
            $newRestaurant->logo = $restaurant['logo'];
            $newRestaurant->description = $restaurant['description'];
            $newRestaurant->banner = $restaurant['banner'];
            $newRestaurant->available = $restaurant['available'];
            $newRestaurant->slug = // inserire funzioine slug
            $newRestaurant->user_id = rand(1,5);
            $newRestaurant->save();
        }
    }
}
