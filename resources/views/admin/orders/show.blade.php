@extends('layouts.app')

@section('main')
    <main>
        <div class="container-fluid banner-show-confirmation banner-show-user"
            style="background-image: url('/../images/varie/deliveboo-ordini.png')"></div>
        <section class="section-main">
            <div class="container" id="orderhistory">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-top">
                            <h1>Storico ordini</h1>

                            <div class="my-buttons-container">
                                <a class="my-button-responsive-show my-button-orange"
                                    href="{{ route('admin.restaurants.show', ['restaurant' => $restaurant->slug]) }}">Torna
                                    al ristorante</a>
                                <a class="my-button my-button-green mr-1"
                                    href="{{ route('admin.statistics.show', ['restaurant' => $restaurant->slug]) }}">Statistiche</a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div id="history" class="col-sm-12 padding-y-30">
                        <table class="table">
                            <thead>
                                <tr>
                                    {{-- <th class="th-sm">ID

                                    </th> --}}
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

                                <tr class="t-row" v-for="post in displayedPosts" :key="post.id">
                                    {{-- <th class="" scope="row">@{{ post . id }}</th> --}}
                                    <td class="">@{{ post . customer_name }}
                                        @{{ post . customer_lastname }}</td>
                                    <td class="">@{{ post . customer_phone_number }}</td>
                                    <td class="">@{{ post . customer_address }} </td>
                                    <td class="">@{{ getDay(post . created_at) }}
                                        H:@{{ getTime(post . created_at) }} </td>
                                    <td class="">@{{ post . total_price }}</td>
                                </tr>

                            </tbody>
                        </table>

                        <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                            <ul class="pagination">
                                <li class="page-item">
                                    <button type="button" class="page-link" v-if="page != 1" @click="page--"><i
                                            class="fas fa-chevron-left"></i></button>
                                </li>
                                <li class="page-item">
                                    <button type="button" class="page-link"
                                        v-for="pageNumber in pages.slice(page-1, page+5)" @click="page = pageNumber">
                                        @{{ pageNumber }} </button>
                                </li>
                                <li class="page-item">
                                    <button type="button" @click="page++" v-if="page < pages.length" class="page-link"><i
                                            class="fas fa-chevron-right"></i>
                                    </button>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script>
        var id = {!! json_encode($restaurant->id) !!};
    </script>
@endsection
