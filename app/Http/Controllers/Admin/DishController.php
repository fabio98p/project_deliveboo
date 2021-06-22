<?php

namespace App\Http\Controllers\Admin;

use App\Dish;
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
    public function create()
    {
        $restaurants = Restaurant::where('user_id', Auth::user()->id)->get();
        return view('admin.dishes.create', compact('restaurants'));
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
            'restaurant_id' => 'required|exists:restaurants,id',
            'name' => 'required|string|max:50',
            'description' => 'required|text',
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

        //popolo lo slug con una funzione che si riferisce al dish name
        $newDish->slug = $this->generateSlug($newDish->name);

        //link immagini
        $newDish->image = 'storage/' . $image;

        $newDish->save();

        // prendo tutti i piatti, li riordino decrescente e prendo il primo
        $dish = Dish::where('restaurant_id', $data['restaurant_id'])->orderBy('id', 'desh')->first();

        return redirect()->route('admin.dishes.show', compact('dish'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        return view('admin.dishes.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
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

      $post_with_slug = Dish::where('slug','=',$slug)->first();
      while($post_with_slug) {
        $slug = $slug_base . '-' . $contatore;
        $contatore++;

        $post_with_slug = Dish::where('slug','=',$slug)->first();
      }
      return $slug;
    }
}
