@extends('layouts.app')

@section('main')
<section class="section-main">
  <div class="container" id="root">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header align-center">CREA RISTORANTE</div>

                  <div class="card-body">
                      <form method="POST" action="{{ route('admin.restaurants.store') }}" enctype="multipart/form-data">
                          @csrf
                          @method('POST')

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
                              <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                              <div class="col-md-6">
                                  <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                                  @error('address')
                                      <small class="text-danger">{{ $message }}</small>
                                  @enderror
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                              <div class="col-md-6">
                                  <textarea id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description">{{ old('description') }}</textarea>

                                  @error('description')
                                      <small class="text-danger">{{ $message }}</small>
                                  @enderror
                              </div>
                          </div>

                          <div class="form-group pos-rel">
                              <div class="selectBox col-md-6 offset-md-4">
                                  <select>
                                      <option>Categoria</option>
                                  </select>
                                  <div class="overSelect" v-on:click="checkReverse()"></div>
                              </div>
                              <div class="col-md-6 offset-md-4 select-dropdown" :class="(checkClick == true) ? 'show-this' : 'hide-this' ">
                                  @foreach ($categories as $index => $category)
                                      <label>
                                          <input type="checkbox" name="category_ids[]" value="{{$category->id}}"/>{{$category->name}}</label>
                                  @endforeach
                              </div>
                          </div>

                          <!-- upload logo -->
                          <div class="form-group row">
                              <label class="col-md-4 col-form-label text-md-right" for="logo">Logo</label>
                              <div class="col-md-6">
                                <input class="form-control-file @error('logo') is-invalid @enderror" id="logo" name="logo" type="file">
                                @error('logo')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                              </div>
                          </div>
                          <!-- upload logo -->

                          <!-- upload file banner -->
                          <div class="form-group row">
                              <label class="col-md-4 col-form-label text-md-right" for="banner">Banner</label>
                              <div class="col-md-6">
                                <input class="form-control-file @error('banner') is-invalid @enderror" id="banner" name="banner" type="file">
                                @error('banner')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                              </div>
                          </div>
                            <!-- upload file banner -->

                          <div class="form-group row">
                              <div class="col-md-12 d-flex align-items-md-center justify-content-md-center">
                                  <button type="submit" class="my-button my-button-blue">
                                      {{ __('Aggiungi questo ristorante') }}
                                  </button>
                                  <a class="my-button my-button-orange ml-1" href="{{route('admin.restaurants.index')}}">
                                    Torna ai ristoranti
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
