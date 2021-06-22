<?php

namespace App\Http\Controllers;

use App\Restaurant;
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
            'succes' => true,
            'response' => $data,
        ]);
    }
}
