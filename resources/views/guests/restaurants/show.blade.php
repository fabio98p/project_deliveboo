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
                <div class="col-md-6 col-lg-4 mt-2 card-outline">
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
            <div class="col-md-4 col-lg-4" id="cart">
              <div class="cart-inner">
                <h3 class="text-center">IL TUO ORDINE</h3>
                <div class="d-none cart-empty text-center mt-3">
                  <h5>Il tuo carello è vuoto!</h5>
                </div>
                @foreach($dishes as $index => $dish)
                <div class="cart-item">
                  <div class="dish-cover">
                    <img src="{{asset($dish->image)}}" alt="{{$dish->name}}">
                    <div class="dish-name ml-3">
                      <span>{{$dish->name}}</span>
                      <div class="dish-quantity">
                        <i class="fas fa-minus"></i>
                        <span class="ml-1 mr-1">1</span>
                        <i class="fas fa-plus"></i>
                      </div>
                    </div>
                  </div>
                  <div class="dish-price">
                    <span>€{{$dish->price}}</span>
                  </div>
                </div>
                @endforeach
                <div class="mt-4 text-center">
                  <a href="{{route('orders.index')}}" class="my-button my-button-purple">Vai alla cassa</a>
                </div>
              </div>
            </div>
          </div>
      </div>
  </section>
</main>
@endsection
