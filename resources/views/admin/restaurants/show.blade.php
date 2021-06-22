@extends('layouts.app')
@section('main')
<div class="container-fluid ">
<div class="h-prova">

</div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-5">
                <h1>Ciao {{ $restaurant->name }}</h1>
                <h3>I miei piatti</h2>

        </div>
        <div class="col-md-3 mt-5">
          <div class="card-my-dish border-2px">
            <div class="">

            </div>
            <span>nome piatto</span>
            <div class="">
              <button type="button" name="button">Modifica</button>
              <button type="button" name="button">Elimina</button>
            </div>
          </div>
        </div>
        <div class="col-md-3 mt-5">
          <div class="card-my-dish border-2px">

            <div class="">
              <button type="button" name="button">Crea Piatto</button>

            </div>
          </div>
        </div>
    </div>
</div>
@endsection('main')
