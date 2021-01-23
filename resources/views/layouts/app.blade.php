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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    
</head>
<style>
    .navbar{
        position: fixed;
        width:100%;
        transition: background-color 1s;

    }
    .rect_home{
        width:100%;
        height:50vh;
    }
    .rect{
        width:100%;
        height:35vh;
    }
    #green{
        background-color:#4f946c;
        background-image: url("{{ asset('images/header_bg.jpeg') }}");
        background-position: center;
    }
    #blue{
        background-color:#7eb3a7;
    }

    .h_district {
        width: 50%;
        border: solid 1px #f5f5f5;
        padding: 25px 15px;
    }
    .h_district a:hover {
        text-decoration: none;
    }
    .cat_list {
        width: 50%;
        border: solid 1px #ddd;
        margin-top: -1px;
        background: #fff;
        padding: 15px;
        text-align: center;
        overflow: hidden;
        display: block;
    }

    .cat_list a:hover {
        transition: scale(1.2);
        text-decoration: none;
    }
    .list_card {
        height: 270px;
    }

    #social-links ul {
        list-style: none;
        margin-right: -22px;
    }

    #social-links .details {
        list-style: none;
        display: flex;
    }
    #social-links ul li {
        margin: 0 5px;
    }

    .fa-2x {
        font-size: 19px;
    }
    /*search box css start here*/
    .search-sec{
        padding: 2rem;
        margin-bottom: 0;
    }
    .search-slt{
        display: block;
        width: 100%;
        font-size: 0.875rem;
        line-height: 1.5;
        color: #55595c;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        height: calc(3rem + 2px) !important;
        border-radius:0;
    }

    /* .btnsearch {
        background-color: #045bbd;
    } */
    .wrn-btn{
        background-color: #045bbd;
        width: 100%;
        font-size: 16px;
        font-weight: 400;
        text-transform: capitalize;
        height: calc(3rem + 2px) !important;
        border-radius:0;
    }
    @media (min-width: 992px){
        .search-sec{
            position: relative;
            top: -113px;
            background: rgba(26, 70, 104, 0.51);
        }
        
    }

    @media screen and (max-width: 600px) {
        .rect{
            width:100%;
            height:30vh;
        }

        .rect_home{
            width:100%;
            height:60vh;
        }

        .logo img {
            width: 300px;
        }

        .logo {
            text-align: center;
            margin: 20px 0 20px;
        }

    }

    @media (max-width: 992px){
        .search-sec{
            background: #1A4668;
        }

    }

    .content-box {
        background: #ffffff;
        border-radius: 3px;
        position: relative;
        /* width: 100%; */
        box-shadow: 0 1px 1px rgba(180,180,180,0.5);
        overflow: hidden;
        margin-bottom: 30px;
        border: 1px solid #d6d6d6;
    }

    .box-title {
        border-bottom: 0 solid #fafafa;
        background-color: #fafafa;
    }
    .box-title h2 {
        margin: 15px 0;
        padding: 0;
        font-size: 18px;
        line-height: normal;
        font-weight: 500;
        text-transform: uppercase;
        display: inline-block;
    }

    .wide-intro {
        text-align: center;
    }

    .wide-intro h1 {
        text-transform: uppercase;
        color: #fff;
        text-align: center;
        font-weight: 700;
        font-size: 35px;
    }

    .logo {
        text-align: center;
        margin: 5px 0 5px;
    }

    .wide-intro span {
        color: white;
        font-size: 20px;
        font-weight: 600;
    }
    
    .wide-intro span a {
        text-decoration: none;
        color: #ffffff;
    }
    .logo img {
        width: 350px;
    }
    .error{
    color: red;
  }
</style>
<script>
$(document).ready(function() {
  $(window).scroll(function() {
    if($(this).scrollTop() < $("#green").height()){
       $(".navbar").removeClass("bg-dark");
    }
    else{
       $(".navbar").addClass("bg-dark");
    }
  });
});
</script>
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
                                <h3>Find Your Exact Location and Coordinations</h3>

                                <div class="menu">
                                    {{-- <ul class="navbar-nav">
                                        <li class="nav-item active"><a class="nav-link" href="#">Add Listing</a></li>
                                        <li class="nav-item active"><a class="nav-link" href="#">Add Listing</a></li>
                                    </ul> --}}
                                    <span><a href="/">Home | </a></span><span><a href="{{ route('add_listing.create') }}">Add Listing</a>  | </span> <span>About Us | </span> <span>Contact Us  </span>
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
                                    <span><a href="/">Home | </a></span><span><a href="{{ route('add_listing.create') }}">Add Listing</a>  | </span> <span>About Us | </span> <span>Contact Us  </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            

        <main class="">
            @yield('content')
        </main>
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
