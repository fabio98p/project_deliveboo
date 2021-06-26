@extends('layouts.app')

@section('main')
<main id="root">
  <div class="container-fluid banner-show" style="background-image: url('../images/varie/my-restaurant-banner.jpg')"></div>
  <div class="container search-bar"> <span> <b>Inserisci il piatto/ristorante che stai cercando :</b> </span>
    <label for="cerca"></label><input v-model="scriviTxt"  type="text" @keyup.enter="cerca(scriviTxt)">
    <button @click="cerca(scriviTxt)" >Cerca</button>
  </div>
  <section class="section-main">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12">
            <div class="row">
              <div class="consigliati flex-wrap">

                          <div class="col-md-2 card-homepage" v-for="category in categories" :key="category.id ">

                              <h4>@{{category.name}}</h4>
                              <img class="icon_category" :src="category.icon">

                          </div>

                  </div>

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-md-12">
                <div class="row">
                    <div class="consigliati flex-wrap">
                        <div class="col-md-4 col-lg-4 mt-2 card-outline" v-for="restaurant in restaurants" :key="restaurants.id ">
                            <a class="link-to" href="">
                                <div class="card-personal">
                                    <div class="card-personal-cover" :style="`background-image: url('${restaurant.banner}') ; `">
                                        <img :src="restaurant.logo">
                                        <div class="overlay"></div>
                                    </div>
                                    <div class="card-personal-title">
                                        <h4>@{{restaurant.name}}</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

              </div>
          </div>

      </div>
  </section>
</main>
@endsection
