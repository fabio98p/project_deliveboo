<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        $data = [
            'categories' => $categories,
        ];

        return response()->json([
            'response' => $data,
            'succes' => true,
        ]);
    }
}
