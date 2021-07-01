@extends('layouts.app')

@section('main')
<main id="app">
    <div class="container-fluid banner-show" style="background-image: url('{{asset($restaurant->banner)}}')"></div>
    <section class="section-main">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="page-top">
                        <h1>{{ $restaurant['name'] }}</h1>

                        <div class="my-buttons-container">
                            <a class="my-button-responsive-show my-button-orange" href="{{route('index')}}">
                                Torna al ristorante
                            </a>

                            <a class="my-button-responsive-hide my-button-orange" href="{{route('index')}}"><i class="fas fa-chevron-left"></i></a>
                        </div>
                    </div>
                    <h2 class="mt-3">Menù</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-6 col-xl-8">
                    <dishes></dishes>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4" id="cart-anchor">
                    <cart></cart>
                </div>
                
                
            </div>
            <a class="my-button my-button-responsive-hide my-button-orange button-anchor" href="#cart"><i class="fas fa-shopping-cart"></i></a>
        </div>
    </section>
</main>
@endsection

<script>
    var id = {!! json_encode($restaurant->id) !!};
</script>
