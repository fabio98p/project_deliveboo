@extends('layouts.app')

@section('main')
<main>
  <div class="container" id='stats'>
    <h1 class="text-center py-3">Statistiche del tuo Ristorante</h1>
    <div class="">
      <div class="col-md-12">
        <div class="my-buttons-container d-flex justify-content-right ">
            <a class="my-button my-button-blue mr-1" href="{{route('admin.orders.show', ['restaurant' => $restaurant->slug])}}">Ordini ricevuti</a>
        </div>
      </div>
    </div>
    <div class="row">

    <select class="bg-dark text-light mb-5 m-auto"
                style="padding: 6px 10px; border-radius: 5px;"
                v-model="year" @change="filterByYear">
                    <option value="2021">Anno 2021</option>
      </select>
    </div>

    <div class="row w-chart">
              <canvas id="chart" class="mychart my-5"></canvas>
    </div>
  </div>
</main>
<script>
    var id = {!! json_encode($restaurant->id) !!};
</script>
@endsection
