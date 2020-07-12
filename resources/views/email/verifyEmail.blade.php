<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}"/>
    </head>
    <body>
        <h2>Test Email</h2>
        <p>{{ $test_message }}</p>
            <p>
                <a href="http://localhost/verify-email/{{$uri}}/?id={{$id}}&token={{hash('sha512', $emailToConfirm)}}" style="background-color:#ffbe00; color:#000000; display:inline-block; padding:12px 40px 12px 40px; text-align:center; text-decoration:none;" target="_blank" >
                    Verificar email agora
                </a>
            </p>
  </body>
</html>