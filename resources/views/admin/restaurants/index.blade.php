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
                <div class="col-md-4 col-lg-3 mt-2 card-outline">
                    <a class="link-to" href="{{route('admin.restaurants.show', ['restaurant' => $restaurant->slug])}}">
                        <div class="card-personal">
                            <div class="card-personal-cover" style="background-image: url('{{asset($restaurant->banner)}}')">
                                <img src="{{asset($restaurant->logo)}}" alt="">
                                <div class="overlay"></div>
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
                                <h3>{{$restaurant->name}}</h3>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            <div class="col-md-4 col-lg-3 mt-2 card-outline">
                <a class="link-to" href="{{ route('admin.restaurants.create') }}">
                    <div class="card-personal">
                        <div class="card-personal-cover">
                            <div class="add-card">
                                <i class="fas fa-plus"></i>
                            </div>
                            <div class="overlay"></div>
                        </div>

                        <div class="card-personal-title">
                            <h3>Crea ristorante</h3>
                        </div>
                        
                    </div>
                </a>
            </div>

            

        </div>
    </div>
</section>

@endsection
