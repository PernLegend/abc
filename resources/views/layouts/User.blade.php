<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description"
            content="ຄິດເລື່ອງການສ້າງເວັບໄຊ ຫຼື ແອັບພິເຄຊັນ ທັງ Android ແລະ IOS ຫຼື ຕ້ອງການຮຽນ ຄິດເຖິງພວກເຮົາ ພວກເຮົາພ້ອມແລ້ວທີ່ຈະໃຫ້ບໍລິການທ່ານ">
        <meta name="keywords"
            content="HTML, CSS, JavaScript, ການຮຽນ, ການສອນ, ເປີດການຮຽນ-ການສອນ, ການຮຽນ-ການສອນ, ຫ້ອງຮຽນອອນລາຍ, ຫ້ອງຮຽນຄົນລາວ, ພັດທະນາ, ພັດທະນາເວັບໄຊ, ເວັບໄຊ, ແອັບ, ແອັປ, ແອບ, ແອັບພິເຄຊັນ, ແອັປພິເຄຊັນ, ແອປ, ເວັບໄຊສ໌, ສ້າງເວັບໄຊ, ສ້າງແອັບ, ຂຽນແອັບ, ຂຽນເວັບໄຊ">

        <meta name="author" content="Champadev">

        <link rel="icon" href="{{asset('Images/Logo/Champadev.png')}}" type="image/gif">


        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/Custom.js') }}" defer></script>


        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="//fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">


        {{-- Font Awsome  --}}
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
            integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!--Bootstrap  CSS only -->
        <link href="//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>

        <!-- ------------------------- image slide ------------------------- -->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css" />
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css" />
    </head>

    <body>
        <div id="app">
            <div id="sticky">
                <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                    <div class="container">
                        <a class="navbar-brand" href="{{ url('/') }}"> <img src="{{asset('Images/bg/logo.jpg')}}"
                                alt=""></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav mr-auto">
                            </ul>
                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item {{ ($page == 'Home') ? 'active' : ''}}">
                                    <a class="nav-link" href="{{ route('Home') }}">ໜ້າຫຼັກ</a>
                                </li>
                                <li class="nav-item {{ ($page == 'Course') ? 'active' : ''}}">
                                    <a class="nav-link" href="{{ route('Course') }}">ຫຼັກສູດ</a>
                                </li>
                                <!-- Authentication Links -->
                                @guest @if (Route::has('login'))
                                <li class="nav-item {{ ($page == 'Login') ? 'active' : ''}}">
                                    <a class="nav-link" href="{{ route('login') }}">ເຂົ້າສູ່ລະບົບ</a>
                                </li>
                                @endif @if (Route::has('register')) <li
                                    class="nav-item {{ ($page == 'register') ? 'active' : ''}}">
                                    <a class="nav-link" href="{{ route('register') }}">ສະໝັກສະມາຊິກ</a>
                                </li>
                                @endif @else

                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle btn btn-outline" href="#"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                        v-pre>
                                        {{ Auth::user()->FirstName }} </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                        @if(Auth::user()->isAdmin == "Admin")
                                        <a class="dropdown-item" href="{{ route('Admin') }}"> ແຜງຄອບຄຸມ</a>
                                        @else
                                        <a class="dropdown-item" href="{{ route('Member') }}"> ຫຼັກສູດຂອງຂ້ອຍ</a>
                                        @endif

                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            ອອກຈາກລະບົບ
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf </form>
                                    </div>
                                </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <main class="py-4"> @yield('contents') </main>
        </div>
        <!-- ------------ Footer -------------------- -->
        <div class="container-footer">
            <div class="footer-box">
                <div class="follow-me">
                    <div class="" title="facebook">
                        <a href="" class="facebook" target="_blank"> <i class="fab fa-facebook-f"></i> </a>
                    </div>
                    <div title="messenger" class="">
                        <a href="" class="messenger" target="_blank"> <i class="fab fa-facebook-messenger"></i> </a>
                    </div>
                    <div class="" title="whatsapp">
                        <a class="whatsapp" target="_blank" href=""> <i class="fab fa-whatsapp"></i></a>
                    </div>
                    <div class="" title="line">
                        <a class="line" target="_blank" href=""><i class="fab fa-line"></i></a>
                    </div>
                    <div class="" title="github">
                        <a class="github" target="_blank" href=""><i class="fab fa-github"></i></a>
                    </div>
                    <div class="" title="mail">
                        <a class="mail" target="_blank" href=""><i class="fas fa-envelope-open-text"></i></i></a>
                    </div>
                </div>
                <div class="footer-link">
                    <div class="quick-link">
                        <li><a href="">Popular courses </a></li>
                        <li><a href="">News</a></li>
                        <li><a href="">About us</a></li>
                        <li><a href="">Careers</a></li>
                    </div>
                    <div class="terms">
                        <li><a href="">Terms</a></li>
                        <li><a href="">Privacy policy</a></li>
                        <li><a href="">Sitemap</a></li>
                    </div>
                    <div class=""></div>
                </div>
                <div class="copy-right">
                    <div class="footer-Champadev"><a href="#">Champadev</a></div>
                    <div class="right-box">
                        <div class=""> &copy; 2021 All right reserver </div>
                    </div>
                </div>
            </div>
            <div class="bg"><img src="{{asset('Images/bg/library.jpg')}}" alt=""></div>
        </div>


        <script src="//code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.js"></script>
        <script>
        $(".autoplay").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
        });
        </script>
    </body>

</html>
