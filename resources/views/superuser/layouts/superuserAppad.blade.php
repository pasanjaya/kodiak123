<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        
        <title>{{ config('app.name', 'KodiakOffers') }}</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

        {{-- SweetAlert --}}
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script type="text/javascript" src="{{asset('js/app.js')}}"></script>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    </head>
    <body>
        @include('superuser.inc.superuserNavbar')
        @include('superuser.inc.superuserMessages')
        @yield('content')
    

        {{-- ================= Script ================== --}}
        {{-- Icons --}}
        <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
        <script>
            feather.replace()
        </script>
        
        

        

        <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
        <script>
            CKEDITOR.replace( 'article-ckeditor' );
        </script>

<script>
    // Errors alert
    var has_errors = 'false';
    @if(count($errors) > 0)
        has_errors = 'true';
    @endif

    if(has_errors == 'true'){
        swal({
            title: "Error",
            text: jQuery('#ERROR').html(),
            icon: "error",
            // html: jQuery('#ERROR').html(),
            showCloseButton: true,
        });
    }

    
    </script>

    </body>

</html>