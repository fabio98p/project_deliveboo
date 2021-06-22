<?php

namespace App\Http\Controllers\Admin;

use App\Restaurant;
use App\Category;
use App\User;
use app\Dish;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
        $restaurants = Restaurant::where('user_id', Auth::user()->id)->get();

        return view('admin.restaurants.index', compact('restaurants'));
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
            'category_ids' => 'exists:categories,id|nullable',
            'available' => 'required|boolean',
        ]);
        $data = $request->all();

        $logo = NULL;
        if (array_key_exists('logo', $data)) {
            $logo = Storage::put('uploads', $data['logo']);
        }

        $banner = NULL;
        if (array_key_exists('banner', $data)) {
            $banner = Storage::put('uploads', $data['banner']);
        }

        if (array_key_exists('category_ids', $data)) {
          $restaurant->categories()->attach($data['category_ids']);
        }

        $restaurant = new Restaurant();
        $restaurant->fill($data);
        $restaurant->user_id = Auth::user()->id;
        $restaurant->slug = $this->generateSlug($restaurant->name);
        $restaurant->logo = 'storage/' . $logo;
        $restaurant->banner = 'storage/' . $banner;
        $restaurant->save();

        return redirect()->route('admin.restaurants.index');
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

    private function generateSlug(string $title, bool $change = true, string $old_slug = '') {

      if (!$change) {
        return $old_slug;
      }

      $slug = Str::slug($title,'-');
      $slug_base = $slug;
      $contatore = 1;

      $post_with_slug = Restaurant::where('slug','=',$slug)->first();
      while($post_with_slug) {
        $slug = $slug_base . '-' . $contatore;
        $contatore++;

        $post_with_slug = Restaurant::where('slug','=',$slug)->first();
      }
      return $slug;
    }
}
