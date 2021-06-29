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
                  </div>
                  <h2>Menù</h2>
              </div>
          </div>

          <example-component></example-component>

          <cart-dropdown></cart-dropdown>

      </div>
  </section>
</main>
@endsection

<script>
    var id = {!! json_encode($restaurant->id) !!};
</script>
