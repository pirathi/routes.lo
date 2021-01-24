<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Routes.lk') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js" ></script>
    <script href="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/popper.min.js" ></script>
    {{-- <script href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>  --}}
    <!-- share -->
    <script src="{{ asset('js/share.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- og -->
    <meta property="og:title" content="Routes.lk|" />
    <meta property="og:description" content="Get from SEO newbie to SEO pro in 8 simple steps." />
    <meta property="og:image" content="{{ asset('images/logo.png') }}" />
    
</head>


<body>
    <div id="app">
        
            {{-- <nav class="navbar navbar-expand-lg navbar-dark">
                <a class="navbar-brand" href="/">  <img src="https://lh3.googleusercontent.com/QZZHErl58AWL6PFYoRKbz07SEZmN00HGgwetY4fTwpcPwd7730Uq-Ed9LUYoOAPAsJFrs6KFLyS-LQ83GmMdxka2me_CCVDzq9T6mKZ3EbVFsQMEqbTeY-CjIeFiWEnq3Cp-gVrN=w2400" width="30" height="30" class="d-inline-block align-top" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Example 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Example 2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Example 3</a>
                    </li>
                    </ul>
                </div>
            </nav> --}}
            @if(Request::is('/')) 
                <div class="rect_home" id="green">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 wide-intro">
                                <div class="logo">
                                    <a href="/"><img src="{{ asset('images/logo.png') }}" alt="routes.lk" /></a>
                                </div>
                                
                                <h1>Srilanka's No.1 Classified Search Engine</h1>
                                <h3>Add your business details here and grow along with us</h3>

                                <div class="menu">
                                    {{-- <ul class="navbar-nav">
                                        <li class="nav-item active"><a class="nav-link" href="#">Add Listing</a></li>
                                        <li class="nav-item active"><a class="nav-link" href="#">Add Listing</a></li>
                                    </ul> --}}
                                    <span><a href="/">Home </a> | </span><span><a href="{{ route('add_listing.create') }}">Add Listing</a>  | </span> <span><a href="/about_us">About Us</a> | </span> <span>Contact Us  </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else 
                <div class="rect" id="green">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 wide-intro">
                                <div class="logo">
                                    <a href="/"><img src="{{ asset('images/logo.png') }}" alt="routes.lk" /></a>
                                </div>
                                <div class="menu">
                                    {{-- <ul class="navbar-nav">
                                        <li class="nav-item active"><a class="nav-link" href="#">Add Listing</a></li>
                                        <li class="nav-item active"><a class="nav-link" href="#">Add Listing</a></li>
                                    </ul> --}}
                                    <span><a href="/">Home </a> | </span><span><a href="{{ route('add_listing.create') }}">Add Listing</a>  | </span> <span><a href="/about_us">About Us</a> | </span> <span>Contact Us  </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            

        <main class="">
            @yield('content')
        </main>

        <div class="container-fluid text-center bg-dark text-light">
            <div class="row p-2">
                <div class="col-md-12">© {{ now()->year }} Copyright : Routes.lk</div>
                </div>
        </div>
    </div>
    
    @stack('script')
</body>

<script>
    var popupSize = {
        width: 780,
        height: 550
    };

    $(document).on('click', '#social-links >ul>li> a', function(e){

        var
            verticalPos = Math.floor(($(window).width() - popupSize.width) / 2),
            horisontalPos = Math.floor(($(window).height() - popupSize.height) / 2);

        var popup = window.open($(this).prop('href'), 'social',
            'width='+popupSize.width+',height='+popupSize.height+
            ',left='+verticalPos+',top='+horisontalPos+
            ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

        if (popup) {
            popup.focus();
            e.preventDefault();
        }

    });
</script>

</html>
