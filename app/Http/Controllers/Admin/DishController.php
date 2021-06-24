<?php

namespace App\Http\Controllers\Admin;

use App\Dish;
use App\Restaurant;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DishController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create($slug)
  {
    $restaurant = Restaurant::where("slug", $slug)->first();
    return view('admin.dishes.create', compact('restaurant'));
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
      //'restaurant_id' => 'required|exists:restaurants,id',
      'name' => 'required|string|max:50',
      'description' => 'required|string',
      'price' => 'required|numeric',
      'available' => 'required|boolean',
      'image' => 'nullable|image|max:10000',
    ]);
    $data = $request->all();
    //salvataggio immagini in storage
    $image = NULL;
    if (array_key_exists('image', $data)) {
      $image = Storage::put('upload_dishes', $data['image']);
    }

    //creo un novo ristorante e lo fillo
    $newDish = new Dish();
    $newDish->fill($data);

    //assegnamo il resaurant_id perche non riesce col fill
    $newDish->restaurant_id = $data['restaurant_id'];

    //popolo lo slug con una funzione che si riferisce al dish name
    $newDish->slug = $this->generateSlug($newDish->name);

    //link immagini
    $newDish->image = 'storage/' . $image;

    $newDish->save();

    // prendo tutti i piatti, li riordino decrescente e prendo il primo
    $dish = Dish::where('restaurant_id', $data['restaurant_id'])->orderBy('id', 'desc')->first();

    return redirect()->route('admin.dishes.show', compact('dish'));
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Dish  $dish
   * @return \Illuminate\Http\Response
   */
  public function show($slug)
  {
    $dish = Dish::where('slug', $slug)->first();
    return view('admin.dishes.show', compact('dish'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Dish  $dish
   * @return \Illuminate\Http\Response
   */
  public function edit($slug)
  {
    $dish = Dish::where('slug', $slug)->first();
    $restaurants = Restaurant::where('user_id', Auth::user()->id)->get();

    return view('admin.dishes.edit', compact('restaurants', 'dish'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Dish  $dish
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Dish $dish)
  {
    $request->validate([
      //'restaurant_id' => 'required|exists:restaurants,id',
      'name' => 'required|string|max:50',
      'description' => 'required|string',
      'price' => 'required|numeric',
      'available' => 'required|in:1,0',
      'image' => 'nullable|image|max:10000',
    ]);
    $data = $request->all();

    $data['slug'] = $this->generateSlug($data['name'], $dish->name != $data['name'], $dish->slug);

    //assegnamo il resaurant_id perche non riesce col fill
    $dish->restaurant_id = $data['restaurant_id'];

    if (array_key_exists('image', $data)) {
      $image = Storage::put('uploads_dishes', $data['image']);
      $data['image'] = 'storage/' . $image;
    }

    $dish->update($data);

    return redirect()->route('admin.dishes.show', compact('dish'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Dish  $dish
   * @return \Illuminate\Http\Response
   */
  public function destroy(Dish $dish)
  {
    $dish->orders()->detach();

    $restaurant_id = $dish['restaurant_id'];
    $restaurants = Restaurant::where('id', $restaurant_id)->first();
    $restaurant = $restaurants['slug'];
    $dish->delete();
    return redirect()->route('admin.restaurants.show', compact('restaurant'));
  }


  private function generateSlug(string $title, bool $change = true, string $old_slug = '')
  {

    if (!$change) {
      return $old_slug;
    }

    $slug = Str::slug($title, '-');
    $slug_base = $slug;
    $contatore = 1;

    $post_with_slug = Dish::where('slug', '=', $slug)->first();
    while ($post_with_slug) {
      $slug = $slug_base . '-' . $contatore;
      $contatore++;

      $post_with_slug = Dish::where('slug', '=', $slug)->first();
    }
    return $slug;
  }
}
