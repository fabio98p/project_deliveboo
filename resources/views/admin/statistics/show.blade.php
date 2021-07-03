@extends('layouts.app')

@section('main')
<main>
  <div class="container" id='stats'>


  <select class="bg-dark text-light mb-5 float-right"
              style="padding: 6px 10px; border-radius: 5px;"
              v-model="year" @change="filterByYear">
                  <option value="2021">2021</option>
              </select>

         <div class="row">
              <canvas id="chart"></canvas>
         </div>
  </div>
</main>
<script>
    var id = {!! json_encode($restaurant->id) !!};
</script>
@endsection
