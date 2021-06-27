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
                <div class="col-md-4 col-lg-4 mt-2 card-outline">
                  <a class="link-to" href="">
                    <div class="card-personal">
                      <div class="card-personal-cover" style="background-image: url('{{asset($dish->image)}}')">
                      </div>

                      <div class="card-personal-title">
                        <h4>{{$dish->name}}</h4>
                        <div class="dish-price">
                          <h5>€{{$dish->price}}</h5>
                          <i class="fas fa-circle" :class="({{$dish->available}} == 1) ? 'text-green' : 'text-red' "></i>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
                @endforeach
              </div>
            </div>
            <div class="col-md-4 col-lg-4 mt-2" id="cart">
              <h3 class="text-center">IL TUO ORDINE</h3>
              <div class="cart-item">
                <img src="{{asset($dish->image)}}" alt="$dish->name">
              </div>
            </div>
          </div>
      </div>
  </section>
</main>
@endsection
