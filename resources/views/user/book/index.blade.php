@extends('User.layouts.app')
@section('title', "Tất cả sách")
@section('content')
<section class="shop-section fix section-padding" style="padding: 0; padding-bottom: 100px;">
    <div class="container">
        <div class="shop-default-wrapper">
            <div class="row">
                <div class="col-xl-3 col-lg-4 order-2 order-md-1 wow fadeInUp" data-wow-delay=".3s"
                    style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                    <div class="main-sidebar">
                        <div class="single-sidebar-widget">
                            <div class="wid-title">
                                <h5>Tìm Kiếm</h5>
                            </div>
                            <form action="{{ route('user.book.index') }}" class="search-toggle-box">
                                <div class="input-area search-container">
                                    <input class="search-input" name="search" type="text" placeholder="Nhập sách tìm kiếm">
                                    <button class="cmn-btn search-icon">
                                        <i class="far fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="single-sidebar-widget">
                            <div class="wid-title">
                                <h5>Thể Loại Sách</h5>
                            </div>
                            <div class="categories-list">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    @foreach ($categories as $category)                                
                                        <li class="nav-item" role="presentation">
                                            <a href="{{ route('user.category.show', $category->slug)}}" class="nav-link active" id="pills-arts-tab" >{{ $category->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="single-sidebar-widget mb-50">
                            <div class="wid-title">
                                <h5>Lọc Theo Giá</h5>
                            </div>
                            <form action="{{ route('user.book.index') }}" method="GET">
                                <div class="range__barcustom">
                                    <div class="range-items">
                                        <div class="price-input">
                                            <div class="d-flex align-items-center">
                                                <div class="field">
                                                    <span>Giá:</span>
                                                </div>
                                                <div class="field" style="width: 30%;">
                                                    <input type="number" name="min_price" class="input-min" value="10000" min="0">
                                                </div>
                                                <div class="separators">-</div>
                                                <div class="field">
                                                    <input type="number" name="max_price" class="input-max" value="100000" min="0">
                                                </div>
                                            </div>
                                            <br>
                                            <button type="submit" class="filter-btn mt-2 me-3">Lọc</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="single-sidebar-widget mb-0">
                            <div class="wid-title">
                                <h5>Theo Đánh Giá</h5>
                            </div>
                            <form action="{{ route('user.book.index') }}" method="GET">
                                <div class="categories-list">
                                    <label class="checkbox-single d-flex align-items-center">
                                        <span class="d-flex gap-xl-3 gap-2 align-items-center">
                                            <span class="checkbox-area d-center">
                                                <input type="checkbox" name="star[]" value="5" {{ in_array(5, request()->get('star', [])) ? 'checked' : '' }}>
                                                <span class="checkmark d-center"></span>
                                            </span>
                                            <span class="text-color">
                                                <span class="star">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                    <label class="checkbox-single d-flex align-items-center">
                                        <span class="d-flex gap-xl-3 gap-2 align-items-center">
                                            <span class="checkbox-area d-center">
                                                <input type="checkbox" name="star[]" value="4" {{ in_array(4, request()->get('star', [])) ? 'checked' : '' }}>
                                                <span class="checkmark d-center"></span>
                                            </span>
                                            <span class="text-color">
                                                <span class="star">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-sharp fa-light fa-star"></i>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                    <label class="checkbox-single d-flex align-items-center">
                                        <span class="d-flex gap-xl-3 gap-2 align-items-center">
                                            <span class="checkbox-area d-center">
                                                <input type="checkbox" name="star[]" value="3" {{ in_array(3, request()->get('star', [])) ? 'checked' : '' }}>
                                                <span class="checkmark d-center"></span>
                                            </span>
                                            <span class="text-color">
                                                <span class="star">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-sharp fa-light fa-star"></i>
                                                    <i class="fa-sharp fa-light fa-star"></i>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                    <label class="checkbox-single d-flex align-items-center">
                                        <span class="d-flex gap-xl-3 gap-2 align-items-center">
                                            <span class="checkbox-area d-center">
                                                <input type="checkbox" name="star[]" value="2" {{ in_array(2, request()->get('star', [])) ? 'checked' : '' }}>
                                                <span class="checkmark d-center"></span>
                                            </span>
                                            <span class="text-color">
                                                <span class="star">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-sharp fa-light fa-star"></i>
                                                    <i class="fa-sharp fa-light fa-star"></i>
                                                    <i class="fa-sharp fa-light fa-star"></i>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                    <label class="checkbox-single d-flex align-items-center">
                                        <span class="d-flex gap-xl-3 gap-2 align-items-center">
                                            <span class="checkbox-area d-center">
                                                <input type="checkbox" name="star[]" value="1" {{ in_array(1, request()->get('star', [])) ? 'checked' : '' }}>
                                                <span class="checkmark d-center"></span>
                                            </span>
                                            <span class="text-color">
                                                <span class="star">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-sharp fa-light fa-star"></i>
                                                    <i class="fa-sharp fa-light fa-star"></i>
                                                    <i class="fa-sharp fa-light fa-star"></i>
                                                    <i class="fa-sharp fa-light fa-star"></i>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <br>
                                <button style="padding: 8px 30px; background-color: var(--theme); color: var(--white);" type="submit" class="filter-btn mt-2 me-3">Lọc</button>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="col-xl-9 col-lg-8 order-1 order-md-2">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-arts" role="tabpanel"
                            aria-labelledby="pills-arts-tab" tabindex="0">
                            <div class="row">
                                @foreach ($books as $book)
                                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                                        <div class="shop-box-items">
                                            <div class="book-thumb center">
                                                <a href="{{ route('user.book.show', ['slug' => $book->slug]) }}">
                                                    <img src="{{ asset('storage/' . $book->avatar) }}" alt="{{ $book->name }}">
                                                </a>
                                            </div>
                                            <div class="shop-content">
                                                <h3>
                                                    <a href="{{ route('user.book.show', ['slug' => $book->slug]) }}">{{ $book->name }}</a>
                                                </h3>
                                                <ul class="price-list">
                                                    <li>${{ number_format($book->price) }} VNĐ</li>
                                                    <li>
                                                        <i class="fa-solid fa-star"></i>
                                                        {{ $book->average_star ? number_format($book->average_star, 1) : 'Chưa đánh giá' }}
                                                    </li>
                                                </ul>
                                                <div class="shop-button">
                                                    <a href="{{ route('user.book.show', ['slug' => $book->slug]) }}" class="theme-btn"><i class="fa-solid fa-eye"></i> Xem Chi Tiết</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="page-nav-wrap text-center">
                        <ul>
                            {{-- Previous Page Link --}}
                            @if ($books->onFirstPage())
                                <li><a class="previous disabled" href="#">Trước</a></li>
                            @else
                                <li><a class="previous" href="{{ $books->previousPageUrl() }}">Trước</a></li>
                            @endif

                            {{-- Pagination Links --}}
                            @for ($page = 1; $page <= $books->lastPage(); $page++)
                                @if ($page == $books->currentPage())
                                    <li><a class="page-numbers active" href="#">{{ $page }}</a></li>
                                @else
                                    <li><a class="page-numbers" href="{{ $books->url($page) }}">{{ $page }}</a></li>
                                @endif
                            @endfor

                            {{-- Next Page Link --}}
                            @if ($books->hasMorePages())
                                <li><a class="next" href="{{ $books->nextPageUrl() }}">Tiếp</a></li>
                            @else
                                <li><a class="next disabled" href="#">Tiếp</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection