@extends('layouts.app')

@section('main')
{{-- <div class="container-fluid banner-show" style="background-image: url('{{$restaurant['banner']}}')">

</div> --}}
<div class="container" id="app">
    <div class="row">
        <div class="col-md-12 mt-5 d-flex">
            <h1>{{ $dish['name'] }}</h1>
            <a class="btn btn-primary" href="{{route('admin.dishes.edit', ['dish' => $dish->slug])}}">Edit</a>
            <form action="{{route('admin.dishes.destroy', ['dish' => $dish->id])}}" method="post">
                @csrf
                @method('DELETE')
                <input class="btn btn-danger" type="submit" value="Delete">
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="dish-show" style="background-image: url('{{$dish['image']}}')">

            </div>
        </div>
        <div class="col-md-4">
            <div class="row flex-column">
                <h4>Descrizione</h4>
                <p>{{ $dish['description'] }}</p>
            </div>

            <div class="row flex-column">
                <h4>Prezzo</h4>
                <p>{{ $dish['price'] }}</p>
            </div>

            <div class="row flex-column">
                <h4>Disponibile</h4>
                <p>{{ $dish['available'] }}</p>
            </div>
            
        </div>
    </div>
</div>
@endsection