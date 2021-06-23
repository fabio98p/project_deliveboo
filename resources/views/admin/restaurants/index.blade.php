@extends('layouts.app')

@section('main')

<div class="container-fluid banner-show" style="background-image: url('../images/varie/my-restaurant-banner.jpg')"></div>
<section class="section-main">
    <div class="container" id="app">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="page-top">
                    {{-- <h3>Benvenuto {{ Auth::user()->name }}</h3> --}}
                    <h1>I miei ristoranti</h1>

                    <div class="my-buttons-container">
                        <a class="my-button" href="{{ route('admin.restaurants.create') }}">Crea ristorante</a>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($restaurants as $index => $restaurant)
                <div class="col-md-4 mt-2">
                    <a href="{{route('admin.restaurants.show', ['restaurant' => $restaurant->id])}}">
                        <div class="card-personal">
                            <div class="card-personal-cover" style="background-image: url('{{$restaurant['logo']}}')">
                                {{-- <img src="{{$restaurant['logo']}}" alt="image logo"> --}}
                            </div>
                            <div class="card-info">
                                <div class="card-title">
                                    <h2 class="text-center">{{$restaurant['name']}}</h5>
                                </div>
                                <div class="">
                                    <a class="btn btn-primary" href="{{route('admin.restaurants.edit', ['restaurant' => $restaurant->id])}}">Edit</a>
                                    <form action="{{route('admin.restaurants.destroy', ['restaurant' => $restaurant->id])}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input class="btn btn-danger" type="submit" value="Delete">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            <div class="col-md-4 mt-2">
                <a href="{{ route('admin.restaurants.create') }}">
                    <div class="card-personal">
                        <div class="add-card">
                            <i class="fas fa-plus"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
