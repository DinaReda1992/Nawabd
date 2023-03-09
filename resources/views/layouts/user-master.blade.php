<!DOCTYPE html>
<html dir="rtl">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">


    <link href="{{ URL::asset('assets/css/select2.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/userBlogs.css') }}" rel="stylesheet">
    {{--  template css  --}}
    <link href="{{ URL::asset('assets/css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/aos.css') }}" rel="stylesheet">    
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
    <link href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets\fonts\gilroy\fonts.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets\fonts\gordita\stylesheet.css') }}" rel="stylesheet">
    {{--  <link href="{{ URL::asset('assets\fonts\font-awesome\css\font-awesome.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets\fonts\font-awesome\css\font-awesome.min.css') }}" rel="stylesheet">  --}}
    <link href="{{ URL::asset('assets/css/app.css') }}" rel="stylesheet">

    {{--  end css  --}}

    <script src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
    @yield('meta_tags')


</head>

<body data-aos-easing="ease" data-aos-duration="1000" data-aos-delay="0" style="overflow: visible;">
 
    <header>
    <div class="col-xl-9 col-lg-10 m-auto py-4 text-center text-white d-flex justify-content-between px-4 align-items-center">
        <a href="{{ url('https://blog.nawabd.com/') }}"><img src="\assets\images\logo\nawabd-logo.png" /></a>
        <a href={{ url('https://nawabd.com/') }} class="btn  px-4 fw-bold our-store-btn" title="متجر نوابض ">متجر نوابض</a>
    </div>
    </header>
    @foreach ($banner as $ban)
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a class="d-block w-100" href={{ url('https://nawabd.com/') }}>
                        <img src="{{ asset('/storage/' . $ban->logo) }}" class='image-meta w-100 bnr-img' style="height: 186px;">
                    </a>
                </div>
            </div>
        </div>
    @endforeach
    <div class="fancy-hero-one p-4">
        <div class="bubble-one"></div>
        <div class="bubble-two"></div>
        <div class="bubble-three"></div>
        <div class="bubble-four"></div>
        <div class="bubble-five"></div>
        <div class="bubble-six"></div>
    </div> <!-- /.fancy-hero-one -->
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
    @stack('scripts')
</body>

</html>
