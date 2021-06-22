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
        <div class="col-md-3 mt-5">
          <div class="card-my-restaurant border-2px">
            <div class="restaurant-image">
              <img src="restaurant.logo" alt="">
            </div>
            <h3>Nome</h3>
            <div class="">
              <button type="button" name="button">Modifica</button>
              <button type="button" name="button">Elimina</button>
            </div>
          </div>
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