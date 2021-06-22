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
        return view('admin.dishes.create');
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
        $dish = new Dish();
        
        $userRestaurant = Restaurant::where('user_id', Auth::user()->id)->first();
        $newDish->restaurant_id = $userRestaurant->id;
        $newDish->fill($data);
        
        //inserisco lo user id cercando lo user con cui si e' fatto l'accesso
        $dish->restaurant_id = Auth::user()->id;
        //popolo lo slug con una funzione che si riferisce al dish name
        $dish->slug = $this->generateSlug($dish->name);
        
        //link immagini
        $dish->logo = 'storage/' . $image;
        
        $dish->save();
        
        //popolare la tabella pvot 
        if (array_key_exists('category_ids', $data)) {
          $dish->categories()->attach($data['category_ids']);
        }
        
        return redirect()->route('admin.restaurants.index');
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
}
