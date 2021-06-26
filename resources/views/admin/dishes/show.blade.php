@extends('layouts.app')

@section('main')

<div class="container-fluid banner-show" style="background-image: url('{{asset($restaurant->banner)}}')"></div>
<section class="section-main">
    <div class="container" id="root">
        <div class="row">
            <div class="col-md-12">
                <div class="page-top">
                    <h1>{{ $dish['name'] }}</h1>

                    <div class="my-button-container">
                        <a class="my-button my-button-blue" href="{{route('admin.restaurants.show', ['restaurant' => $restaurant->slug])}}">
                            Torna al ristorante
                        </a>
                        <a class="my-button my-button-green" href="{{route('admin.dishes.edit', ['dish' => $dish->slug])}}">Edit</a>
                        <form action="{{route('admin.dishes.destroy', ['dish' => $dish->id])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input class="my-button my-button-red" type="submit" value="Delete">
                        </form>
                    </div>
                    
                </div>
                
            </div>
        </div>

        <div class="row show-dish">
            <div class="col-md-4">
                <div class="show-dish-image">
                    <img src="{{asset($dish->image)}}" alt="">
                </div>
            </div>
            <div class="col-md-4">
                <div class="row flex-column">
                    <h4>Descrizione</h4>
                    <span>{{ $dish['description'] }}</span>
                </div>

                <div class="row flex-column">
                    <h4>Prezzo</h4>
                    <span>€{{ $dish['price'] }}</span>
                </div>

                <div class="row flex-column">
                    <span :class="({{ $dish['available'] }} == 1) ? 'my-button my-button-green' : 'my-button my-button-red'" v-if="{{ $dish['available'] }} == 1">Disponibile</span>
                    <span :class="({{ $dish['available'] }} == 1) ? 'my-button my-button-green' : 'my-button my-button-red'" v-else="{{ $dish['available'] }} == 0">Terminato</span>
                </div>
                
            </div>
        </div>
    </div>

</section>
    
@endsection