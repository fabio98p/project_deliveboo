@extends('layouts.app')

@section('main')
<main id="root">
  <div class="container-fluid banner-show" style="background-image: url('../images/varie/my-restaurant-banner.jpg')"></div>
  <div class="container search-bar"> <span> <b>Inserisci il ristorante che stai cercando :</b> </span>
    <label for="cerca"><input v-model="scriviTxt" type="text" @keyup.enter="cerca(scriviTxt)"></label>
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

        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="consigliati flex-wrap "v-for="result in searchResult" :key="result.id ">
                  <div class="col-md-4 col-lg-4 mt-2 card-outline">
                      <div class="card-personal">
                          <div class="mt-2 card-outline card-personal-cover"
                          :style="`background-image: url('${result.banner}') ; `">
                              <div class="card-personal">
                                  <div class="card-personal-cover">
                                      <img :src="result.logo">
                                      <div class="overlay"></div>
                                  </div>

                                  <div class="card-personal-title">
                                      <h3>@{{result.name}}</h3>
                                  </div>
                              </div>
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
                            <div class="card-personal">
                                <div class="mt-2 card-outline card-personal-cover"
                                :style="`background-image: url('${restaurant.banner}') ; `">
                                    <div class="card-personal">
                                        <div class="card-personal-cover">
                                            <img :src="restaurant.logo">
                                            <div class="overlay"></div>
                                        </div>

                                        <div class="card-personal-title">
                                            <h3>@{{restaurant.name}}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        {{-- <div class="col-md-4 col-lg-4 mt-2 card-outline">
                            <a class="link-to" href="{{route('admin.restaurants.show', ['restaurant' => $restaurant->slug])}}">
                                <div class="card-personal">
                                    <div class="card-personal-cover" style="background-image: url('{{asset($restaurant->banner)}}')">
                                        <img src="{{asset($restaurant->logo)}}" alt="">
                                        <div class="overlay"></div>
                                    </div>
                                    <div class="card-personal-title">
                                        <h4>{{$restaurant->name}}</h4>
                                    </div>
                                </div>
                            </a>
                        </div> --}}
                  </div>
                </div>

              </div>
          </div>

      </div>
  </section>
</main>
@endsection
