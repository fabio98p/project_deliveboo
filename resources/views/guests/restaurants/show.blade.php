@extends('layouts.app')

@section('main')
<main id="app">
  <div class="container-fluid banner-show" style="background-image: url('{{asset($restaurant->banner)}}')">
  </div>
  <section class="section-main">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-md-12">
                  <div class="page-top">
                      <h1>{{ $restaurant['name'] }}</h1>
                      <a href="{{route('index')}}" class="my-button my-button-orange">Torna ai ristoranti</a>
                  </div>
                  <h2>Menù</h2>
              </div>
          </div>

          <div class="row">
            <div class="col-md-8 col-lg-8">
              <dishes></dishes>
            </div>
            <cart></cart>
          </div>
      </div>
  </section>
</main>
@endsection

<script>
    var id = {!! json_encode($restaurant->id) !!};
</script>
