<!DOCTYPE html>
<html lang="en">
<!--<< Header Area >>-->

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
    <!--<< Nice Select.css >>-->
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <!--<< Icomoon.css >>-->
    <link rel="stylesheet" href="{{ asset('assets/css/icomoon.css') }}">
    <!--<< Main.css >>-->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
</head>

<body>
    <!-- Cursor follower -->
    <div class="cursor-follower"></div>

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
                                <img src="assets/img/logo/black-logo.svg" alt="logo-img">
                            </a>
                        </div>
                        <div class="offcanvas__close">
                            <button>
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <p class="text d-none d-xl-block">
                        Nullam dignissim, ante scelerisque the is euismod fermentum odio sem semper the is erat, a
                        feugiat leo urna eget eros. Duis Aenean a imperdiet risus.
                    </p>
                    <div class="mobile-menu fix mb-3"></div>
                    <div class="offcanvas__contact">
                        <h4>Contact Info</h4>
                        <ul>
                            <li class="d-flex align-items-center">
                                <div class="offcanvas__contact-icon">
                                    <i class="fal fa-map-marker-alt"></i>
                                </div>
                                <div class="offcanvas__contact-text">
                                    <a target="_blank" href="index.html">Main Street, Melbourne, Australia</a>
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
                                    <a target="_blank" href="index.html">Mod-friday, 09am -05pm</a>
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
                        <a href="tel:+20866660112">+208-6666-0112</a>
                    </li>
                    <li>
                        <i class="far fa-envelope"></i>
                        <a href="mailto:info@example.com">info@example.com</a>
                    </li>
                    <li>
                        <i class="far fa-clock"></i>
                        <span>Sunday - Fri: 9 aM - 6 pM</span>
                    </li>
                </ul>
                <ul class="list">
                    <li><i class="fa-light fa-comments"></i><a href="contact.html">Live Chat</a></li>
                    <li><i class="fa-light fa-user"></i>
                        <button data-bs-toggle="modal" data-bs-target="#loginModal">
                            Login
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Sticky Header Section start  -->
    <header class="header-1 sticky-header">
        <div class="mega-menu-wrapper">
            <div class="header-main">
                <div class="container">
                    <div class="row">
                        <div class="col-6 col-md-6 col-lg-10 col-xl-8 col-xxl-10">
                            <div class="header-left">
                                <div class="logo">
                                    <a href="index.html" class="header-logo">
                                        <img src="assets/img/logo/white-logo.svg" alt="logo-img">
                                    </a>
                                </div>
                                <div class="mean__menu-wrapper">
                                    <div class="main-menu">
                                        <nav>
                                            <ul>
                                                <li>
                                                    <a href="index.html">
                                                        Home
                                                        <i class="fas fa-angle-down"></i>
                                                    </a>
                                                    <ul class="submenu">
                                                        <li><a href="index.html">Home 01</a></li>
                                                        <li><a href="index-2.html">Home 02</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="shop.html">
                                                        Shop
                                                        <i class="fas fa-angle-down"></i>
                                                    </a>
                                                    <ul class="submenu">
                                                        <li><a href="shop.html">Shop Default</a></li>
                                                        <li><a href="shop-list.html">Shop List</a></li>
                                                        <li><a href="shop-details.html">Shop Details</a></li>
                                                        <li><a href="shop-cart.html">Shop Cart</a></li>
                                                        <li><a href="wishlist.html">Wishlist</a></li>
                                                        <li><a href="checkout.html">Checkout</a></li>
                                                    </ul>
                                                </li>
                                                <li class="has-dropdown">
                                                    <a href="about.html">
                                                        Pages
                                                        <i class="fas fa-angle-down"></i>
                                                    </a>
                                                    <ul class="submenu">
                                                        <li><a href="about.html">About Us</a></li>
                                                        <li class="has-dropdown">
                                                            <a href="team.html">
                                                                Author
                                                                <i class="fas fa-angle-down"></i>
                                                            </a>
                                                            <ul class="submenu">
                                                                <li><a href="team.html">Author</a></li>
                                                                <li><a href="team-details.html">Author Profile</a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="faq.html">Faq's</a></li>
                                                        <li><a href="404.html">404 Page</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="news.html">
                                                        Blog
                                                        <i class="fas fa-angle-down"></i>
                                                    </a>
                                                    <ul class="submenu">
                                                        <li><a href="news-grid.html">Blog Grid</a></li>
                                                        <li><a href="news.html">Blog List</a></li>
                                                        <li><a href="news-details.html">Blog Details</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="contact.html">Contact</a>
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
                                    <div class="icon">
                                        <i class="fa-sharp fa-solid fa-grid-2"></i>
                                    </div>
                                    <select name="cate" class="category">
                                        <option value="1">
                                            Category
                                        </option>
                                        <option value="1">
                                            Web Design
                                        </option>
                                        <option value="1">
                                            Web Development
                                        </option>
                                        <option value="1">
                                            Graphic Design
                                        </option>
                                        <option value="1">
                                            Softwer Eng
                                        </option>
                                    </select>
                                    <form action="#" class="search-toggle-box d-md-block">
                                        <div class="input-area">
                                            <input type="text" placeholder="Author">
                                            <button class="cmn-btn">
                                                <i class="far fa-search"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="menu-cart">
                                    <a href="wishlist.html" class="cart-icon">
                                        <i class="fa-regular fa-heart"></i>
                                    </a>
                                    <a href="shop-cart.html" class="cart-icon">
                                        <i class="fa-regular fa-cart-shopping"></i>
                                    </a>
                                    <div class="header-humbager ml-30">
                                        <a class="sidebar__toggle" href="javascript:void(0)">
                                            <div class="bar-icon-2">
                                                <img src="assets/img/icon/icon-13.svg" alt="img">
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
    <header class="header-1">
        <div class="mega-menu-wrapper">
            <div class="header-main">
                <div class="container">
                    <div class="row">
                        <div class="col-6 col-md-6 col-lg-10 col-xl-8 col-xxl-10">
                            <div class="header-left">
                                <div class="logo">
                                    <a href="index.html" class="header-logo">
                                        <img src="assets/img/logo/white-logo.svg" alt="logo-img">
                                    </a>
                                </div>
                                <div class="mean__menu-wrapper">
                                    <div class="main-menu">
                                        <nav id="mobile-menu">
                                            <ul>
                                                <li>
                                                    <a href="index.html">
                                                        Home
                                                        <i class="fas fa-angle-down"></i>
                                                    </a>
                                                    <ul class="submenu">
                                                        <li><a href="index.html">Home 01</a></li>
                                                        <li><a href="index-2.html">Home 02</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="shop.html">
                                                        Shop
                                                        <i class="fas fa-angle-down"></i>
                                                    </a>
                                                    <ul class="submenu">
                                                        <li><a href="shop.html">Shop Default</a></li>
                                                        <li><a href="shop-list.html">Shop List</a></li>
                                                        <li><a href="shop-details.html">Shop Details</a></li>
                                                        <li><a href="shop-cart.html">Shop Cart</a></li>
                                                        <li><a href="wishlist.html">Wishlist</a></li>
                                                        <li><a href="checkout.html">Checkout</a></li>
                                                    </ul>
                                                </li>
                                                <li class="has-dropdown">
                                                    <a href="about.html">
                                                        Pages
                                                        <i class="fas fa-angle-down"></i>
                                                    </a>
                                                    <ul class="submenu">
                                                        <li><a href="about.html">About Us</a></li>
                                                        <li class="has-dropdown">
                                                            <a href="team.html">
                                                                Author
                                                                <i class="fas fa-angle-down"></i>
                                                            </a>
                                                            <ul class="submenu">
                                                                <li><a href="team.html">Author</a></li>
                                                                <li><a href="team-details.html">Author Profile</a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="faq.html">Faq's</a></li>
                                                        <li><a href="404.html">404 Page</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="news.html">
                                                        Blog
                                                        <i class="fas fa-angle-down"></i>
                                                    </a>
                                                    <ul class="submenu">
                                                        <li><a href="news-grid.html">Blog Grid</a></li>
                                                        <li><a href="news.html">Blog List</a></li>
                                                        <li><a href="news-details.html">Blog Details</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="contact.html">Contact</a>
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
                                    <div class="icon">
                                        <i class="fa-sharp fa-solid fa-grid-2"></i>
                                    </div>
                                    <select name="cate" class="category">
                                        <option value="1">
                                            Category
                                        </option>
                                        <option value="1">
                                            Web Design
                                        </option>
                                        <option value="1">
                                            Web Development
                                        </option>
                                        <option value="1">
                                            Graphic Design
                                        </option>
                                        <option value="1">
                                            Softwer Eng
                                        </option>
                                    </select>
                                    <form action="#" class="search-toggle-box d-md-block">
                                        <div class="input-area">
                                            <input type="text" placeholder="Author">
                                            <button class="cmn-btn">
                                                <i class="far fa-search"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="menu-cart">
                                    <a href="wishlist.html" class="cart-icon">
                                        <i class="fa-regular fa-heart"></i>
                                    </a>
                                    <a href="shop-cart.html" class="cart-icon">
                                        <i class="fa-regular fa-cart-shopping"></i>
                                    </a>
                                    <div class="header-humbager ml-30">
                                        <a class="sidebar__toggle" href="javascript:void(0)">
                                            <div class="bar-icon-2">
                                                <img src="assets/img/icon/icon-13.svg" alt="img">
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
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="close-btn">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="identityBox">
                        <div class="form-wrapper">
                            <h1 id="loginModalLabel">welcome back!</h1>
                            <input class="inputField" type="email" name="email" placeholder="Email Address">
                            <input class="inputField" type="password" name="password" placeholder="Enter Password">
                            <div class="input-check remember-me">
                                <div class="checkbox-wrapper">
                                    <input type="checkbox" class="form-check-input" name="save-for-next"
                                        id="saveForNext">
                                    <label for="saveForNext">Remember me</label>
                                </div>
                                <div class="text"> <a href="index-2.html">Forgot Your password?</a> </div>
                            </div>
                            <div class="loginBtn">
                                <a href="index-2.html" class="theme-btn rounded-0"> Log in </a>
                            </div>
                            <div class="orting-badge">
                                Or
                            </div>
                            <div>
                                <a class="another-option" href="https://www.google.com/">
                                    <img src="assets/img/google.png" alt="google">
                                    Continue With Google
                                </a>
                            </div>
                            <div>
                                <a class="another-option another-option-two" href="https://www.facebook.com/">
                                    <img src="assets/img/facebook.png" alt="google">
                                    Continue With Facebook
                                </a>
                            </div>

                            <div class="form-check-3 d-flex align-items-center from-customradio-2 mt-3">
                                <input class="form-check-input" type="radio" name="flexRadioDefault">
                                <label class="form-check-label">
                                    I Accept Your Terms & Conditions
                                </label>
                            </div>
                        </div>

                        <div class="banner">
                            <button type="button" class="rounded-0 login-btn" data-bs-toggle="modal"
                                data-bs-target="#loginModal">Log in</button>
                            <button type="button" class="theme-btn rounded-0 register-btn" data-bs-toggle="modal"
                                data-bs-target="#registrationModal">Create
                                Account</button>
                            <div class="loginBg">
                                <img src="assets/img/signUpbg.jpg" alt="signUpBg">
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
                    <div class="identityBox">
                        <div class="form-wrapper">
                            <h1 id="registrationModalLabel">Create account!</h1>
                            <input class="inputField" type="text" name="name" id="name" placeholder="User Name">
                            <input class="inputField" type="email" name="email" placeholder="Email Address">
                            <input class="inputField" type="password" name="password" placeholder="Enter Password">
                            <input class="inputField" type="password" name="password"
                                placeholder="Enter Confirm Password">
                            <div class="input-check remember-me">
                                <div class="checkbox-wrapper">
                                    <input type="checkbox" class="form-check-input" name="save-for-next"
                                        id="rememberMe">
                                    <label for="rememberMe">Remember me</label>
                                </div>
                                <div class="text"> <a href="index-2.html">Forgot Your password?</a> </div>
                            </div>
                            <div class="loginBtn">
                                <a href="index-2.html" class="theme-btn rounded-0"> Log in </a>
                            </div>
                            <div class="orting-badge">
                                Or
                            </div>
                            <div>
                                <a class="another-option" href="https://www.google.com/">
                                    <img src="assets/img/google.png" alt="google">
                                    Continue With Google
                                </a>
                            </div>
                            <div>
                                <a class="another-option another-option-two" href="https://www.facebook.com/">
                                    <img src="assets/img/facebook.png" alt="google">
                                    Continue With Facebook
                                </a>
                            </div>
                            <div class="form-check-3 d-flex align-items-center from-customradio-2 mt-3">
                                <input class="form-check-input" type="radio" name="flexRadioDefault">
                                <label class="form-check-label">
                                    I Accept Your Terms & Conditions
                                </label>
                            </div>
                        </div>

                        <div class="banner">
                            <button type="button" class="rounded-0 login-btn" data-bs-toggle="modal"
                                data-bs-target="#loginModal">Log in</button>
                            <button type="button" class="theme-btn rounded-0 register-btn" data-bs-toggle="modal"
                                data-bs-target="#registrationModal">Create
                                Account</button>
                            <div class="signUpBg">
                                <img src="assets/img/registrationbg.jpg" alt="signUpBg">
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
                        <p>Call Us 7/24</p>
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
                                    Phasellus ultricies aliquam volutpat ullamcorper laoreet neque, a lacinia curabitur
                                    lacinia mollis
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
                                <h3>Costumers Support</h3>
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
                                <h3>Categories</h3>
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
                                <h3>Newsletter</h3>
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
                        © All Copyright 2024 by <a href="index.html">Bookle</a>
                    </p>
                    <ul class="brand-logo wow fadeInRight" data-wow-delay=".5s">
                        <li>
                            <a href="contact.html">
                                <img src="assets/img/visa-logo.png" alt="img">
                            </a>
                        </li>
                        <li>
                            <a href="contact.html">
                                <img src="assets/img/mastercard.png" alt="img">
                            </a>
                        </li>
                        <li>
                            <a href="contact.html">
                                <img src="assets/img/payoneer.png" alt="img">
                            </a>
                        </li>
                        <li>
                            <a href="contact.html">
                                <img src="assets/img/affirm.png" alt="img">
                            </a>
                        </li>
                    </ul>
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
    <!--<< Nice Select Js >>-->
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
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

</html>
@yield('script')