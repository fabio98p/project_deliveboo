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
                            @if (session()->has('success_message'))
                            <div class="alert alert-success">
                                {{ session()->get('success_message') }}
                            </div>
                            @endif

                            @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <form action="{{ url('/checkout') }}" method="POST" id="payment-form">
                                @csrf

                                <div class="form-group">
                                    <label for="name_on_card">Nome</label>
                                    <input type="text" class="form-control" id="name_on_card" name="name_on_card">
                                </div>

                                <div class="form-group">
                                    <label for="name_on_card">Cognome</label>
                                    <input type="text" class="form-control" id="name_on_card" name="name_on_card">
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email">
                                </div>

                                <div class="form-group">
                                    <label for="address">Indirizzo</label>
                                    <input type="text" class="form-control" id="address" name="address">
                                </div>

                                <div class="form-group">
                                    <label for="phone">Cellulare</label>
                                    <input type="text" class="form-control" id="phone" name="phone">
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="amount">Amount</label>
                                            <input type="text" class="form-control" id="amount" name="amount" value="11">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cc_number">Numero Di carta di credito</label>
                                            <input type="text" class="form-control" id="cc_number" name="cc_number">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="expiry">Data di scadenza</label>
                                            <input type="text" class="form-control" id="expiry" name="expiry">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="cvc">CVC</label>
                                            <input type="text" class="form-control" id="cvc" name="cvc">
                                        </div>
                                    </div>

                                </div>



                        </div>


                        <input id="nonce" name="payment_method_nonce" type="hidden" />
                        <button type="submit" class="btn btn-success">Submit Payment</button>
                        </form>
                        <!-- <form class="form-personal" method="POST" action="{{ route('admin.restaurants.store') }}" enctype="multipart/form-data">
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

                                 <div class="form-group column mb-0">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 column">
                                        <button type="submit" class="my button my-button-orange">
                                            {{ __('Completa ordine') }}
                                        </button>

                                    </div>
                                </div>
                            </form> -->
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

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</main>
<script>
      var form = document.querySelector('#payment-form');
      var submit = document.querySelector('input[type="submit"]');
      braintree.client.create({
        authorization: '{{ $token }}'
      }, function (clientErr, clientInstance) {
        if (clientErr) {
          console.error(clientErr);
          return;
        }
        // This example shows Hosted Fields, but you can also use this
        // client instance to create additional components here, such as
        // PayPal or Data Collector.
        braintree.hostedFields.create({
          client: clientInstance,
          styles: {
            'input': {
              'font-size': '14px'
            },
            'input.invalid': {
              'color': 'red'
            },
            'input.valid': {
              'color': 'green'
            }
          },
          fields: {
            number: {
              selector: '#card-number',
              placeholder: '4111 1111 1111 1111'
            },
            cvv: {
              selector: '#cvv',
              placeholder: '123'
            },
            expirationDate: {
              selector: '#expiration-date',
              placeholder: '10/2019'
            }
          }
        }, function (hostedFieldsErr, hostedFieldsInstance) {
          if (hostedFieldsErr) {
            console.error(hostedFieldsErr);
            return;
          }
          // submit.removeAttribute('disabled');
          form.addEventListener('submit', function (event) {
            event.preventDefault();
            hostedFieldsInstance.tokenize(function (tokenizeErr, payload) {
              if (tokenizeErr) {
                console.error(tokenizeErr);
                return;
              }
              // If this was a real integration, this is where you would
              // send the nonce to your server.
              // console.log('Got a nonce: ' + payload.nonce);
              document.querySelector('#nonce').value = payload.nonce;
              form.submit();
            });
          }, false);
        });
        // Create a PayPal Checkout component.
        braintree.paypalCheckout.create({
            client: clientInstance
        }, function (paypalCheckoutErr, paypalCheckoutInstance) {
        // Stop if there was a problem creating PayPal Checkout.
        // This could happen if there was a network error or if it's incorrectly
        // configured.
        if (paypalCheckoutErr) {
          console.error('Error creating PayPal Checkout:', paypalCheckoutErr);
          return;
        }
        // Set up PayPal with the checkout.js library
        paypal.Button.render({
          env: 'sandbox', // or 'production'
          commit: true,
          payment: function () {
            return paypalCheckoutInstance.createPayment({
              // Your PayPal options here. For available options, see
              // http://braintree.github.io/braintree-web/current/PayPalCheckout.html#createPayment
              flow: 'checkout', // Required
              amount: 13.00, // Required
              currency: 'USD', // Required
            });
          },
          onAuthorize: function (data, actions) {
            return paypalCheckoutInstance.tokenizePayment(data, function (err, payload) {
              // Submit `payload.nonce` to your server.
              document.querySelector('#nonce').value = payload.nonce;
              form.submit();
            });
          },
          onCancel: function (data) {
            console.log('checkout.js payment cancelled', JSON.stringify(data, 0, 2));
          },
          onError: function (err) {
            console.error('checkout.js error', err);
          }
        }, '#paypal-button').then(function () {
          // The PayPal button will be rendered in an html element with the id
          // `paypal-button`. This function will be called when the PayPal button
          // is set up and ready to be used.
        });
        });
      });
    </script>
@endsection