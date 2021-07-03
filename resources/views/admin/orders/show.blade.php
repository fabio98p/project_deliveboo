@extends('layouts.app')

@section('main')
  <main>
    <div class="container">
      <div class="row">
        <h2 class="title-history">STORICO ORDINI RICEVUTI</h1>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div id="history" class="col-sm-12">
  <div class="offset">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th class="th-sm">ID

        </th>
        <th class="th-sm">NOME

        </th>
        <th class="th-sm">N.TELEFONO

        </th>
        <th class="th-sm">INDIRIZZO

        </th>
        <th class="th-sm">DATA

        </th>
        <th class="th-sm">TOTALE SPESO

        </th>
      </tr>
    </thead>
    <tbody>

        <tr class="t-row" v-for="post in displayedPosts"
        :key="post.id">
            <th class="border border-primary" scope="row">@{{post.id}}</th>
            <td class="border border-primary">@{{post.customer_name}} @{{post.customer_lastname}}</td>
            <td class="border border-primary">@{{post.customer_phone_number}}</td>
            <td class="border border-primary">@{{post.customer_address}} </td>
            <td class="border border-primary">@{{post.created_at}} </td>
            <td class="border border-primary">@{{post.total_price}} </td>
        </tr>

    </tbody>
  </table>
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item">
          <button type="button" class="page-link" v-if="page != 1" @click="page--"> Precedente </button>
        </li>
        <li class="page-item">
          <button type="button" class="page-link" v-for="pageNumber in pages.slice(page-1, page+5)" @click="page = pageNumber"> @{{pageNumber}} </button>
        </li>
        <li class="page-item">
          <button type="button" @click="page++" v-if="page < pages.length" class="page-link"> Successiva </button>
        </li>
      </ul>
    </nav>
  </div>
</div>
      </div>
    </div>

  </main>
  <script>
      var id = {!! json_encode($restaurant->id) !!};
  </script>
@endsection
