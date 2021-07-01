<!-- braintree -->
<!--
Card Number: 4111 1111 1111 1111
Expiration Date: 09/22
 -->
<!-- html -->
<script src="https://js.braintreegateway.com/web/dropin/1.30.1/js/dropin.js"></script>

@extends('layouts.app')

@section('main')

<main>
    <section class="section-main">
        <div class="container" id="app">
            <div class="row justify-content-center">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-4">
                    <div class="checkout-card">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="page-top">
                                    <h2>Le tue info</h2>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <form class="form-personal" method="POST" action="{{ route('admin.restaurants.store') }}" enctype="multipart/form-data">
                                @csrf
                                @method('POST')

                                <div class="form-group column">
                                    <label for="customer_name" class="col-md-4 col-form-label label-personal">{{ __('Nome') }}</label>

                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <input id="customer_name" type="text" class="form-control input-personal @error('customer_name') is-invalid @enderror" name="customer_name" value="" required autocomplete="customer_name" autofocus>

                                        @error('customer_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group column">
                                    <label for="customer_lastname" class="col-md-4 col-form-label label-personal">{{ __('Cognome') }}</label>

                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <input id="customer_lastname" type="text" class="form-control input-personal @error('customer_lastname') is-invalid @enderror" name="customer_lastname" value="" required autocomplete="customer_lastname" autofocus>

                                        @error('customer_lastname')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group column">
                                    <label for="customer_email" class="col-md-4 col-form-label label-personal">{{ __('Email') }}</label>

                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <input id="customer_email" type="text" class="form-control input-personal @error('customer_email') is-invalid @enderror" name="customer_email" value="" required autocomplete="customer_email" autofocus>

                                        @error('customer_email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group column">
                                    <label for="customer_address" class="col-md-4 col-form-label label-personal">{{ __('Indirizzo') }}</label>

                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <input id="customer_address" type="text" class="form-control input-personal @error('customer_address') is-invalid @enderror" name="customer_address" value="" required autocomplete="customer_address" autofocus>

                                        @error('customer_address')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group column">
                                    <label for="customer_phone_number" class="col-md-4 col-form-label label-personal">{{ __('Numero di telefono') }}</label>

                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <input id="customer_phone_number" type="text" class="form-control input-personal @error('customer_phone_number') is-invalid @enderror" name="customer_phone_number" value="" required autocomplete="customer_phone_number" autofocus>

                                        @error('customer_phone_number')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <!-- <div class="form-group column mb-0">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 column">
                                        <button type="submit" class="my button my-button-orange">
                                            {{ __('Completa ordine') }}
                                        </button>

                                    </div>
                                </div> -->
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                    <div class="checkout-card">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="page-top">
                                    <h2>Riepilogo Ordine</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row checkout-card-inner">
                            <cart-checkout></cart-checkout>
                        </div>

                        <div class="row column checkout-card-inner">
                            <div class="col-md-12">
                                <payment></payment>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
    var button = document.querySelector('#submit-button');

    braintree.dropin.create({
      authorization: 'sandbox_7b83drqs_8mwh82p8nbkbbr3n',
      selector: '#dropin-container'
    }, function (err, instance) {
      button.addEventListener('click', function () {
        instance.requestPaymentMethod(function (err, payload) {
          // Submit payload.nonce to your server
        });
      })
    });
    </script>
@endsection
