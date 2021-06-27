@extends('layouts.app')

@section('main')
<section class="section-main">
<div class="container" id="root">
    <div class="row justify-content-center">
        <div class="col-md-8 offset-md-4">
            <div class="">
                <div class="col-md-12">
                    <div class="page-top">
                        <h1>Crea piatto</h1>
                        <a class="my-button my-button-orange" href="{{route('admin.restaurants.show', ['restaurant' => $restaurant->slug])}}">
                            Torna al ristorante
                        </a>
                    </div>
                </div>
                

                    <form method="POST" action="{{ route('admin.dishes.store') }}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="form-group column">
                            <label for="name" class="col-md-4 col-form-label label-personal">Id Ristorante</label>

                            <div class="col-md-6">
                                <input id="restaurant_id" type="text" class="form-control @error('restaurant_id') is-invalid @enderror" name="restaurant_id" value="{{ old('restaurant_id', $restaurant->id) }}" required autocomplete="restaurant_id" autofocus readonly>
                            </div>
                        </div>

                        <div class="form-group column">
                            <label for="name" class="col-md-4 col-form-label label-personal">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control input-personal @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group column">
                            <label for="price" class="col-md-4 col-form-label label-personal">{{ __('Prezzo') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="number" class="form-control input-personal @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price" autofocus step="0.01">

                                @error('price')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group column">
                            <label for="description" class="col-md-4 col-form-label label-personal">{{ __('Descrizione') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description"></textarea>

                                  @error('description')
                                      <small class="text-danger">{{ $message }}</small>
                                  @enderror
                            </div>
                        </div>

                        <div class="form-group column">
                            <div class="col-md-6">
                                <label for="image" class="label-personal">Immagine</label>
                                <input class="form-control-file @error('image') is-invalid @enderror" id="image" name="image" type="file">
                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- INSERIRE DISPONIBILITA PIATTO --}}
                        <div class="form-group">
                            <div class="col-md-6">
                                <label for="available" class="label-personal">Disponibilità</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="available" value=1 checked>
                                    <label class="form-check-label" for="inlineRadio1">Si</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="available" value=0>
                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                </div>
                            </div>
                        </div>
                                  
                        <div class="form-group column mb-0">
                            <div class="col-md-6 column">
                                <button type="submit" class="my button my-button-orange">
                                    {{ __('Aggiungi questo Piatto') }}
                                </button>
                                
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
