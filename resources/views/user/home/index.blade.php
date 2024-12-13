@extends('User.layouts.app')
@section('title', 'Trang Chủ')
@section('content')
<div class="hero-section hero-1 fix">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-8 col-lg-6">
                <div class="hero-items">
                    <div class="book-shape">
                        <img src="assets/img/hero/book.png" alt="shape-img">
                    </div>
                    <div class="frame-shape1 float-bob-x">
                        <img src="assets/img/hero/frame.png" alt="shape-img">
                    </div>
                    <div class="frame-shape2 float-bob-y">
                        <img src="assets/img/hero/frame-2.png" alt="shape-img">
                    </div>
                    <div class="frame-shape3">
                        <img src="assets/img/hero/xstar.png" alt="img">
                    </div>
                    <div class="frame-shape4 float-bob-x">
                        <img src="assets/img/hero/frame-shape.png" alt="img">
                    </div>
                    <div class="bg-shape1">
                        <img src="assets/img/hero/bg-shape.png" alt="img">
                    </div>
                    <div class="bg-shape2">
                        <img src="assets/img/hero/bg-shape2.png" alt="shape-img">
                    </div>
                    <div class="hero-content">
                        <h6 class="wow fadeInUp" data-wow-delay=".3s">Up to 30% Off</h6>
                        <h1 class="wow fadeInUp" data-wow-delay=".5s">Get Your New Book <br> With The Best Price
                        </h1>
                        <div class="form-clt wow fadeInUp" data-wow-delay=".9s">
                            <button type="submit" class="theme-btn">
                                Shop Now <i class="fa-solid fa-arrow-right-long"></i>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-12 col-xl-4 col-lg-6">
                <div class="girl-image">
                    <img class=" float-bob-x" src="assets/img/hero/hero-girl.png" alt="img">
                </div>
            </div>
        </div>
    </div>
</div>

<section class="book-banner-section fix section-padding">
    <div class="container">
        <div class="row g-4">
            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s"
                style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                <div class="banner-book-card-items bg-cover"
                    style="background-image: url('assets/img/banner/book-banner-1.jpg');">
                    <div class="book-shape">
                        <img src="assets/img/banner/book-1.png" alt="img">
                    </div>
                    <div class="banner-book-content">
                        <h2>Crime Fiction <br> Books</h2>
                        <h6>15% Off on Kids' Toys and Gifts!</h6>
                        <a href="shop-details.html" class="theme-btn white-bg">Shop Now <i
                                class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s"
                style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                <div class="banner-book-card-items bg-cover"
                    style="background-image: url('assets/img/banner/book-banner-2.jpg');">
                    <div class="book-shape">
                        <img src="assets/img/banner/book-2.png" alt="img">
                    </div>
                    <div class="banner-book-content">
                        <h2>One Year on <br> a Bike </h2>
                        <h6>15% Off on Kids' Toys and Gifts!</h6>
                        <a href="shop-details.html" class="theme-btn white-bg">Shop Now <i
                                class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".7s"
                style="visibility: visible; animation-delay: 0.7s; animation-name: fadeInUp;">
                <div class="banner-book-card-items bg-cover"
                    style="background-image: url('assets/img/banner/book-banner-3.jpg');">
                    <div class="book-shape">
                        <img src="assets/img/banner/book-3.png" alt="img">
                    </div>
                    <div class="banner-book-content">
                        <h2>
                            Grow With <br>
                            Flower
                        </h2>
                        <h6>15% Off on Kids' Toys and Gifts!</h6>
                        <a href="shop.html" class="theme-btn white-bg">Shop Now <i
                                class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="shop-section section-padding fix pt-0">
    <div class="container">
        <div class="section-title-area">
            <div class="section-title">
                <h2 class="wow fadeInUp" data-wow-delay=".3s"
                    style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">Sách Mới Nhất</h2>
            </div>
            <a href="{{ route('user.book.index') }}" class="theme-btn transparent-btn wow fadeInUp" data-wow-delay=".5s"
                style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">Xem Tất Cả <i
                    class="fa-solid fa-arrow-right-long"></i></a>
        </div>
        <div class="swiper book-slider swiper-initialized swiper-horizontal swiper-pointer-events">
            <div class="swiper-wrapper" id="swiper-wrapper-d6c3bdcdddbd96e9" aria-live="off"
                style="transform: translate3d(-2881.8px, 0px, 0px); transition-duration: 2000ms;">
                @foreach ($newBooks as $index => $book)
                    <div class="swiper-slide swiper-slide-duplicate-next" data-swiper-slide-index="{{ $index }}" role="group"
                    aria-label="{{ $index + 1}} / 5" style="width: 290.2px; margin-right: 30px;">
                        <div class="shop-box-items style-2">
                            <div class="book-thumb center">
                                <a href="{{ route('user.book.show', $book->slug) }}"><img src="{{ asset('storage/' . $book->avatar) ?? 'https://www.contentviewspro.com/wp-content/uploads/2017/07/default_image.png' }}" alt="img"></a>
                                <ul class="post-box">
                                    <li>
                                        MỚI
                                    </li>
                                    <li>
                                        {{ round((($book->origin_price - $book->price) / $book->origin_price) * 100) }}%
                                    </li>
                                </ul>
                                <ul class="shop-icon d-grid justify-content-center align-items-center">
                                    <li>
                                        <a href="#"><i class="far fa-heart"></i></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.book.show', $book->slug) }}"><i class="far fa-eye"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="shop-content">
                                <h5> {{ $book->category->name }} </h5>
                                <h3><a href="{{ route('user.book.show', $book->slug) }}">{{ $book->name }}</a></h3>
                                <ul class="price-list">
                                    <li>{{ number_format($book->price) }} VNĐ</li>
                                    <li>
                                        <del>{{ number_format($book->origin_price) }} VNĐ</del>
                                    </li>
                                </ul>
                                <ul class="author-post">
                                    <li class="authot-list">
                                        <span class="content">{{ $book->author }}</span>
                                    </li>
                                    <li class="star">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $book->star)
                                                <i class="fa-solid fa-star"></i>
                                            @else
                                                <i class="fa-regular fa-star"></i>
                                            @endif
                                        @endfor
                                    </li>
                                </ul>
                            </div>
                            <div class="shop-button">
                                <a href="{{ route('user.book.show', $book->slug) }}" class="theme-btn"><i class="fa-solid fa-eye"></i>
                                    Xem Chi Tiết</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
        </div>
    </div>
</section>

<section class="book-catagories-section fix section-padding">
    <div class="container">
        <div class="book-catagories-wrapper">
            <div class="section-title text-center">
                <h2 class="wow fadeInUp" data-wow-delay=".3s"
                    style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">Top Categories Book
                </h2>
            </div>
            <div class="array-button">
                <button class="array-prev" tabindex="0" aria-label="Next slide"
                    aria-controls="swiper-wrapper-8a611c5c4a868110b"><i class="fal fa-arrow-left"></i></button>
                <button class="array-next" tabindex="0" aria-label="Previous slide"
                    aria-controls="swiper-wrapper-8a611c5c4a868110b"><i class="fal fa-arrow-right"></i></button>
            </div>
            <div class="swiper book-catagories-slider swiper-initialized swiper-horizontal swiper-pointer-events">
                <div class="swiper-wrapper" id="swiper-wrapper-f3b178f5afdc1c7e" aria-live="polite"
                    style="transform: translate3d(-1541px, 0px, 0px); transition-duration: 0ms;">
                    <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active"
                        data-swiper-slide-index="0" role="group" aria-label="1 / 5"
                        style="width: 278.2px; margin-right: 30px;">
                        <div class="book-catagories-items">
                            <div class="book-thumb">
                                <img src="assets/img/book-categori/01.png" alt="img">
                                <div class="circle-shape">
                                    <img src="assets/img/book-categori/circle-shape.png" alt="shape-img">
                                </div>
                            </div>
                            <div class="number"> 01 </div>
                            <h3><a href="shop-details.html">Romance Books (80)</a></h3>
                        </div>
                    </div>
                    <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-next"
                        data-swiper-slide-index="1" role="group" aria-label="2 / 5"
                        style="width: 278.2px; margin-right: 30px;">
                        <div class="book-catagories-items">
                            <div class="book-thumb">
                                <img src="assets/img/book-categori/02.png" alt="img">
                                <div class="circle-shape">
                                    <img src="assets/img/book-categori/circle-shape.png" alt="shape-img">
                                </div>
                            </div>
                            <div class="number"> 02 </div>
                            <h3><a href="shop-details.html">Design Low Book (6)</a></h3>
                        </div>
                    </div>
                    <div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="2" role="group"
                        aria-label="3 / 5" style="width: 278.2px; margin-right: 30px;">
                        <div class="book-catagories-items">
                            <div class="book-thumb">
                                <img src="assets/img/book-categori/03.png" alt="img">
                                <div class="circle-shape">
                                    <img src="assets/img/book-categori/circle-shape.png" alt="shape-img">
                                </div>
                            </div>
                            <div class="number"> 03 </div>
                            <h3><a href="shop-details.html">safe Home (5)</a></h3>
                        </div>
                    </div>
                    <div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="3" role="group"
                        aria-label="4 / 5" style="width: 278.2px; margin-right: 30px;">
                        <div class="book-catagories-items">
                            <div class="book-thumb">
                                <img src="assets/img/book-categori/04.png" alt="img">
                                <div class="circle-shape">
                                    <img src="assets/img/book-categori/circle-shape.png" alt="shape-img">
                                </div>
                            </div>
                            <div class="number"> 04 </div>
                            <h3><a href="shop-details.html">Grow flower (7)</a></h3>
                        </div>
                    </div>
                    <div class="swiper-slide swiper-slide-duplicate swiper-slide-prev" data-swiper-slide-index="4"
                        role="group" aria-label="5 / 5" style="width: 278.2px; margin-right: 30px;">
                        <div class="book-catagories-items">
                            <div class="book-thumb">
                                <img src="assets/img/book-categori/05.png" alt="img">
                                <div class="circle-shape">
                                    <img src="assets/img/book-categori/circle-shape.png" alt="shape-img">
                                </div>
                            </div>
                            <div class="number"> 05 </div>
                            <h3><a href="shop-details.html">Adventure book (4)</a></h3>
                        </div>
                    </div>
                    <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="0" role="group"
                        aria-label="1 / 5" style="width: 278.2px; margin-right: 30px;">
                        <div class="book-catagories-items">
                            <div class="book-thumb">
                                <img src="assets/img/book-categori/01.png" alt="img">
                                <div class="circle-shape">
                                    <img src="assets/img/book-categori/circle-shape.png" alt="shape-img">
                                </div>
                            </div>
                            <div class="number"> 01 </div>
                            <h3><a href="shop-details.html">Romance Books (80)</a></h3>
                        </div>
                    </div>
                    <div class="swiper-slide swiper-slide-next" data-swiper-slide-index="1" role="group"
                        aria-label="2 / 5" style="width: 278.2px; margin-right: 30px;">
                        <div class="book-catagories-items">
                            <div class="book-thumb">
                                <img src="assets/img/book-categori/02.png" alt="img">
                                <div class="circle-shape">
                                    <img src="assets/img/book-categori/circle-shape.png" alt="shape-img">
                                </div>
                            </div>
                            <div class="number"> 02 </div>
                            <h3><a href="shop-details.html">Design Low Book (6)</a></h3>
                        </div>
                    </div>
                    <div class="swiper-slide" data-swiper-slide-index="2" role="group" aria-label="3 / 5"
                        style="width: 278.2px; margin-right: 30px;">
                        <div class="book-catagories-items">
                            <div class="book-thumb">
                                <img src="assets/img/book-categori/03.png" alt="img">
                                <div class="circle-shape">
                                    <img src="assets/img/book-categori/circle-shape.png" alt="shape-img">
                                </div>
                            </div>
                            <div class="number"> 03 </div>
                            <h3><a href="shop-details.html">safe Home (5)</a></h3>
                        </div>
                    </div>
                    <div class="swiper-slide" data-swiper-slide-index="3" role="group" aria-label="4 / 5"
                        style="width: 278.2px; margin-right: 30px;">
                        <div class="book-catagories-items">
                            <div class="book-thumb">
                                <img src="assets/img/book-categori/04.png" alt="img">
                                <div class="circle-shape">
                                    <img src="assets/img/book-categori/circle-shape.png" alt="shape-img">
                                </div>
                            </div>
                            <div class="number"> 04 </div>
                            <h3><a href="shop-details.html">Grow flower (7)</a></h3>
                        </div>
                    </div>
                    <div class="swiper-slide swiper-slide-duplicate-prev" data-swiper-slide-index="4" role="group"
                        aria-label="5 / 5" style="width: 278.2px; margin-right: 30px;">
                        <div class="book-catagories-items">
                            <div class="book-thumb">
                                <img src="assets/img/book-categori/05.png" alt="img">
                                <div class="circle-shape">
                                    <img src="assets/img/book-categori/circle-shape.png" alt="shape-img">
                                </div>
                            </div>
                            <div class="number"> 05 </div>
                            <h3><a href="shop-details.html">Adventure book (4)</a></h3>
                        </div>
                    </div>
                    <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active"
                        data-swiper-slide-index="0" role="group" aria-label="1 / 5"
                        style="width: 278.2px; margin-right: 30px;">
                        <div class="book-catagories-items">
                            <div class="book-thumb">
                                <img src="assets/img/book-categori/01.png" alt="img">
                                <div class="circle-shape">
                                    <img src="assets/img/book-categori/circle-shape.png" alt="shape-img">
                                </div>
                            </div>
                            <div class="number"> 01 </div>
                            <h3><a href="shop-details.html">Romance Books (80)</a></h3>
                        </div>
                    </div>
                    <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-next"
                        data-swiper-slide-index="1" role="group" aria-label="2 / 5"
                        style="width: 278.2px; margin-right: 30px;">
                        <div class="book-catagories-items">
                            <div class="book-thumb">
                                <img src="assets/img/book-categori/02.png" alt="img">
                                <div class="circle-shape">
                                    <img src="assets/img/book-categori/circle-shape.png" alt="shape-img">
                                </div>
                            </div>
                            <div class="number"> 02 </div>
                            <h3><a href="shop-details.html">Design Low Book (6)</a></h3>
                        </div>
                    </div>
                    <div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="2" role="group"
                        aria-label="3 / 5" style="width: 278.2px; margin-right: 30px;">
                        <div class="book-catagories-items">
                            <div class="book-thumb">
                                <img src="assets/img/book-categori/03.png" alt="img">
                                <div class="circle-shape">
                                    <img src="assets/img/book-categori/circle-shape.png" alt="shape-img">
                                </div>
                            </div>
                            <div class="number"> 03 </div>
                            <h3><a href="shop-details.html">safe Home (5)</a></h3>
                        </div>
                    </div>
                    <div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="3" role="group"
                        aria-label="4 / 5" style="width: 278.2px; margin-right: 30px;">
                        <div class="book-catagories-items">
                            <div class="book-thumb">
                                <img src="assets/img/book-categori/04.png" alt="img">
                                <div class="circle-shape">
                                    <img src="assets/img/book-categori/circle-shape.png" alt="shape-img">
                                </div>
                            </div>
                            <div class="number"> 04 </div>
                            <h3><a href="shop-details.html">Grow flower (7)</a></h3>
                        </div>
                    </div>
                    <div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="4" role="group"
                        aria-label="5 / 5" style="width: 278.2px; margin-right: 30px;">
                        <div class="book-catagories-items">
                            <div class="book-thumb">
                                <img src="assets/img/book-categori/05.png" alt="img">
                                <div class="circle-shape">
                                    <img src="assets/img/book-categori/circle-shape.png" alt="shape-img">
                                </div>
                            </div>
                            <div class="number"> 05 </div>
                            <h3><a href="shop-details.html">Adventure book (4)</a></h3>
                        </div>
                    </div>
                </div>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
            </div>
        </div>
    </div>
</section>


<section class="shop-section section-padding fix">
    <div class="container">
        <div class="section-title-area">
            <div class="section-title wow fadeInUp" data-wow-delay=".3s"
                style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                <h2>Đang Bán Chạy</h2>
            </div>
            <a href="{{ route('user.book.index') }}" class="theme-btn transparent-btn wow fadeInUp" data-wow-delay=".5s"
                style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">Xem Tất Cả <i
                    class="fa-solid fa-arrow-right-long"></i></a>
        </div>
        <div class="swiper book-slider swiper-initialized swiper-horizontal swiper-pointer-events">
            <div class="swiper-wrapper" id="swiper-wrapper-a89671033bb57889f" aria-live="off"
                style="transform: translate3d(-3202px, 0px, 0px); transition-duration: 2000ms;">
                @foreach ($bestSellingBooks as $index => $book)
                    <div class="swiper-slide swiper-slide-duplicate-next" data-swiper-slide-index="{{ $index }}" role="group"
                    aria-label="{{ $index + 1}} / 5" style="width: 290.2px; margin-right: 30px;">
                        <div class="shop-box-items style-2">
                            <div class="book-thumb center">
                                <a href="{{ route('user.book.show', $book->slug) }}"><img src="{{ asset('storage/' . $book->avatar) ?? 'https://www.contentviewspro.com/wp-content/uploads/2017/07/default_image.png' }}" alt="img"></a>
                                <ul class="post-box">
                                    <li>
                                        MỚI
                                    </li>
                                    <li>
                                        {{ round((($book->origin_price - $book->price) / $book->origin_price) * 100) }}%
                                    </li>
                                </ul>
                                <ul class="shop-icon d-grid justify-content-center align-items-center">
                                    <li>
                                        <a href="#"><i class="far fa-heart"></i></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.book.show', $book->slug) }}"><i class="far fa-eye"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="shop-content">
                                <h5> {{ $book->category->name }} </h5>
                                <h3><a href="{{ route('user.book.show', $book->slug) }}">{{ $book->name }}</a></h3>
                                <ul class="price-list">
                                    <li>{{ number_format($book->price) }} VNĐ</li>
                                    <li>
                                        <del>{{ number_format($book->origin_price) }} VNĐ</del>
                                    </li>
                                </ul>
                                <ul class="author-post">
                                    <li class="authot-list">
                                        <span class="content">{{ $book->author }}</span>
                                    </li>
                                    <li class="star">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $book->star)
                                                <i class="fa-solid fa-star"></i>
                                            @else
                                                <i class="fa-regular fa-star"></i>
                                            @endif
                                        @endfor
                                    </li>
                                </ul>
                            </div>
                            <div class="shop-button">
                                <a href="{{ route('user.book.show', $book->slug) }}" class="theme-btn"><i class="fa-solid fa-eye"></i>
                                    Xem Chi Tiết</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
        </div>
    </div>
</section>

<section class="top-ratting-book-section fix section-padding section-bg">
    <div class="container">
        <div class="top-ratting-book-wrapper">
            <div class="section-title-area">
                <div class="section-title">
                    <h2 class="wow fadeInUp" data-wow-delay=".3s"
                        style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">Gợi Ý Cho Bạn
                    </h2>
                </div>
                <a href="{{ route('user.book.index') }}" class="theme-btn transparent-btn wow fadeInUp" data-wow-delay=".5s"
                    style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">Xem Tất Cả <i
                        class="fa-solid fa-arrow-right-long"></i></a>
            </div>
            <div class="row">
                @foreach ($randomBooks as $index => $book)
                    <div class="col-xl-6 wow fadeInUp" data-wow-delay="{{ $index % 2 == 0 ? '.3s' : '.5s' }}"
                        style="visibility: visible; animation-delay: {{ $index % 2 == 0 ? '.3s' : '.5s' }}; animation-name: fadeInUp;">
                        <div class="top-ratting-box-items">
                            <div class="book-thumb">
                                <a href="{{ route('user.book.show', $book->slug) }}">
                                    <img style="width: 64px; height: 92px;" src="{{ asset('storage/' . $book->avatar) ?? 'https://www.contentviewspro.com/wp-content/uploads/2017/07/default_image.png' }}" alt="img">
                                </a>
                            </div>
                            <div class="book-content">
                                <div class="title-header">
                                    <div>
                                        <h5> {{ $book->category->name }} </h5>
                                        <h3>
                                            <a href="{{ route('user.book.show', $book->slug) }}">Simple Things You To Save BOOK</a>
                                        </h3>
                                    </div>
                                    <ul class="shop-icon d-flex justify-content-center align-items-center">
                                        <li>
                                            <a href="#"><i class="far fa-heart"></i></a>
                                        </li>
                                        <li>
                                            <a href="{{ route('user.book.show', $book->slug) }}"><i class="far fa-eye"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <span class="mt-10">{{ number_format($book->price)}} VNĐ</span>
                                <ul class="author-post">
                                    <li class="authot-list">
                                        <span class="content mt-10">{{ $book->author }}</span>
                                    </li>
                                </ul>
                                <div class="shop-btn">
                                    <div class="star">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $book->star)
                                                <i class="fa-solid fa-star"></i>
                                            @else
                                                <i class="fa-regular fa-star"></i>
                                            @endif
                                        @endfor
                                    </div>
                                    <a href="{{ route('user.book.show', $book->slug) }}" class="theme-btn"><i
                                            class="fa-solid fa-eye"></i> Xem Chi Tiết</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection