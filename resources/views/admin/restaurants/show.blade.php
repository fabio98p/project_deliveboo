@extends('layouts.app')

@section('main')

<div class="container-fluid banner-show" style="background-image: url('{{$restaurant['banner']}}')"></div>
<section class="section-main">
    <div class="container" id="app">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="page-top">
                    <h1>{{ $restaurant['name'] }}</h1>
                    <div class="my-buttons-container">
                        <a class="my-button" href="">Modifica ristorante</a>
                        <a class="my-button" href="">Piatti</a>
                        <a class="my-button" href="">Ordini ricevuti</a>
                        <a class="my-button" href="">Statistiche</a>
                    </div>
                    
                </div>
                <h3>I miei piatti</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mt-2">
                <a href="{{ route('admin.dishes.create', ['restaurant' => $restaurant->slug]) }}">
                    <div class="card-personal">
                        <div class="add-card">
                            <i class="fas fa-plus"></i>
                        </div>
                    </div>
                </a>
            </div>
            @foreach($dishes as $index => $dish)
                <div class="col-md-4 mt-2">
                    <a href="{{route('admin.dishes.show', ['dish' => $dish->slug])}}">
                        <div class="card-personal">
                            <div class="card-personal-cover" style="background-image: url('{{$dish['image']}}')">
                                {{-- <img src="{{$dish['image']}}" alt="image logo"> --}}
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
            @endforeach
        </div>  
    </div>
</section>
@endsection