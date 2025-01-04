@extends('User.layouts.app')
@section('title', 'Trang Chủ')
@section('content')
<div class="hero-section hero-1 fix">
    <div class="w-100">
        <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
            <!-- Indicators -->
            <div class="carousel-indicators">
                @foreach ($slides as $index => $slide)
                    <button type="button" data-bs-target="#imageCarousel" data-bs-slide-to="{{ $index }}"
                        class="{{ $index == 0 ? 'active' : '' }}" aria-current="{{ $index == 0 ? 'true' : '' }}"
                        aria-label="Slide {{ $index + 1 }}"></button>
                @endforeach
            </div>

            <!-- Carousel Items -->
            <div class="carousel-inner">
                @foreach ($slides as $index => $slide)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        
                        @if ($slide->book)
                            <a href="{{ route('user.book.show', $slide->book->slug) }}"><img style="height: 668px;" src="{{ asset('storage/' . $slide->image) }}" class="d-block w-100" alt="Slide {{ $index + 1 }}"></a>
                        @elseif ($slide->category)
                            <a href="{{ route('user.category.show', $slide->category->slug) }}"><img style="height: 668px;" src="{{ asset('storage/' . $slide->image) }}" class="d-block w-100" alt="Slide {{ $index + 1 }}"></a>
                        @else
                            <a href="#"><img style="height: 668px;" src="{{ asset('storage/' . $slide->image) }}" class="d-block w-100" alt="Slide {{ $index + 1 }}"></a>
                        @endif
                    </div>
                @endforeach
            </div>

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>

<section class="book-banner-section fix section-padding">
    <div class="container">
        <div class="row g-4">
            @foreach ($banners as $banner)
                @if ($banner->book)
                    <a href="{{ route('user.book.show', $banner->book->slug) }}" class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s"
                        style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                        <div class="banner-book-card-items bg-cover"
                            style="height: 329px;">
                            <div class="book-shape" style="right: unset; width: 100%; height: 329px;">
                                <img style="height: 329px;" src="{{ asset('storage/' . $banner->image) }}" alt="img">
                            </div>
                            <div class="banner-book-content"></div>
                        </div>
                    </a>
                @elseif ($banner->category)
                    <a href="{{ route('user.category.show', $banner->category->slug) }}" class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s"
                        style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                        <div class="banner-book-card-items bg-cover"
                            style="height: 329px;">
                            <div class="book-shape" style="right: unset; width: 100%; height: 329px;">
                                <img style="height: 329px;" src="{{ asset('storage/' . $banner->image) }}" alt="img">
                            </div>
                            <div class="banner-book-content"></div>
                        </div>
                    </a>
                @else
                    <a href="#" class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s"
                        style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                        <div class="banner-book-card-items bg-cover"
                            style="height: 329px;">
                            <div class="book-shape" style="right: unset; width: 100%; height: 329px;">
                                <img style="height: 329px;" src="{{ asset('storage/' . $banner->image) }}" alt="img">
                            </div>
                            <div class="banner-book-content"></div>
                        </div>
                    </a>
                @endif
                
            @endforeach
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
                    <div class="swiper-slide swiper-slide-duplicate-next" data-swiper-slide-index="{{ $index }}"
                        role="group" aria-label="{{ $index + 1}} / 5" style="width: 290.2px; margin-right: 30px;">
                        <div class="shop-box-items style-2">
                            <div class="book-thumb center">
                                <a href="{{ route('user.book.show', $book->slug) }}"><img
                                        src="{{ asset('storage/' . $book->avatar) ?? 'https://www.contentviewspro.com/wp-content/uploads/2017/07/default_image.png' }}"
                                        alt="img"></a>
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
                                <a href="{{ route('user.book.show', $book->slug) }}" class="theme-btn"><i
                                        class="fa-solid fa-eye"></i>
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
                    style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">Chọn Thể Loại
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

                    @foreach($popularCategories as $index => $category)
                        <div class="swiper-slide @if($index == 0) swiper-slide-active @elseif($index == 1) swiper-slide-next @endif"
                            data-swiper-slide-index="{{ $index }}" role="group" aria-label="{{ $index + 1 }} / 5"
                            style="width: 278.2px; margin-right: 30px;">
                            <div class="book-catagories-items">
                                <div class="book-thumb">
                                    <img style="width: 104px; height: 145px;"
                                        src="{{ asset('storage/' . $category->image) ?? 'https://www.contentviewspro.com/wp-content/uploads/2017/07/default_image.png' }}"
                                        alt="img">
                                    <div class="circle-shape">
                                        <img src="assets/img/book-categori/circle-shape.png" alt="shape-img">
                                    </div>
                                </div>
                                <div class="number">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</div>
                                <h3><a href="{{ route('user.category.show', $category->slug) }}">{{ $category->name }}</a>
                                </h3>
                            </div>
                        </div>
                    @endforeach


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
                    <div class="swiper-slide swiper-slide-duplicate-next" data-swiper-slide-index="{{ $index }}"
                        role="group" aria-label="{{ $index + 1}} / 5" style="width: 290.2px; margin-right: 30px;">
                        <div class="shop-box-items style-2">
                            <div class="book-thumb center">
                                <a href="{{ route('user.book.show', $book->slug) }}"><img
                                        src="{{ asset('storage/' . $book->avatar) ?? 'https://www.contentviewspro.com/wp-content/uploads/2017/07/default_image.png' }}"
                                        alt="img"></a>
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
                                <a href="{{ route('user.book.show', $book->slug) }}" class="theme-btn"><i
                                        class="fa-solid fa-eye"></i>
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
                <a href="{{ route('user.book.index') }}" class="theme-btn transparent-btn wow fadeInUp"
                    data-wow-delay=".5s"
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
                                    <img style="width: 64px; height: 92px;"
                                        src="{{ asset('storage/' . $book->avatar) ?? 'https://www.contentviewspro.com/wp-content/uploads/2017/07/default_image.png' }}"
                                        alt="img">
                                </a>
                            </div>
                            <div class="book-content">
                                <div class="title-header">
                                    <div>
                                        <h5> {{ $book->category->name }} </h5>
                                        <h3>
                                            <a href="{{ route('user.book.show', $book->slug) }}">Simple Things You To Save
                                                BOOK</a>
                                        </h3>
                                    </div>
                                    <ul class="shop-icon d-flex justify-content-center align-items-center">
                                        <li>
                                            <a href="#"><i class="far fa-heart"></i></a>
                                        </li>
                                        <li>
                                            <a href="{{ route('user.book.show', $book->slug) }}"><i
                                                    class="far fa-eye"></i></a>
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
@section('script')
<!--<< Nice Select Js >>-->
<script src="{{ asset(path: 'assets/js/jquery.nice-select.min.js') }}"></script>
@endsection