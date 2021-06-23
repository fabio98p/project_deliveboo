@extends('layouts.app')

@section('main')
<div class="container-fluid banner-show" style="background-image: url('{{$restaurant['banner']}}')">

</div>
<div class="container" id="app">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-5">
                <h1>{{ $restaurant['name'] }}</h1>
                <h3>I miei piatti</h2>
        </div>

    </div>
    <div class="row">
      @foreach($dishes as $index => $dish)
        <div class="col-md-3 mt-2">
          <div class="card">
            <div class="card-title">
                <h2 class="text-center">{{$dish['name']}}</h5>
            </div>
            <div class="cover" style="background-image: url('{{$dish['image']}}')">
                {{-- <img src="{{$dish['image']}}" alt="image logo"> --}}
            </div>
            <div class="">
              <a class="btn btn-info" href="{{route('admin.dishes.show', ['dish' => $dish->id])}}">Show</a>
              <a class="btn btn-primary" href="{{route('admin.dishes.edit', ['dish' => $dish->id])}}">Edit</a>
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
              <button type="button" name="button"><a href="{{ route('admin.dishes.create', ['restaurant' => $restaurant->slug]) }}">Crea piatto</a></button>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection