<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')
    </title>

    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

  <!-- Styles -->
    <link href="{{asset('frontend/css/custom.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/bootsrap5.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/owl.theme.default.min.css')}}" rel="stylesheet">

    {{-- google font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">

    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css" integrity="sha384-X8QTME3FCg1DLb58++lPvsjbQoCT9bp3MsUU3grbIny/3ZwUJkRNO8NPW6zqzuW9" crossorigin="anonymous">
 
</head>
<body>
  
        @include('layouts.inc.frontnavbar')
        <div class="content">
          @yield('content')
        </div>
        
 <!--   Core JS Files   -->
    <script src="{{ asset('frontend/js/jquery-3.6.1.min.js') }}" ></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}" ></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    
  
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    @if (session('status'))
    <script>
      swal("{{session('status')}}");
    </script>
      
    @endif
    
 @yield('scripts')
    
</body>
</html>
