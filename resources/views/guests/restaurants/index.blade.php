@extends('layouts.app')

@section('main')
<main id="root">
  <div class="container-fluid banner-show" style="background-image: url('../images/varie/my-restaurant-banner.jpg')"></div>
  <section class="section-main">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-md-12">
                <div class="row">
                 <div class="consigliati flex-wrap">

                          <div class="card-homepage" v-for="restaurant in restaurants" :key="restaurants.id ">
                            <h4>@{{restaurant.name}}</h4>
                            <p>@{{restaurant.address}}</p>
                            <p>@{{restaurant.description}}</p>
                          </div>

                  </div>
                </div>

              </div>
          </div>

      </div>
  </section>

</main>

@endsection
