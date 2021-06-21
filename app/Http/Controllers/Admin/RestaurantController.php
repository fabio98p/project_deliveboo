<?php

namespace App\Http\Controllers\Admin;

use App\Restaurant;
use App\Category;
use App\User;
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
        $restaurant = Restaurant::where('user_id', Auth::user()->id)->get();
        return view('admin.index', compact('restaurant'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.restaurants.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'address' => 'required|string|max:100',
            'logo' => 'nullable|image|max:5000',
            'description' => 'required|text',
            'banner' => 'nullable|image|max:10000',
            'available' => 'required|boolean',
        ]);
        $data = $request->all();

        $cover = NULL;
        if (array_key_exists('cover', $data)) {
            $cover = Storage::put('uploads', $data['cover']);
        }

        $post = new Post();
        $post->fill($data);


        $post->slug = $this->generateSlug($post->title);
        $post->cover = 'storage/' . $cover;
        $post->save();

        if (array_key_exists('categories', $data)) {
            $restaurant->categories()->attach($data['tag_ids']);
        }
        return redirect(route('admin.posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        //
    }
}
