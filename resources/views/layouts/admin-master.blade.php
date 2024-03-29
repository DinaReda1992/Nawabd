<!DOCTYPE html>
<html dir="rtl">

<head>

    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    

    <link href="{{ URL::asset('assets/css/select2.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/app.css') }}" rel="stylesheet"> 
    <link href="{{ URL::asset('assets/css/userBlogs.css') }}" rel="stylesheet">

    {{--  template css  --}}
    <link href="{{ URL::asset('assets/css/animate.min.css') }}" rel="stylesheet"> 
    <link href="{{ URL::asset('assets/css/aos.css') }}" rel="stylesheet"> 
    <link href="{{ URL::asset('assets/css/bootstrap-tagsinput.css') }}" rel="stylesheet"> 
    <link href="{{ URL::asset('assets/css/bootstrap-rtl.min.css') }}" rel="stylesheet"> 
    <link href="{{ URL::asset('assets\css\bootstrap.css') }}" rel="stylesheet"> 
    <link href="{{ URL::asset('assets/css/custom-animation.css') }}" rel="stylesheet"> 
    <link href="{{ URL::asset('assets/css/fontawesome.css') }}" rel="stylesheet"> 
    <link href="{{ URL::asset('assets/css/fonts.css') }}" rel="stylesheet"> 
    <link href="{{ URL::asset('assets/css/framework.css') }}" rel="stylesheet"> 
    <link href="{{ URL::asset('assets/css/jquery.fancybox.min.css') }}" rel="stylesheet"> 
    <link href="{{ URL::asset('assets/css/menu.css') }}" rel="stylesheet"> 
    <link href="{{ URL::asset('assets/css/responsive.css') }}" rel="stylesheet"> 
    <link href="{{ URL::asset('assets/css/slick.css') }}" rel="stylesheet"> 
    <link href="{{ URL::asset('assets\fonts\gilroy\fonts.css') }}" rel="stylesheet"> 
    <link href="{{ URL::asset('assets\fonts\gordita\stylesheet.css') }}" rel="stylesheet"> 
    <link href="{{ URL::asset('assets\fonts\font-awesome\css\font-awesome.css') }}" rel="stylesheet"> 
    <link href="{{ URL::asset('assets\fonts\font-awesome\css\font-awesome.min.css') }}" rel="stylesheet"> 
        <link href="{{ URL::asset('assets/css/app.css') }}" rel="stylesheet"> 

    {{--  end css  --}}

    <script src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>

</head>

<body>
    <header class="bg-dark py-4 text-center text-white">
        @yield('title')
    </header>
    

    @yield('content')


    <script src="{{ URL::asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.full.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/app.js') }}"></script>
    <script src="{{ URL::asset('assets/js/categories.js') }}"></script>
    {{--  template js  --}}
    <script src="{{ URL::asset('assets\js\aos.js') }}"></script>
    <script src="{{ URL::asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/custom.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery.appear.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery.countTo.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/slick.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/theme.js') }}"></script>
    <script src="{{ URL::asset('assets/js/bootstrap-tagsinput.js') }}"></script>
    @stack('scripts')
    
</body>
    
</html>
