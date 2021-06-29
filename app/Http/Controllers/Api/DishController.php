<?php

namespace App\Http\Controllers\Api;

use App\Restaurant;
use App\Category;
use App\Dish;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function show(string $dishId)
    {
        
        $dish = Dish::where('id', $dishId)->first();
        return response()->json([
            'response' => $dish,
            'success' => true,
        ]);
    }

}
