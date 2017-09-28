<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Profile Test') }}</title>

        <!-- Fonts -->

        <!--<link rel="stylesheet" href="{{ URL::asset('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css') }}">-->
        <link rel="stylesheet" href="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/bulma/0.5.3/css/bulma.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/parsley.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/myStyles.css') }}"/>

    </head>
    <body>
        <div class="management-area">
            @yield('content')
        </div>
    </body>
    @yield('js')
</html>
