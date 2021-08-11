<html lang="en-US">
  <head>
    <meta charset="utf-8" />
  </head>
  <body>
    <h2>{{$details['nom']}} {{$details['prenom']}}</h2>
    <p>{{ $details['message'] }}</p>
    <div style="float:right">
        {{ $details['phone'] }} / {{ $details['email'] }}
    </div>
  </body>
</html>