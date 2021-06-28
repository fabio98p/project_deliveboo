@extends('layouts.app')

@section('main')
<main id="root">
  <div class="container-fluid banner-show" style="background-image: url('{{asset($restaurant->banner)}}')">
  </div>
  <section class="section-main">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-md-12">
                  <div class="page-top">
                      <h1>{{ $restaurant['name'] }}</h1>
                  </div>
                  <h2>Menù</h2>
              </div>
          </div>

          <div class="row">
            <div class="col-md-8 col-lg-8">
              <div class="row">
                @foreach($dishes as $index => $dish)
                <div class="col-md-6 col-lg-6 mt-2 card-outline">
                  <div class="card-personal scale">
                    <div class="card-personal-cover position-relative" style="background-image: url('{{asset($dish->image)}}')">
                      <div class="card-personal-description">
                        <p class="text-center">{{$dish->description}}</p>
                      </div>
                    </div>

                    <div class="card-personal-title">
                      <h4>{{$dish->name}}</h4>
                      <div class="dish-price">
                        <h5>€{{$dish->price}}</h5>
                        <i class="fas fa-circle" :class="({{$dish->available}} == 1) ? 'text-green' : 'text-red' "></i>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>

          </div>
      </div>
  </section>
</main>

<!-- Prova Carrello -->
<div id="app">
    <nav class="navbar is-primary">
        <div class="navbar-brand">
            <a class="navbar-item" href="/">
                Voerro Shopping Cart Tutorial
            </a>

            <div class="navbar-burger burger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <div id="navbarExampleTransparentExample" class="navbar-menu">
            <div class="navbar-end">
                <cart-dropdown></cart-dropdown>
            </div>
        </div>
    </nav>

    <div class="section content">
        <h1>Our Products</h1>
        <example-component></example-component>
    </div>
</div>


@endsection
