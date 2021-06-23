@extends('layouts.app')

@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">CREA PIATTO</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.dishes.store') }}">
                        @csrf
                        @method('POST')

                        <div class="form-group row">
                            <select class="form-control @error('restaurant') is-invalid @enderror" id="restaurant" name="restaurant_id">
                                <option value="">Ristorante</option>
                                @foreach ($restaurants as $index => $restaurant)
                                    <option value="{{$restaurant->id}}">{{$restaurant->name}}</option>
                                @endforeach
                            </select>
                            @error('restaurant')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        {{-- <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control @error('category') is-invalid @enderror" id="category" name="category_id">
                                <option value="">Select</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div> --}}

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                                <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price" autofocus step="0.01">

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
                                <textarea id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description"></textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
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
                        <!-- upload immagine piatto -->
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Aggiungi questo Piatto') }}
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
