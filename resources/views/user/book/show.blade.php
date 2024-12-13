@extends('User.layouts.app')
@section('title', $book->name)
@section('content')
<section class="shop-details-section fix section-padding">
    <div class="container">
        <div class="shop-details-wrapper">
            <div class="row g-4">
                <div class="col-lg-5">
                    <div class="shop-details-image">
                        <div class="tab-content">
                            <div id="thumb1" class="tab-pane fade show active" role="tabpanel">
                                <div class="shop-details-thumb">
                                    <img style="width: 315px; height: 402px;" src="{{ asset('storage/' . $book->avatar) ?? 'https://www.contentviewspro.com/wp-content/uploads/2017/07/default_image.png' }}" alt="img">
                                </div>
                            </div>
                            @foreach ($images as $index => $image)
                                <div id="thumb{{ $index + 2 }}" class="tab-pane fade" role="tabpanel">
                                    <div class="shop-details-thumb">
                                        <img style="width: 315px; height: 402px;" src="{{ $image }}" alt="img">
                                    </div>
                                </div>
                            @endforeach
                            
                        </div>
                        <ul class="nav" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a href="#thumb1" data-bs-toggle="tab" class="nav-link" aria-selected="false" role="tab"
                                    tabindex="-1">
                                    <img style="width: 74px; height: 102px;" src="{{ asset('storage/' . $book->avatar) ?? 'https://www.contentviewspro.com/wp-content/uploads/2017/07/default_image.png' }}" alt="img">
                                </a>
                            </li>
                            @foreach ($images as $index => $image)
                                <li class="nav-item" role="presentation">
                                    <a href="#thumb{{$index + 2}}" data-bs-toggle="tab" class="nav-link" aria-selected="false" role="tab"
                                        tabindex="-1">
                                        <img style="width: 74px; height: 102px;" src="{{ $image }}" alt="img">
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="shop-details-content">
                        <div class="title-wrapper">
                            <h2>{{ $book->name }}</h2>
                            <h5>Hiện còn: {{ $book->quantity }}</h5>
                        </div>
                        <div class="star">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $book->star)
                                    <a href="#"> <i class="fas fa-star"></i></a>
                                @else
                                    <a href="#"><i class="fa-regular fa-star"></i></a>
                                @endif
                            @endfor
                        </div>
                        <p>{{ $book->description ?? "" }}</p>
                        <div class="price-list">
                            <h3>{{ number_format($book->price) }} VNĐ</h3>
                        </div>
                        <form class="cart-wrapper" method="post" action="{{ route('user.cart.add') }}">
                            @csrf
                            <div class="quantity-basket">
                                <p class="qty">
                                    <button class="qtyminus" aria-hidden="true">−</button>
                                    <input type="number" name="qty" id="qty2" min="1" max="{{ $book->quantity }}" step="1" value="1">
                                    <input type="hidden" name="bookId" value="{{ $book->id }}">
                                    <button class="qtyplus" aria-hidden="true">+</button>
                                </p>
                            </div>
                            <button type="button" class="theme-btn style-2" data-bs-toggle="modal"
                                data-bs-target="#readMoreModal">
                                Đọc Tóm Tắt
                            </button>
                            <!-- Read More Modal -->
                            <div class="modal fade" id="readMoreModal" tabindex="-1"
                                aria-labelledby="readMoreModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body" style="background-image: url(assets/img/popupBg.png);">
                                            <div class="close-btn">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="readMoreBox">
                                                <div class="content">
                                                    <h3 id="readMoreModalLabel">{{ $book->name }}</h3>
                                                    {!! $book->summary !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="theme-btn"><i class="fa-solid fa-basket-shopping"></i>
                                Thêm Giỏ Hàng</button>
                            <div class="icon-box">
                                <a href="#" class="icon">
                                    <i class="far fa-heart"></i>
                                </a>
                            </div>
                        </form>
                        <div class="category-box">
                            <div class="category-list">
                                <ul>
                                    <li>
                                        <span>Mã SKU:</span> {{ $book->sku }}
                                    </li>
                                    <li>
                                        <span>Thể Loại:</span> {{ $book->category->name }}
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        <span>Thẻ:</span> {{ $book->tags }}
                                    </li>
                                    <li>
                                        <span>Định Dạng:</span>  {{ $book->format }}
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        <span>Số Trang:</span> {{ $book->total_page }}
                                    </li>
                                    <li>
                                        <span>Ngôn Ngữ:</span> {{ $book->language }}
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        <span>Xuất Bản:</span> {{ $book->published_year }}
                                    </li>
                                    <li>
                                        <span>Quốc Gia:</span> {{ $book->century }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="box-check">
                            <div class="check-list">
                                <ul>
                                    <li>
                                        <i class="fa-solid fa-check"></i>
                                        Miễn Phí Vận Chuyển
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-check"></i>
                                        Đổi Trả 30 Ngày
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        <i class="fa-solid fa-check"></i>
                                        Sách Chất Lượng Cao
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-check"></i>
                                        Thanh Toán Bảo Mật & An Toàn
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-tab section-padding pb-0">
                <ul class="nav mb-5" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a href="#review" data-bs-toggle="tab" class="nav-link" aria-selected="false" tabindex="-1"
                            role="tab">
                            <h6>Đánh giá sách: "{{ $book->name }}"</h6>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="review" class="tab-pane fade show active" role="tabpanel">
                        <div class="review-items">
                            <div class="review-wrap-area d-flex gap-4">
                                <div class="review-thumb">
                                    <img src="assets/img/shop-details/review.png" alt="img">
                                </div>
                                <div class="review-content">
                                    <div
                                        class="head-area d-flex flex-wrap gap-2 align-items-center justify-content-between">
                                        <div class="cont">
                                            <h5><a href="news-details.html">Leslie Alexander</a></h5>
                                            <span>February 10, 2024 at 2:37 pm</span>
                                        </div>
                                        <div class="star">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-regular fa-star"></i>
                                        </div>
                                    </div>
                                    <p class="mt-30 mb-4">
                                        Neque porro est qui dolorem ipsum quia quaed inventor veritatis et quasi
                                        architecto var sed efficitur turpis gilla sed sit amet finibus eros. Lorem
                                        Ipsum is <br> simply dummy
                                    </p>
                                </div>
                            </div>
                            <div class="review-title mt-5 py-15 mb-30">
                                <h4>Your Rating*</h4>
                                <div class="rate-now d-flex align-items-center">
                                    <p>Your Rating*</p>
                                    <div class="star">
                                        <i class="fa-light fa-star"></i>
                                        <i class="fa-light fa-star"></i>
                                        <i class="fa-light fa-star"></i>
                                        <i class="fa-light fa-star"></i>
                                        <i class="fa-light fa-star"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="review-form">
                                <form action="#" id="contact-form" method="POST">
                                    <div class="row g-4">
                                        <div class="col-lg-6">
                                            <div class="form-clt">
                                                <span>Your Name*</span>
                                                <input type="text" name="name" id="name" placeholder="Your Name">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-clt">
                                                <span>Your Email*</span>
                                                <input type="text" name="email" id="email" placeholder="Your Email">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 wow fadeInUp animated animated" data-wow-delay=".8"
                                            style="visibility: visible; animation-name: fadeInUp;">
                                            <div class="form-clt">
                                                <span>Message*</span>
                                                <textarea name="message" id="message"
                                                    placeholder="Write Message"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 wow fadeInUp animated animated" data-wow-delay=".9"
                                            style="visibility: visible; animation-name: fadeInUp;">
                                            <div class="form-check d-flex gap-2 from-customradio">
                                                <input type="checkbox" class="form-check-input" name="flexRadioDefault"
                                                    id="flexRadioDefault12">
                                                <label class="form-check-label" for="flexRadioDefault12">
                                                    i accept your terms &amp; conditions
                                                </label>
                                            </div>
                                            <button type="submit" class="theme-btn">
                                                Submit now
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="top-ratting-book-section fix section-padding pt-0">
    <div class="container">
        <div class="section-title text-center">
            <h2 class="mb-3 wow fadeInUp mt-2" data-wow-delay=".3s"
                style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">Sách Liên Quan</h2>
            <p class="wow fadeInUp" data-wow-delay=".5s"
                style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                Danh sách sản phẩm liên quan
            </p>
        </div>
        <div class="swiper book-slider swiper-initialized swiper-horizontal swiper-pointer-events">
            <div class="swiper-wrapper" id="swiper-wrapper-10f19cc27f361a4b6" aria-live="off"
                style="transform: translate3d(-2292px, 0px, 0px); transition-duration: 0ms;">
                @foreach ($relatedBooks as $index => $book)
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
@endsection
@section('script')
    <!--<< Nice Select Js >>-->
    <script src="{{ asset(path: 'assets/js/jquery.nice-select.min.js') }}"></script>
@endsection