@extends('layouts.app')

@section('main')
<div class="container profile-card-info">
  <div class="page-content page-container" id="page-content">
    <div class="user-padding">
      <div class="row container d-flex justify-content-center">
        <div class="col-xl-6 col-md-12">
          <div class="user-card user-card-full">
            <div class="row user-m-l-0 user-m-r-0">
              <div class="col-sm-4 user-bg-c-lite-green user-profile">
                <div class="user-card-block text-center text-white">
                  <div class="user-m-b-25">
                    <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="user-img-radius" alt="User-Profile-Image">
                  </div>
                  <p>Benvenuto/a</p>
                  <h6 class="f-w-600">{{ $user->name }} {{ $user->lastname }}</h6>
                  <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                </div>
              </div>
              <div class="col-sm-8 user-bg-white">
                <div class="user-card-block">
                  <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Informazioni personali</h6>
                  <div class="row">
                    <div class="col-sm-6">
                      <p class="m-b-10 f-w-600">Email</p>
                      <h6 class="user-text-muted f-w-400">{{ $user->email }}</h6>
                    </div>
                    <div class="col-sm-6">
                      <p class="m-b-10 f-w-600">Password</p>
                      <h6 class="user-text-muted f-w-400">**********</h6>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <p class="m-b-10 f-w-600">Partita IVA</p>
                      <h6 class="user-text-muted f-w-400">{{ $user->p_iva}}</h6>
                    </div>
                    <div class="col-sm-6">
                      <p class="m-b-10 f-w-600">Creato il</p>
                      <h6 class="user-text-muted f-w-400">{{ $user->created_at}}</h6>
                    </div>
                  </div>
                  <div class="user-buttons user-card-block">
                    <a class="my-button" href="{{ route('admin.restaurants.index') }}">I miei ristoranti</a>
                    <a class="my-button m-t-40" href="{{ route('index') }}">Torna alla Homepage</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
