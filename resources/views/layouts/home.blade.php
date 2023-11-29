<!doctype html>
<html lang="en" class="light-theme">


<!-- Mirrored from codervent.com/shopingo/demo/shopingo_V1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Oct 2023 15:19:26 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset('assets/images/logo_figure.jpg') }}" type="image/webp" />

    <!-- CSS files -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500;600&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/slick/slick.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/slick/slick-theme.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/dark-theme.css')}}" rel="stylesheet">

    <title>TNWatch</title>
    @livewireStyles
</head>

<body>


<!--page loader-->
<div class="loader-wrapper">
    <div class="d-flex justify-content-center align-items-center position-absolute top-50 start-50 translate-middle">
        <div class="spinner-border text-dark" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
</div>
<!--end loader-->

<!--start top header-->
<header class="top-header">
    <nav class="navbar navbar-expand-xl w-100 navbar-dark container gap-3">
        <a class="navbar-brand d-none d-xl-inline" href="{{route('home.home')}}"><img src="{{ asset('assets/images/mylogo1.jpg') }}" class="logo-img" alt=""></a>
        <a class="mobile-menu-btn d-inline d-xl-none" href="javascript:;" data-bs-toggle="offcanvas"
           data-bs-target="#offcanvasNavbar">
            <i class="bi bi-list"></i>
        </a>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar">
            <div class="offcanvas-header">
                <div class="offcanvas-logo"><img src="{{ asset('assets/images/mylogo1.jpg') }}" class="logo-img" alt="">
                </div>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body primary-menu">
                <ul class="navbar-nav justify-content-start flex-grow-1 gap-1">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home.home')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home.product', ['id'=>'all'])}}">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home.about')}}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home.cart')}}">Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home.checkout')}}">Checkout</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home.watchcare')}}">Watchcare</a>
                    </li>
                </ul>
            </div>
        </div>
        <ul class="navbar-nav secondary-menu flex-row">
            <li class="nav-item" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight">
                <a class="nav-link position-relative" href="javascript:;">
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <div class="cart-badge">{{$cart->count()}}</div>
                        <i class="bi bi-basket2"></i>
                    @endif
                </a>
            </li>
            @if(\Illuminate\Support\Facades\Auth::user())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                        {{\Illuminate\Support\Facades\Auth::user()->name}}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('profile.edit')}}">Profile</a></li>
                        @if(\Illuminate\Support\Facades\Auth::user()->role == true)
                            <li><a class="dropdown-item" href="{{route('admin.home')}}">Dashboard</a></li>
                        @endif
                        <li><a class="dropdown-item" href="{{route('home.order')}}">Your Orders</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-responsive-nav-link :href="route('logout')"
                                                       onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-responsive-nav-link>
                            </form>
                        </li>

                    </ul>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">Sign in</a>
                </li>
            @endif
        </ul>
    </nav>
</header>
<!--end top header-->


{{ $slot  }}


<!--start footer-->
<section class="footer-section bg-section-2 section-padding">
    <div class="container">
        <div class="row row-cols-1 row-cols-lg-4 g-4">
            <div class="col">
                <div class="footer-widget-6">
                    <img src="{{ asset('assets/images/mylogo1.jpg') }}" class="logo-img mb-3" alt="">
                    <h5 class="mb-3 fw-bold">About Us</h5>
                    <p class="mb-2">We provide a variety of watches from famous brands in the world.</p>

                    <a class="link-dark" href="{{route('home.about')}}">Read More</a>
                </div>
            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
            <div class="col">
                <div class="footer-widget-9">
                    <h5 class="mb-3 fw-bold">Follow Us</h5>
                    <div class="social-link d-flex align-items-center gap-2">
                        <a href="javascript:;"><i class="bi bi-facebook"></i></a>
                        <a href="javascript:;"><i class="bi bi-twitter"></i></a>
                        <a href="javascript:;"><i class="bi bi-linkedin"></i></a>
                        <a href="javascript:;"><i class="bi bi-youtube"></i></a>
                        <a href="javascript:;"><i class="bi bi-instagram"></i></a>
                    </div>
                    <div class="mb-3 mt-3">
                        <h5 class="mb-0 fw-bold">Support</h5>
                        <p class="mb-0 text-muted">nghetan7@gmail.com</p>
                    </div>
                    <div class="">
                        <h5 class="mb-0 fw-bold">Hot Line</h5>
                        <p class="mb-0 text-muted">1900 1900</p>
                    </div>
                </div>
            </div>
        </div><!--end row-->
        <div class="my-5"></div>


    </div>
</section>
<!--end footer-->

{{--<footer class="footer-strip text-center py-3 bg-section-2 border-top positon-absolute bottom-0">--}}
{{--    <p class="mb-0 text-muted">© 2022. www.example.com | All rights reserved.</p>--}}
{{--</footer>--}}

@if(\Illuminate\Support\Facades\Auth::check())
    <!--start cart-->
    <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasRight"
         aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header bg-section-2">
            <h5 class="mb-0 fw-bold" id="offcanvasRightLabel">{{$cart->count()}} items in the cart</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="cart-list">
                @foreach($cart as $item)
                    <div class="d-flex align-items-center gap-3">
                        <div class="bottom-product-img">
                            <a href="product-details.html">
                                <img src="{{asset('storage/uploads/'.$item->product->image)}}" width="60" alt="">
                            </a>
                        </div>
                        <div class="">
                            <h6 class="mb-0 fw-light mb-1">{{$item->product->name}}</h6>
                            <p class="mb-0"><strong>{{$item->quantity}} X {{$item->product->price}}$</strong>
                            </p>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
        <div class="offcanvas-footer p-3 border-top">
            <div class="d-grid">
                <a href="{{route('home.cart')}}" class="btn btn-lg btn-dark btn-ecomm px-5 py-3">View Cart</a>
            </div>
        </div>

    </div>
    <!--end cat-->
@endif



<!--Start Back To Top Button-->
<a href="javaScript:;" class="back-to-top"><i class="bi bi-arrow-up"></i></a>
<!--End Back To Top Button-->


<!-- JavaScript files -->
@livewireScripts
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/plugins/slick/slick.min.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
<script src="{{asset('assets/js/index.js')}}"></script>
<script src="{{asset('assets/js/loader.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>


<!-- Mirrored from codervent.com/shopingo/demo/shopingo_V1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Oct 2023 15:21:07 GMT -->
</html>
