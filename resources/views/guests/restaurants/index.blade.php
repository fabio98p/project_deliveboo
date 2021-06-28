@extends('layouts.app')

@section('main')
<main id="root">
<div class="container-fluid banner-show" style="background-image: url('../images/varie/my-restaurant-banner.jpg')"></div>
<section class="section-main">
  <div class="container search-bar">
    <label for="Ricerca Ristoranti"></label>
    <input v-model="scriviTxt" class="search" type="search" name="search" @keyup.enter="cerca(scriviTxt)" placeholder="Inserisci il nome del ristorante">
    <a class="my-button my-button-orange" style="cursor: pointer; margin-left: 15px;" @click="cerca(scriviTxt)" >
      Cerca
    </a>
  </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row justify-content-center">
                    <div class="col-md-2 card-homepage mb-2 text-center"
                    v-for="category in categories"
                    :key="category.id"
                    @onClick="categoryFilter()">
                        <input class="checkbox-categories" type="checkbox" :id="category.name" :value="category.id">
                        <label
                        class="checkbox-categories-label"
                        :for="category.name"
                        @click="filterRestaurants(category.id)">
                            <img class="icon_category" :src="category.icon"
                            :class="(categorySelected == category.id) ? 'checkbox-categories-label-checked': ''">
                            <h5>@{{category.name}}</h5>
                        </label>
                    </div>
                </div>
            </div>
            <h2 v-if="searchResult.length > 0">Risultati della ricerca</h2>
            <hr v-if="searchResult.length > 0">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4 col-lg-4 mt-2 card-outline" v-for="result in searchResult" :key="result.id">
                                <a class="link-to" :href="'restaurants/' + result.slug">
                                    <div class="card-personal">
                                        <div class="card-personal-cover" :style="`background-image: url('${result.banner}') ; `">
                                            <img :src="result.logo">
                                            <div class="overlay"></div>
                                        </div>
                                        <div class="card-personal-title">
                                            <h4>@{{result.name}}</h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>

        {{-- <div class=""> --}}
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4 col-lg-4 mt-2 card-outline" v-for="restaurant in restaurants" :key="restaurants.id">
                            <a class="link-to" :href="'restaurants/' + restaurant.slug">
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
        {{-- </div> --}}
    </section>
</main>
@endsection
