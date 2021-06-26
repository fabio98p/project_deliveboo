@extends('layouts.app')

@section('main')
<section class="section-main">
  <div class="container" id="root">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header align-center">MODIFICA PIATTO</div>

                  <div class="card-body">
                      <form method="POST" action="{{ route('admin.dishes.update', ['dish' => $dish->id]) }}" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')

                          <div class="form-group row">
                              <label for="id" class="col-md-4 col-form-label text-md-right">Id Ristorante</label>

                              <div class="col-md-6">
                                    <input id="restaurant_id" type="text" class="form-control @error('restaurant_id') is-invalid @enderror" name="restaurant_id" value="{{ old('restaurant_id', $dish->restaurant_id) }}" required autocomplete="restaurant_id" autofocus readonly>

                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                              <div class="col-md-6">
                                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $dish->name) }}" required autocomplete="name" autofocus>

                                  @error('name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                              <div class="col-md-6">
                                  <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price', $dish->price) }}" required autocomplete="price" autofocus step="0.01">

                                  @error('price')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                              <div class="col-md-6">
                                  <textarea id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description">{{ old('description', $dish->description) }}</textarea>

                                  @error('description')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <!-- upload immagine piatto -->
                          <div class="">
                              <img src="{{asset($dish->image)}}" style="height: 50px;" alt="">
                          </div>
                          <div class="form-group row">
                              <label for="image">Immagine</label>
                              <input class="form-control-file @error('image') is-invalid @enderror" id="image" name="image" type="file">
                              @error('image')
                                  <small class="text-danger">{{ $message }}</small>
                              @enderror
                          </div>
                          <!-- upload immagine piatto -->


                          <div class="form-group row mb-0">
                              <div class="col-md-6 offset-md-4">
                                  <button type="submit" class="btn btn-primary">
                                      {{ __('Modifica questo Piatto') }}
                                  </button>
                                  <a class="my-button my-button-orange" href="{{route('admin.dishes.show', ['dish' => $dish->slug])}}">
                                      Torna al piatto
                                    </a>
                              </div>
                          </div>

                          <!-- disponibile -->
                          <label for="banner">Disponibile:</label>
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="available" value=1 {{ $dish['available'] == 1 ? 'checked' : '' }}>
                              <label class="form-check-label">Si</label>
                          </div>
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="available" value=0 {{ $dish['available'] == 0 ? 'checked' : '' }}>
                              <label class="form-check-label">No</label>
                          </div>

                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
@endsection
