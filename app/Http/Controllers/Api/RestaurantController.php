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
        $data = Restaurant::all();

        return response()->json([
            'response' => $data,
            'success' => true,
        ]);
    }

    public function filteredRestaurants(Request $request) {
        $filteredRestaurants = Category::where('name', 'pizza')->with('restaurants')->get();

        return response()->json([
            'response' => $filteredRestaurants,
            'success' => true,
        ]);
    }
}
