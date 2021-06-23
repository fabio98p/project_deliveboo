@extends('layouts.app')

@section('main')
<div class="container">
  <h1>Profilo di {{ $user->name }}</h1>
  <img src="https://1.bp.blogspot.com/-qxpQhrAf71I/UGLraxbJpRI/AAAAAAAAQF4/jvVGIiOMuEA/s320/facebookanonimo.jpg" alt="">
  <p>P_Iva: {{ $user->p_iva}}</p>

</div>

@endsection
