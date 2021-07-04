@extends('layouts.app')

@section('main')
<main>
    <div class="container-fluid banner-show-confirmation" style="background-image: url('../images/varie/deliveboo-jumbo.png')"></div>
    <section class="section-main">
        <div class="container py-2">
            <div class="row justify-content-center">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5 col-xl-5">
                    <div class="checkout-card">
                        <div class="page-top">
                            <h2>Transazione effettuata con successo!</h2>
                            <span class="text-uppercase">ID transazione: {{ $transaction }}.</span>
                        </div>
                        <div class="checkout-card-inner" style="background-color: #fff">
                            <div class="confirmation">
                                <p>Il ristorante ha ricevuto il tuo ordine</p>
                                <div class="order-code">
                                    <img alt='Barcode Generator TEC-IT' src='https://barcode.tec-it.com/barcode.ashx?data={{ $transaction }}&code=QRCode&multiplebarcodes=false&translate-esc=false&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%233e281c&bgcolor=%23ffffff&codepage=Default&qunit=Mm&quiet=0&hidehrt=False&eclevel=L'/>
                                </div>
                                <div class="mt-4 text-center">
                                    <a href="{{ route('index') }}" class="my-button-orange">Homepage</a>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

</main>
@endsection
