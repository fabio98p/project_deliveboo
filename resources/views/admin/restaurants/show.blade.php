@extends('layouts.app')

@section('main')

<div class="container-fluid banner-show" style="background-image: url('{{asset($restaurant->banner)}}')"></div>
<section class="section-main position-relative" id="root">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="page-top">
                    <h1>{{ $restaurant['name'] }}</h1>
                    <div class="my-buttons-container">
                        <a class="my-button my-button-orange" href="{{route('admin.restaurants.edit', ['restaurant' => $restaurant->slug])}}">Modifica ristorante</a>
                        <button class="my-button my-button-red" type="button" name="button" @click="deleteForm = true">Cancella ristorante</button>
                    </div>
                </div>
                <h2>I miei piatti</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-lg-4 mt-2 card-outline">
                <a class="link-to" href="{{ route('admin.dishes.create', ['restaurant' => $restaurant->slug]) }}">
                    <div class="card-personal">
                        <div class="card-personal-cover">
                            <div class="add-card">
                                <i class="fas fa-plus"></i>
                            </div>
                            <div class="overlay"></div>
                        </div>

                        <div class="card-personal-title">
                            <h4>Crea piatto</h4>
                        </div>

                    </div>
                </a>
            </div>
            {{-- @foreach($dishes as $index => $dish)
                <div class="col-md-4 mt-2">
                    <a href="{{route('admin.dishes.show', ['dish' => $dish->slug])}}">
                        <div class="card-personal">
                            <div class="card-personal-cover" style="background-image: url('{{asset($dish->image)}}')">
                                <img src="{{$dish['image']}}" alt="image logo">
                            </div>
                            <div class="card-info">
                                <div class="card-title">
                                    <h2 class="text-center">{{$dish['name']}}</h5>
                                </div>
                                <div class="">
                                    <a class="btn btn-primary" href="{{route('admin.dishes.edit', ['dish' => $dish->slug])}}">Edit</a>
                                    <a class="btn btn-danger" href="">Delete</a>
                                </div>
                            </div>

                        </div>
                    </a>

                </div>
            @endforeach --}}

            @foreach($dishes as $index => $dish)
                <div class="col-md-4 col-lg-4 mt-2 card-outline">
                    <a class="link-to" href="{{route('admin.dishes.show', ['dish' => $dish->slug])}}">
                        <div class="card-personal">
                            <div class="card-personal-cover" style="background-image: url('{{asset($dish->image)}}')">
                                {{-- <img src="{{asset($restaurant->logo)}}" alt=""> --}}
                                {{-- <div class="overlay"></div> --}}
                            </div>

                            {{-- <div class="card-info">
                                <div class="card-title">
                                    <h3 class="text-center">{{$restaurant->name}}</h3>
                                </div>

                                <div class="">
                                    <a class="btn btn-primary" href="{{route('admin.restaurants.edit', ['restaurant' => $restaurant->slug])}}">Edit</a>
                                    <form action="{{route('admin.restaurants.destroy', ['restaurant' => $restaurant->id])}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input class="btn btn-danger" type="submit" value="Delete">
                                    </form>
                                </div>
                            </div> --}}

                            <div class="card-personal-title">
                                <h4>{{$dish->name}}</h4>
                                <div class="dish-price">
                                    <h5>€{{$dish->price}}</h5>
                                    <i class="fas fa-circle" :class="({{$dish->available}} == 1) ? 'text-green' : 'text-red' "></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-md-12">
              <div class="my-buttons-container">
                  <a class="my-button my-button-blue" href="{{route('admin.orders.show', ['restaurant' => $restaurant->slug])}}">Ordini ricevuti</a>
                  <a class="my-button my-button-green" href="{{route('admin.statistics.show', ['restaurant' => $restaurant->slug])}}">Statistiche</a>
              </div>
            </div>
        </div>
    </div>

    <!-- Delete pop up -->
    <div class="delete-container" v-if="deleteForm">
      <div class="delete-form">
        <h4>Vuoi cancellare il ristorante "{{$restaurant->name}}"?</h4>
        <img src="{{asset($restaurant->banner)}}" alt="{{$restaurant->name}}">
        <div class="buttons mt-3">
          <form class="d-inline" action="{{route('admin.restaurants.destroy', ['restaurant' => $restaurant->id])}}" method="post">
            @csrf
            @method('DELETE')
            <input class="my-button my-button-red" type="submit" value="Cancella">
          </form>
          <button type="button" name="button" class="my-button my-button-green" @click="deleteForm = false">Torna indietro</button>
        </div>
      </div>
    </div>
</section>
@endsection
