<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}"/>
    </head>
    <body>
        <div class="card text-center">
            <div class="card-header">
                Email verificado
            </div>
            <div class="card-body">
                <h5 class="card-title">Seu email foi verificado com sucesso</h5>
                <p class="card-text">Você está autorizado à usar o sistema!</p>
                <a href="{{config('app.url')}}" class="btn btn-primary">
                    Página Inicial
                </a>
            </div>
        </div>
    </body>
</html>