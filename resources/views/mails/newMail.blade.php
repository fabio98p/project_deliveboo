<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Il tuo ordine</title>
  </head>
  <body>
    {{$restaurant}}
    @foreach($dishes as $dish)
      <span>{{$dish['name']}}</span>
      <span>x{{$dish['quantity']}}</span>
    @endforeach
    <h1>Il tuo ordine e' stato ricevuto e sta arrivando</h1>
  </body>
</html>
