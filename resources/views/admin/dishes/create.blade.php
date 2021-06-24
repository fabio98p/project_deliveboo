@extends('layouts.app')

@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">CREA PIATTO</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.dishes.store') }}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="form-group row">
                            <label for="id" class="col-md-4 col-form-label text-md-right">Id Ristorante</label>

                            <div class="col-md-6">
                                <input id="id" type="text" class="form-control @error('id') is-invalid @enderror" name="id" value="{{ $restaurant->id }}" required autocomplete="id" autofocus disabled>

                                @error('id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price" autofocus step="0.01">

                                @error('price')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description"></textarea>

                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- upload immagine piatto -->
                        <div class="form-group row">
                            <label for="image">Immagine</label>
                            <input class="form-control-file @error('image') is-invalid @enderror" id="image" name="image" type="file">
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <!-- fine upload immagine piatto -->


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Aggiungi questo Piatto') }}
                                </button>
                                <a class="my-button" href="{{route('admin.restaurants.show', ['restaurant' => $restaurant->slug])}}">
                                  Torna al ristorante
                                </a>
                            </div>
                        </div>

                        <!-- disponibile -->

                        <!-- <label for="banner">Disponibile:</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="available" value="true" checked>
                            <label class="form-check-label" for="true">Si</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="available" value="false">
                            <label class="form-check-label" for="false">No</label>
                        </div> -->

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
