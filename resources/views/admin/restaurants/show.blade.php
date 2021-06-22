@extends('layouts.app')

@section('main')
<div class="container-fluid h-prova">

</div>
<div class="container" id="app">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-5">
                <h1>Nome ristorante: {{ $restaurant['name'] }}</h1>
                <h3>I miei piatti</h2>

        </div>

    </div>
        @foreach($dishes as $index => $dish)
        <div class="col-md-3 mt-2">
          <div class="card">
            <div class="card-title">
                <h2 class="text-center">{{$dish['name']}}</h5>
            </div>
            <div class="cover">
                <img src="{{$dish['image']}}" alt="image logo">
            </div>
            <div class="">
              {{-- <a class="btn btn-primary" href="{{route('admin.dishes.edit', ['dish' => $dish->id])}}">Edit</a> --}}
              <a class="btn btn-danger" href="">Delete</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
        <div class="col-md-3 mt-5">
          <div class="card-my-restaurant border-2px">

            <div class="">
              <button type="button" name="button"><a href="{{ route('admin.restaurants.create') }}">Crea ristorante</a></button>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection