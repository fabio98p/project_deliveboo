<?php

namespace App\Http\Controllers\Api;

use App\Restaurant;
use App\Category;
use app\Dish;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants= Restaurant::all();

        return response()->json([
            'response' => $restaurants,
            'success' => true,
        ]);
    }

    public function filterRestaurants(string $categoryName)
    {
      $category = Category::where('name', $categoryName)->first();

      $filteredRestaurants = $category->restaurants()->get();

        return response()->json([
            'response' => $filteredRestaurants,
            'success' => true,
        ]);
    }

    public function searchRestaurant(string $query)
    {
      $restaurants = Restaurant::where('name', 'LIKE', '%'.$query.'%')->get();

      return response()->json([
          'response' => $restaurants,
          'success' => true,
      ]);
    }
}
