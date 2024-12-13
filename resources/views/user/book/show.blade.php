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
                                    <img style="width: 315px; height: 402px;"
                                        src="{{ asset('storage/' . $book->avatar) ?? 'https://www.contentviewspro.com/wp-content/uploads/2017/07/default_image.png' }}"
                                        alt="img">
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
                                    <img style="width: 74px; height: 102px;"
                                        src="{{ asset('storage/' . $book->avatar) ?? 'https://www.contentviewspro.com/wp-content/uploads/2017/07/default_image.png' }}"
                                        alt="img">
                                </a>
                            </li>
                            @foreach ($images as $index => $image)
                                <li class="nav-item" role="presentation">
                                    <a href="#thumb{{$index + 2}}" data-bs-toggle="tab" class="nav-link"
                                        aria-selected="false" role="tab" tabindex="-1">
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
                                    <input type="number" name="qty" id="qty2" min="1" max="{{ $book->quantity }}"
                                        step="1" value="1">
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
                                        <span>Định Dạng:</span> {{ $book->format }}
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
                            @foreach ($comments as $comment)
                                <div class="review-wrap-area d-flex gap-4 mb-5">
                                    <div class="review-content">
                                        <div
                                            class="head-area d-flex flex-wrap gap-2 align-items-center justify-content-between">
                                            <div class="cont">
                                                <h5><a href="#">{{ $comment->user->name }}</a></h5>
                                                <span>{{ $comment->created_at->format('F j, Y \a\t h:i A') }}</span>
                                            </div>
                                            <div class="star">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <i
                                                        class="{{ $i <= $comment->star ? 'fa-solid fa-star' : 'fa-regular fa-star' }}"></i>
                                                @endfor
                                            </div>
                                        </div>
                                        <p class="mt-30 mb-4">
                                            {{ $comment->content }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                            @if (auth()->user())
                                <div class="review-title mt-5 py-15 mb-30">
                                    <h4>ĐÁNH GIÁ & PHẢN HỒI</h4>
                                    <div class="rate-now d-flex align-items-center">
                                        <p>Đánh giá*</p>
                                        <div class="star" id="star-rating">
                                            <i class="fa-light fa-star" data-value="1"></i>
                                            <i class="fa-light fa-star" data-value="2"></i>
                                            <i class="fa-light fa-star" data-value="3"></i>
                                            <i class="fa-light fa-star" data-value="4"></i>
                                            <i class="fa-light fa-star" data-value="5"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="review-form">
                                    <form action="{{ route('user.comment.create') }}" id="contact-form" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $book->id }}" name="bookId">
                                        <input type="hidden" value="" name="star" id="star-input">
                                        <div class="row g-4">
                                            <div class="col-lg-12">
                                                <div class="form-clt">
                                                    <span>Họ Tên*</span>
                                                    <input type="text" value="{{ auth()->user()->name }}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 wow fadeInUp animated animated" data-wow-delay=".8">
                                                <div class="form-clt">
                                                    <span>Nội Dung*</span>
                                                    <textarea name="content" id="message"
                                                        placeholder="Nhập nội dung đánh giá"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 wow fadeInUp animated animated" data-wow-delay=".9">
                                                <button type="submit" class="theme-btn">
                                                    Đánh Giá
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @endif
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
<style>
    i{
        cursor: pointer;
    }
</style>
@endsection
@section('script')
<script>
    // Lấy tất cả các sao trong phần đánh giá
    const stars = document.querySelectorAll('#star-rating i');
    const starInput = document.getElementById('star-input');

    // Khi click vào sao, thay đổi màu và cập nhật giá trị vào input
    stars.forEach(star => {
        star.addEventListener('click', function () {
            const value = this.getAttribute('data-value');
            
            // Cập nhật giá trị vào input hidden
            starInput.value = value;

            // Thay đổi màu sao
            stars.forEach(star => star.classList.replace('fa-solid', 'fa-light')); // Reset tất cả sao
            for (let i = 0; i < value; i++) {
                stars[i].classList.replace('fa-light', 'fa-solid'); // Chỉ bật sao đã chọn
            }
        });
    });
</script>
<!--<< Nice Select Js >>-->
<script src="{{ asset(path: 'assets/js/jquery.nice-select.min.js') }}"></script>
@endsection