@extends('layouts.app')

@section('main')
<div class="container-fluid h-prova">

</div>
<div class="container" id="app">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-5">
                <h1>Benvenuto {{ Auth::user()->name }}</h1>
                <h3>I miei ristoranti</h2>

        </div>

    </div>
    <div class="row">
      @foreach($restaurants as $index => $restaurant)
        <div class="col-md-3 mt-2">
          <div class="card">
            <div class="card-title">
                <h2 class="text-center">{{$restaurant['name']}}</h5>
            </div>
            <div class="cover" style="background-image: url('{{$restaurant['logo']}}')">
                {{-- <img src="{{$restaurant['logo']}}" alt="image logo"> --}}
            </div>
            <div class="">
              <a class="btn btn-info" href="{{route('admin.restaurants.show', ['restaurant' => $restaurant->id])}}">Show</a>
              <a class="btn btn-primary" href="{{route('admin.restaurants.edit', ['restaurant' => $restaurant->id])}}">Edit</a>
              <a class="btn btn-danger" href="">Delete</a>

            </div>
          </div>
        </div>
        @endforeach
    </div>
        

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
