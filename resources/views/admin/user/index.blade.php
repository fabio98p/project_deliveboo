@extends('layouts.app')

@section('main')
<div class="container">
  <h1>Profilo di {{ $user->name }}</h1>
  <p>P_Iva: {{ $user->p_iva}}</p>

</div>

@endsection
