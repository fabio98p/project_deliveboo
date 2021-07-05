<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Il tuo ordine</title>
  </head>
  <body>
    @foreach($dishes as $dish)
      {{$dish->name}}
    @endforeach
    <h1>Il tuo ordine e' stato ricevuto e sta arrivando</h1>
  </body>
</html>
