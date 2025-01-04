<!DOCTYPE html>
<html lang="en">
<!--<< Header Area >>-->
@php
    $cartCount = 0;
    if(auth()->user()){
        $cartCount = \App\Models\Cart::where('user_id', auth()->user()->id)->count(); 
    }
@endphp

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="gramentheme">
    <meta name="description" content="@yield('title')">
    <!-- ======== Page title ============ -->
    <title>@yield('title')</title>
    <!--<< Favcion >>-->
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}">
    <!--<< Bootstrap min.css >>-->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!--<< All Min Css >>-->
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <!--<< Animate.css >>-->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <!--<< Magnific Popup.css >>-->
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <!--<< MeanMenu.css >>-->
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.css') }}">
    <!--<< Swiper Bundle.css >>-->
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
    <!--<< Icomoon.css >>-->
    <link rel="stylesheet" href="{{ asset('assets/css/icomoon.css') }}">
    <!--<< Main.css >>-->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
</head>

<body>
    <!-- Back To Top start -->
    <button id="back-top" class="back-to-top">
        <i class="fa-solid fa-chevron-up"></i>
    </button>

    <!-- Offcanvas Area start  -->
    <div class="fix-area">
        <div class="offcanvas__info">
            <div class="offcanvas__wrapper">
                <div class="offcanvas__content">
                    <div class="offcanvas__top mb-5 d-flex justify-content-between align-items-center">
                        <div class="offcanvas__logo">
                            <a href="index.html">
                                <img src="{{ asset('assets/img/logo/black-logo.svg') }}" alt="logo-img">
                            </a>
                        </div>
                        <div class="offcanvas__close">
                            <button>
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <p class="text d-none d-xl-block">
                    Trang web của chúng tôi là điểm đến lý tưởng dành cho những người yêu sách, nơi bạn có thể tìm thấy hàng ngàn tựa sách từ văn học kinh điển, sách giáo dục, sách kỹ năng sống, đến những cuốn tiểu thuyết hiện đại hấp dẫn.
                    </p>
                    <div class="mobile-menu fix mb-3"></div>
                    <div class="offcanvas__contact">
                        <h4>Thông Tin Liên Hệ</h4>
                        <ul>
                            <li class="d-flex align-items-center">
                                <div class="offcanvas__contact-icon">
                                    <i class="fal fa-map-marker-alt"></i>
                                </div>
                                <div class="offcanvas__contact-text">
                                    <a target="_blank" href="#">Main Street, Melbourne, Australia</a>
                                </div>
                            </li>
                            <li class="d-flex align-items-center">
                                <div class="offcanvas__contact-icon mr-15">
                                    <i class="fal fa-envelope"></i>
                                </div>
                                <div class="offcanvas__contact-text">
                                    <a href="mailto:info@example.com"><span
                                            class="mailto:info@example.com">info@example.com</span></a>
                                </div>
                            </li>
                            <li class="d-flex align-items-center">
                                <div class="offcanvas__contact-icon mr-15">
                                    <i class="fal fa-clock"></i>
                                </div>
                                <div class="offcanvas__contact-text">
                                    <a target="_blank" href="#">Mod-friday, 09am -05pm</a>
                                </div>
                            </li>
                            <li class="d-flex align-items-center">
                                <div class="offcanvas__contact-icon mr-15">
                                    <i class="far fa-phone"></i>
                                </div>
                                <div class="offcanvas__contact-text">
                                    <a href="tel:+11002345909">+11002345909</a>
                                </div>
                            </li>
                        </ul>
                        <div class="header-button mt-4">
                            <a href="contact.html" class="theme-btn text-center">
                                Get A Quote <i class="fa-solid fa-arrow-right-long"></i>
                            </a>
                        </div>
                        <div class="social-icon d-flex align-items-center">
                            <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://x.com/"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
                            <a href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="offcanvas__overlay"></div>

    <div class="header-top-1">
        <div class="container">
            <div class="header-top-wrapper">
                <ul class="contact-list">
                    <li>
                        <i class="fa-regular fa-phone"></i>
                        <a href="tel:+20866660112">0999.999.999</a>
                    </li>
                    <li>
                        <i class="far fa-envelope"></i>
                        <a href="mailto:info@example.com">info@example.com</a>
                    </li>
                    <li>
                        <i class="far fa-clock"></i>
                        <span>Thứ 2 - Thứ 7: 09h00 - 18h00</span>
                    </li>
                </ul>
                <ul class="list">
                    @if (auth()->user())
                        <li><i class="fa-light fa-user"></i>
                            <a href="{{ route('user.customer.index') }}">
                                {{ auth()->user()->name }}
                            </a>
                        </li>
                        <li><i class="fa-solid fa-arrow-right-from-bracket"></i>
                            <a href="{{ route('user.logout.index') }}">
                                Đăng Xuất
                            </a>
                        </li>
                    @else
                        <li>
                            <i class="fa-light fa-user-plus"></i>
                            <button data-bs-toggle="modal" data-bs-target="#registrationModal">
                                Đăng Ký
                            </button>
                        </li>
                        <li><i class="fa-light fa-user"></i>
                            <button data-bs-toggle="modal" data-bs-target="#loginModal">
                                Đăng Nhập
                            </button>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>

    <!-- Sticky Header Section start  -->
    <header class="header-1 sticky-header" style="border-bottom: 1px solid #d8dce0;">
        <div class="mega-menu-wrapper">
            <div class="header-main">
                <div class="container">
                    <div class="row">
                        <div class="col-6 col-md-6 col-lg-10 col-xl-8 col-xxl-10">
                            <div class="header-left">
                                <div class="logo">
                                    <a href="{{ route('user.home.index') }}" class="header-logo" style="width: 100%;">
                                        <img src="{{ asset('assets/img/logo/white-logo.svg') }}" style="width: 100%;" alt="logo-img">
                                    </a>
                                </div>
                                <div class="mean__menu-wrapper">
                                    <div class="main-menu">
                                        <nav>
                                            <ul>
                                                <li>
                                                    <a href="{{ route('user.home.index') }}">
                                                        Trang Chủ
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('user.book.index') }}">
                                                        Sản Phẩm
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('user.category.index') }}">
                                                        Thể Loại
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('user.contact.index') }}">
                                                        Liên Hệ
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('user.home.index') }}">
                                                        Tin Tức
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-6 col-lg-2 col-xl-4 col-xxl-2">
                            <div class="header-right">
                                <div class="category-oneadjust gap-6 d-flex align-items-center">
                                    <form action="{{ route('user.book.index') }}" class="search-toggle-box d-md-block">
                                        <div class="input-area">
                                            <input style="border-radius: 100px;" type="text" name="search" placeholder="Tìm kiếm">
                                            <button type="submit" class="cmn-btn">
                                                <i class="far fa-search"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="menu-cart">
                                    <a href="wishlist.html" class="cart-icon">
                                        <i class="fa-regular fa-heart"></i>
                                    </a>
                                    <a href="{{ route('user.cart.index') }}" class="cart-icon">
                                        <i class="fa-regular fa-cart-shopping"></i>
                                    </a>
                                    <div class="header-humbager ml-30">
                                        <a class="sidebar__toggle" href="javascript:void(0)">
                                            <div class="bar-icon-2">
                                                <img src="{{ asset('assets/img/icon/icon-13.svg') }}" alt="img">
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </header>

    <!-- Main Header Section start  -->
    <header class="header-1" style="border-bottom: 1px solid #d8dce0;">
        <div class="mega-menu-wrapper">
            <div class="header-main">
                <div class="container">
                    <div class="row">
                        <div class="col-6 col-md-6 col-lg-10 col-xl-8 col-xxl-10">
                            <div class="header-left">
                                <div class="logo">
                                    <a href="{{ route('user.home.index') }}" class="header-logo" style="width: 100%;">
                                        <img src="{{ asset('assets/img/logo/white-logo.svg') }}" style="width: 100%;" alt="logo-img">
                                    </a>
                                </div>
                                <div class="mean__menu-wrapper">
                                    <div class="main-menu">
                                        <nav id="mobile-menu">
                                            <ul>
                                                <li>
                                                    <a href="{{ route('user.home.index') }}">
                                                        Trang Chủ
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('user.book.index') }}">
                                                        Sản Phẩm
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('user.category.index') }}">
                                                        Thể Loại
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('user.contact.index') }}">
                                                        Liên Hệ
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('user.home.index') }}">
                                                        Tin Tức
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-6 col-lg-2 col-xl-4 col-xxl-2">
                            <div class="header-right">
                                <div class="category-oneadjust gap-6 d-flex align-items-center">
                                    <form action="{{ route('user.book.index') }}" class="search-toggle-box d-md-block">
                                        <div class="input-area">
                                            <input style="border-radius: 100px;" type="text" name="search" placeholder="Tìm kiếm">
                                            <button type="submit" class="cmn-btn">
                                                <i class="far fa-search"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="menu-cart">
                                    <a href="wishlist.html" class="cart-icon">
                                        <i class="fa-regular fa-heart"></i>
                                    </a>
                                    <a href="{{ route('user.cart.index') }}" class="cart-icon" >
                                        <i class="fa-regular fa-cart-shopping"></i>
                                    </a>
                                    <div class="header-humbager ml-30">
                                        <a class="sidebar__toggle" href="javascript:void(0)">
                                            <div class="bar-icon-2">
                                                <img src="{{ asset('assets/img/icon/icon-13.svg') }}" alt="img">
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </header>

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: fit-content;">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="close-btn">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="identityBox" style="display: block; place-items: normal;">
                        <div class="form-wrapper">
                            <h1 id="loginModalLabel">Đăng nhập</h1>
                            <div class="my-3 text-center">
                                <p class="error"></p>
                            </div>
                            <input class="inputField username" type="text" name="username" placeholder="Tài khoản">
                            <input class="inputField password" type="password" name="password" placeholder="Mật khẩu">
                            <div class="input-check remember-me">
                                <div class="checkbox-wrapper">
                                    <input type="checkbox" class="form-check-input" name="save-for-next"
                                        id="saveForNext">
                                    <label for="saveForNext">Nhớ Mật Khẩu</label>
                                </div>
                                <div class="text"> <a href="#">Quên mật khẩu?</a> </div>
                            </div>
                            <div class="loginBtn">
                                <a href="#" class="theme-btn rounded-0"> Đăng Nhập</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Registration Modal -->
    <div class="modal fade" id="registrationModal" tabindex="-1" aria-labelledby="registrationModalLabel"
    aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="close-btn">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="identityBox" style="display: block; place-items: normal;">
                        <div class="form-wrapper">
                            <h1 id="registrationModalLabel">Tạo tài khoản!</h1>
                            <div class="my-3 text-center">
                                <p class="error-register"></p>
                            </div>
                            <input class="inputField" type="text" name="name" id="name" placeholder="Họ tên" required>

                            <!-- Tên người dùng -->
                            <input class="inputField" type="text" name="username" id="username" placeholder="Tên người dùng" required>
                            
                            <!-- Email -->
                            <input class="inputField" type="email" name="email" id="email" placeholder="Địa chỉ Email" required>
                            
                            <!-- Số điện thoại -->
                            <input class="inputField" type="text" name="phone" id="phone" placeholder="Số điện thoại" required>
                            
                            <!-- Mật khẩu -->
                            <input class="inputField" type="password" name="password" id="password" placeholder="Nhập mật khẩu" required>
                            
                            <!-- Xác nhận mật khẩu -->
                            <input class="inputField" type="password" name="password_confirmation" id="password_confirmation" placeholder="Xác nhận mật khẩu" required>

                            <div class="input-check remember-me">
                                <div class="checkbox-wrapper">
                                    <input type="checkbox" class="form-check-input" name="save-for-next" id="rememberMe">
                                    <label for="rememberMe">Nhớ mật khẩu</label>
                                </div>
                                <div class="text">
                                    <a href="#">Quên mật khẩu?</a>
                                </div>
                            </div>
                            <div class="loginBtn" id="registerBtn">
                                <a href="#" class="theme-btn rounded-0">Đăng ký</a>
                            </div>
                            <div class="orting-badge">
                                Điều khoản
                            </div>
                            <div class="form-check-3 d-flex align-items-center from-customradio-2 mt-3">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="termsAndConditions" required>
                                <label class="form-check-label" for="termsAndConditions">
                                    Tôi đồng ý với Điều khoản và Chính sách bảo mật
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @yield('content')

    <!-- Footer Section start  -->
    <footer class="footer-section footer-bg">
        <div class="container">
            <div class="contact-info-area">
                <div class="contact-info-items wow fadeInUp" data-wow-delay=".2s">
                    <div class="icon">
                        <i class="icon-icon-5"></i>
                    </div>
                    <div class="content">
                        <p>Liên Hệ 7/24</p>
                        <h3>
                            <a href="tel:+2085550112">+208-555-0112</a>
                        </h3>
                    </div>
                </div>
                <div class="contact-info-items wow fadeInUp" data-wow-delay=".4s">
                    <div class="icon">
                        <i class="icon-icon-6"></i>
                    </div>
                    <div class="content">
                        <p>Make a Quote</p>
                        <h3>
                            <a href="mailto:example@gmail.com">example@gmail.com</a>
                        </h3>
                    </div>
                </div>
                <div class="contact-info-items wow fadeInUp" data-wow-delay=".6s">
                    <div class="icon">
                        <i class="icon-icon-7"></i>
                    </div>
                    <div class="content">
                        <p>Opening Hour</p>
                        <h3>
                            Sunday - Fri: 9 aM - 6 pM
                        </h3>
                    </div>
                </div>
                <div class="contact-info-items wow fadeInUp" data-wow-delay=".8s">
                    <div class="icon">
                        <i class="icon-icon-8"></i>
                    </div>
                    <div class="content">
                        <p>Location</p>
                        <h3>
                            4517 Washington ave.
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-widgets-wrapper">
            <div class="plane-shape float-bob-y">
                <img src="assets/img/plane-shape.png" alt="img">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                        <div class="single-footer-widget">
                            <div class="widget-head">
                                <a href="index.html">
                                    <img src="assets/img/logo/white-logo.svg" alt="logo-img">
                                </a>
                            </div>
                            <div class="footer-content">
                                <p>
                                    Trang bán sách trực tuyến đa dạng thể loại, giá hấp dẫn, giao hàng nhanh, hỗ trợ 24/7, cập nhật sách mới liên tục.
                                </p>
                                <div class="social-icon d-flex align-items-center">
                                    <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://x.com/"><i class="fab fa-twitter"></i></a>
                                    <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
                                    <a href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 ps-lg-5 wow fadeInUp" data-wow-delay=".4s">
                        <div class="single-footer-widget">
                            <div class="widget-head">
                                <h3>Chính Sách</h3>
                            </div>
                            <ul class="list-area">
                                <li>
                                    <a href="shop.html">
                                        <i class="fa-solid fa-chevrons-right"></i>
                                        Store List
                                    </a>
                                </li>
                                <li>
                                    <a href="contact.html">
                                        <i class="fa-solid fa-chevrons-right"></i>
                                        Opening Hours
                                    </a>
                                </li>
                                <li>
                                    <a href="contact.html">
                                        <i class="fa-solid fa-chevrons-right"></i>
                                        Contact Us
                                    </a>
                                </li>
                                <li>
                                    <a href="contact.html">
                                        <i class="fa-solid fa-chevrons-right"></i>
                                        Return Policy
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 ps-lg-5 wow fadeInUp" data-wow-delay=".6s">
                        <div class="single-footer-widget">
                            <div class="widget-head">
                                <h3>Thể Loại Sách</h3>
                            </div>
                            <ul class="list-area">
                                <li>
                                    <a href="shop.html">
                                        <i class="fa-solid fa-chevrons-right"></i>
                                        Novel Books
                                    </a>
                                </li>
                                <li>
                                    <a href="shop.html">
                                        <i class="fa-solid fa-chevrons-right"></i>
                                        Poetry Books
                                    </a>
                                </li>
                                <li>
                                    <a href="contact.html">
                                        <i class="fa-solid fa-chevrons-right"></i>
                                        Political Books
                                    </a>
                                </li>
                                <li>
                                    <a href="contact.html">
                                        <i class="fa-solid fa-chevrons-right"></i>
                                        History Books
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".8s">
                        <div class="single-footer-widget">
                            <div class="widget-head">
                                <h3>Đăng Ký</h3>
                            </div>
                            <div class="footer-content">
                                <p>Sign up to searing weekly newsletter to get the latest updates.</p>
                                <div class="footer-input">
                                    <input type="email" id="email2" placeholder="Enter Email Address">
                                    <button class="newsletter-btn" type="submit">
                                        <i class="fa-regular fa-paper-plane"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="footer-wrapper d-flex align-items-center justify-content-between">
                    <p class="wow fadeInLeft" data-wow-delay=".3s">
                        © Tất cả nội dung thuộc 2024 bởi <a href="#">PhuongThu.Com</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!--<< All JS Plugins >>-->
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <!--<< Viewport Js >>-->
    <script src="{{ asset('assets/js/viewport.jquery.js') }}"></script>
    <!--<< Bootstrap Js >>-->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <!--<< Waypoints Js >>-->
    <script src="{{ asset('assets/js/jquery.waypoints.js') }}"></script>
    <!--<< Counterup Js >>-->
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <!--<< Swiper Slider Js >>-->
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <!--<< MeanMenu Js >>-->
    <script src="{{ asset('assets/js/jquery.meanmenu.min.js') }}"></script>
    <!--<< Magnific Popup Js >>-->
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!--<< Wow Animation Js >>-->
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <!-- Gsap -->
    <script src="{{ asset('assets/js/gsap.min.js') }}"></script>
    <!--<< Main.js') }} >>-->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
<style>
    .cart-icon::before {
        content: "{{ $cartCount }}";
    }

    input:focus-within{
        color: black;
    }
    input{
        color: black;
    }

    input:focus-visible{
        color: black;
    }
</style>
<script>
    $(document).ready(function () {
        $('.loginBtn').on('click', function (e) {
            e.preventDefault(); // Ngăn form reload

            // Lấy giá trị từ input
            let username = $('.username').val()
            let password = $('.password').val()

            // Kiểm tra input rỗng
            if (!username || !password) {
                $('.error').text('Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu.');
                return;
            }

            // Gửi dữ liệu bằng Ajax
            $.ajax({
                url: '{{ route('user.login.submit') }}', // Route gửi dữ liệu
                type: 'POST',
                data: {
                    username: username,
                    password: password,
                    _token: '{{ csrf_token() }}' // Bảo mật CSRF
                },
                success: function (response) {
                    // Kiểm tra phản hồi
                    if (response.error) {
                        $('.error').text(response.error); // Hiển thị lỗi
                    } else {
                        location.reload();
                    }
                },
                error: function (xhr) {
                    // Xử lý lỗi khi gửi request
                    $('.error').text('Đã xảy ra lỗi. Vui lòng thử lại sau.');
                }
            });
        });

        $('#registerBtn').on('click', function (e) {
            e.preventDefault(); // Ngăn form reload

            // Lấy giá trị từ input
            let name = $('#name').val();
            let username = $('#username').val();
            let email = $('#email').val();
            let phone = $('#phone').val();
            let password = $('#password').val();
            let password_confirmation = $('#password_confirmation').val();
            let termsAccepted = $('#termsAndConditions').is(':checked');

            // Kiểm tra input rỗng
            if (!username || !email || !phone || !password || !password_confirmation) {
                $('.error-register').text('Vui lòng nhập đầy đủ thông tin.');
                return;
            }

            // Kiểm tra mật khẩu và xác nhận mật khẩu có khớp
            if (password !== password_confirmation) {
                $('.error-register').text('Mật khẩu và xác nhận mật khẩu không khớp.');
                return;
            }

            // Kiểm tra điều khoản và chính sách bảo mật
            if (!termsAccepted) {
                $('.error-register').text('Vui lòng đồng ý với Điều khoản và Chính sách bảo mật.');
                return;
            }

            // Gửi dữ liệu bằng Ajax
            $.ajax({
                url: '{{ route('user.register.submit') }}', // Route gửi dữ liệu
                type: 'POST',
                data: {
                    name: name,
                    username: username,
                    email: email,
                    phone: phone,
                    password: password,
                    password_confirmation: password_confirmation,
                    _token: '{{ csrf_token() }}' // Bảo mật CSRF
                },
                success: function (response) {
                    if (response.error) {
                        $('.error-register').text(response.error); // Hiển thị lỗi
                    } else {
                        // Nếu đăng ký thành công, chuyển hướng đến trang đăng nhập hoặc trang khác
                        location.reload();
                    }
                },
                error: function (xhr) {
                    // Xử lý lỗi khi gửi request
                    let errors = xhr.responseJSON.errors;
                    let errorMessages = '';
                    // Lặp qua các lỗi và thêm chúng vào chuỗi lỗi
                    for (let field in errors) {
                        errorMessages += errors[field].join(', ') + '<br>';
                    }

                    // Gắn chuỗi lỗi vào .error-register
                    $('.error-register').html(errorMessages);
                }
            });
        });
    });
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</html>
@if (session('success'))
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script>
        $(document).ready(function () {
            Toastify({
                text: '{{ session('success') }}',
                duration: 5000, // thời gian hiển thị (ms)
                close: true, // nút đóng
                gravity: "bottom", // vị trí: "top" hoặc "bottom"
                position: "center", // "left", "center", "right"
            }).showToast();
        });
    </script>
@endif
@if ($errors->any())
    <script>
        $(document).ready(function () {
            // Lặp qua tất cả các lỗi
            @foreach ($errors->all() as $error)
                Toastify({
                    text: "{{ $error }}",
                    duration: 5000, // thời gian hiển thị (ms)
                    close: true, // nút đóng
                    gravity: "bottom", // vị trí: "top" hoặc "bottom"
                    position: "center", // "left", "center", "right"
                }).showToast();
            @endforeach
        });
    </script>
@endif
@if (session('error'))
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script>
        $(document).ready(function () {
            Toastify({
                text: '{{ session('error') }}',
                duration: 5000, // thời gian hiển thị (ms)
                close: true, // nút đóng
                gravity: "bottom", // vị trí: "top" hoặc "bottom"
                position: "center", // "left", "center", "right"
            }).showToast();
        });
    </script>
@endif
@yield('script')