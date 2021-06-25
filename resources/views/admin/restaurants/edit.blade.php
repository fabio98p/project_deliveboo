@extends('layouts.app')

@section('main')
<div class="container" id="root">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">MODIFICA RISTORANTE</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.restaurants.update', ['restaurant' => $restaurant->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $restaurant->name) }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address', $restaurant->address) }}" required autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description">{{ old('description', $restaurant->description) }}</textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group column pos-rel">
                            <div class="selectBox">
                                <select>
                                    <option>Categoria</option>
                                </select>
                                <div class="overSelect" v-on:click="checkReverse()"></div>
                            </div>
                            <div :class="(checkClick == true) ? 'show-this' : 'hide-this' ">
                                @foreach ($categories as $index => $category)
                                    <label for="one">
                                        <input type="checkbox" name="category_ids[]" value="{{$category->id}}" {{ $restaurant->categories->contains($category) ? 'checked' : '' }}/>{{$category->name}}</label>
                                @endforeach
                            </div>
                        </div>

                        <!-- upload logo -->
                        <div class="form-group row">
                            <label for="logo">Logo</label>
                            <input class="form-control-file @error('logo') is-invalid @enderror" id="logo" name="logo" type="file">
                            @error('logo')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <!-- upload logo -->
                        <!-- upload file banner -->
                        <div class="form-group row">
                            <label for="banner">Banner</label>
                            <input class="form-control-file @error('banner') is-invalid @enderror" id="banner" name="banner" type="file">
                            @error('banner')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                          <!-- upload file banner -->

                        <!-- disponibilità si no -->
                        {{-- <label for="banner">Disponibile:</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input form-control @error('available') is-invalid @enderror" type="radio" name="available" value="true" checked>
                            <label class="form-check-label">Si</label>
                            @error('available')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input form-control @error('available') is-invalid @enderror" type="radio" name="available" value="false">
                            <label class="form-check-label">No</label>
                            @error('available')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div> --}}
                        <!-- multiselezione categorie -->

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Modifica questo Ristorante') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
