@extends('layouts.app')

@section('main')
<section class="section-main">
<div class="container" id="root">
    <div class="row justify-content-center">
        <div class="col-md-8 offset-md-4">
            <div class="">
                <div class="col-md-12">
                    <div class="page-top">
                        <h1>Crea ristorante</h1>
                    </div>
                </div>
                

                    <form method="POST" action="{{ route('admin.restaurants.store') }}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="form-group column">
                            <label for="name" class="col-md-4 col-form-label label-personal">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group column">
                            <label for="address" class="col-md-4 col-form-label label-personal">{{ __('Indirizzo') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                                @error('address')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group column">
                            <label for="description" class="col-md-4 col-form-label label-personal">{{ __('Descrizione') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description">{{ old('description') }}</textarea>

                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group column pos-rel">
                            <label for="description" class="col-md-4 col-form-label label-personal">{{ __('Categoria') }}</label>
                            <div class="col-md-6">
                                <div class="selectBox">
                                    <select>
                                        <option>Scegli</option>
                                    </select>
                                    <div class="overSelect" v-on:click="checkReverse()"></div>
                                </div>
                                <div :class="(checkClick == true) ? 'show-this' : 'hide-this' ">
                                    @foreach ($categories as $index => $category)
                                        <label>
                                            <input type="checkbox" name="category_ids[]" value="{{$category->id}}"/>{{$category->name}}</label>
                                    @endforeach
                                </div>
                            </div>
                            
                        </div>

                        <!-- upload logo -->
                        <div class="form-group column">
                            <div class="col-md-6">
                                <label for="logo" class="label-personal">Logo</label>
                                <input class="form-control-file @error('logo') is-invalid @enderror" id="logo" name="logo" type="file">
                                @error('logo')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        
                        <!-- upload logo -->
                        <!-- upload file banner -->
                        <div class="form-group column">
                            <div class="col-md-6">
                                <label for="banner" class="label-personal">Banner</label>
                                <input class="form-control-file @error('banner') is-invalid @enderror" id="banner" name="banner" type="file">
                                @error('banner')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                                  <a class="my-button my-button-orange ml-1" href="{{route('admin.restaurants.index')}}">
                                    Torna ai ristoranti
                                  </a>
                        <div class="form-group column mb-0">
                            <div class="col-md-6">
                                <button type="submit" class="my button my-button-orange">
                                    {{ __('Aggiungi questo Ristorante') }}
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
