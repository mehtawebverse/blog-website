




<div class="navbar-area header-one" id="navbar">

    <div class="header-top">
        <div class="container-fluid">
            <div class="row align-items-center">
                {{-- <div class="col-lg-4 col-md-6 col-5">
    <button class="subscribe-btn" data-bs-toggle="modal" data-bs-target="#newsletter-popup">Subscribe<i class="flaticon-right-arrow"></i></button>
    </div> --}}
                <div class="col-lg-4 col-md-6 md-none">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <img class="logo-light" src="{{ asset('img/logo-white.webp') }}" alt="logo">
                        {{-- <img class="logo-dark" src="{{ asset('img/logo-white.webp') }}" alt="logo"> --}}
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-7">
                    <ul class="social-profile list-style">
                        <li><a href="https://www.fb.com/" target="_blank"><i class="ri-facebook-fill"></i></a></li>
                        <li><a href="https://www.twitter.com/" target="_blank"><i class="ri-twitter-fill"></i></a></li>
                        <li><a href="https://www.instagram.com/" target="_blank"><i class="ri-instagram-line"></i></a>
                        </li>
                        <li><a href="https://www.linkedin.com/" target="_blank"><i class="ri-linkedin-fill"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade searchModal" id="searchModal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="search-form" action="{{route('search')}}" method="GET" >
                    <input type="text" name="query" class="form-control" placeholder="Search here....">
                    <button type="submit"><i class="fi fi-rr-search"></i></button>
                </form>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="ri-close-line"></i></button>
            </div>
        </div>
    </div>





    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg">



            <a class="navbar-brand d-lg-none" href="{{ route('home') }}">
                <img class="logo-light" src="{{ asset('img/logo-white.webp') }}" alt="logo">
                <img class="logo-dark" src="{{ asset('img/logo-white.webp') }}" alt="logo">
            </a>
            <button type="button" class="search-btn d-lg-none" data-bs-toggle="modal" data-bs-target="#searchModal">
                <i class="flaticon-loupe"></i>

                <button type="button" class="search-btn d-lg-none" data-bs-toggle="modal"
                    data-bs-target="#searchModal">
                    <i class="flaticon-loupe"></i>
                </button>
                <a class="navbar-toggler" data-bs-toggle="offcanvas" href="#navbarOffcanvas" role="button"
                    aria-controls="navbarOffcanvas">
                    <span class="burger-menu">
                        <span class="top-bar"></span>
                        <span class="middle-bar"></span>
                        <span class="bottom-bar"></span>
                    </span>
                </a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav mx-auto">
                        <li class = "nav-item">

                            @if (auth()->check())
                                @if (auth()->user()->id == 1)
                                    <a href="{{ route('dashAdmin') }}" class="nav-link">
                                        Home
                                    </a>
                                @else
                                    <a class="nav-link" href="{{ route('dashUser') }}">Home</a>
                                @endif
                            @endif

                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('routeToLatestBlogs') }}">Feeds</a>
                        </li>


                        <li class="nav-item">
                            <a href="" class="nav-link">
                                About Us
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="" class="nav-link">
                                Contact Us
                            </a>
                        </li>



                        <li class="nav-item">
                            <a href="" class="nav-link">
                                Privacy Policy
                            </a>
                        </li>




                    </ul>






                    <div class="others-option d-flex align-items-center">

                        <div class="option-item">
                            <button type="button" class="search-btn" data-bs-toggle="modal"
                                data-bs-target="#searchModal">
                                <i class="flaticon-loupe"></i>
                            </button>
                        </div>

                        <div class="option-item">

                            @if (auth()->check())
                                <form method = 'POST' action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="btn-two">Logout</button>
                                </form>
                            @else
                                <a class="btn-two" href="{{ route('login') }}">Login</a>
                                <a class="btn-two" href="{{ route('register') }}">Register</a>
                            @endif


                            {{-- <a href="login.html" class="btn-two">Sign In</a> --}}


                        </div>



                    </div>


                </div>
    </div>
    </nav>
</div>
</div>
