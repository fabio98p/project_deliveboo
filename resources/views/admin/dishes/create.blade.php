@extends('layouts.app')

@section('main')
<section class="section-main">
  <div class="container" id="root">
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
                                  <input id="restaurant_id" type="text" class="form-control @error('restaurant_id') is-invalid @enderror" name="restaurant_id" value="{{ old('restaurant_id', $restaurant->id) }}" required autocomplete="restaurant_id" autofocus readonly>
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

                          <!-- disponibile -->
                          <label for="banner">Disponibile:</label>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="available" value=1 checked>
                            <label class="form-check-label" for="inlineRadio1">Si</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="available" value=0>
                            <label class="form-check-label" for="inlineRadio2">No</label>
                          </div>

                          <div class="form-group row mb-0">
                              <div class="col-md-6 offset-md-4">
                                  <button type="submit" class="btn btn-primary">
                                      {{ __('Aggiungi questo piatto') }}
                                  </button>
                                  <a class="my-button" href="{{route('admin.restaurants.show', ['restaurant' => $restaurant->slug])}}">
                                    Torna al ristorante
                                  </a>
                              </div>
                          </div>


                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
@endsection
