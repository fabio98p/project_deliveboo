@extends('layouts.app')

@section('main')

<div class="container-fluid banner-show" style="background-image: url('../images/varie/my-restaurant-banner.jpg')"></div>
<section class="section-main">
    <div class="container" id="app">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="page-top">
                    <h1>Main guest</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mt-2">
                <div class="card-personal">
                    <div class="card-personal-cover" style="background-image: url('@{{ restaurant.logo }}')">
                    </div>
                    <div class="card-info">
                        <div class="card-title">
                            <h2 class="text-center">@{{ restaurant.name }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
