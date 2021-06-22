<?php

namespace App\Http\Controllers\Api;

use App\Restaurant;
use App\Category;
use App\Dish;
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
            'succes' => true,
        ]);
    }

    public function filteredRestaurants() {

        $filteredRestaurants = Category::with('restaurants')->get();

        $data = [
            'filteredRestaurants' => $filteredRestaurants
        ];

        return response()->json([
            'response' => $data,
            'succes' => true,
        ]);
    }
}
