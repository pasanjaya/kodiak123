<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{asset('css/app.css')}}">

        <title>{{config('app.name'), 'LSAPP'}}</title>

    </head>
    <body>
        @include('inc.navbar')
        @yield('content')
    

        {{-- ================= Script ================== --}}
        {{-- Icons --}}
        <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
        <script>
            feather.replace()
        </script>

        <script type="text/javascript" src="{{asset('js/app.js')}}"></script>

    </body>

</html>