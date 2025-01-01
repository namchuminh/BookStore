@extends('User.layouts.app')
@section('title', "Giỏ Hàng")
@section('content')
<div class="cart-section section-padding">
    <div class="container">
        <div class="main-cart-wrapper">
            <div class="row g-5">
                <div class="col-xl-9">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Tên Sách</th>
                                    <th>Giá Bán</th>
                                    <th>Số Lượng</th>
                                    <th>Tạm Tính</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carts as $cart)
                                    <tr>
                                        <td>
                                            <span class="d-flex gap-5 align-items-center">
                                                <span class="cart">
                                                    <img style="width: 52px; height: 68px;" src="{{ asset('storage/' . $cart->book->avatar) ?? 'https://www.contentviewspro.com/wp-content/uploads/2017/07/default_image.png' }}" alt="img">
                                                </span>
                                                <span class="cart-title">
                                                    {{ $cart->book->name }}
                                                </span>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="cart-price">{{ number_format($cart->book->price) }} VNĐ</span>
                                        </td>
                                        <td>
                                            <form action="{{ route('user.cart.update', $cart->id) }}" method="POST">
                                                @csrf
                                                @method('put')
                                                <input type="hidden" name="cart_id" value="{{ $cart->id }}">
                                                
                                                <div class="quantity-basket">
                                                    <span class="qty">
                                                        <!-- Nút giảm -->
                                                        <button type="submit" name="action" value="decrease" style="margin-right: 15px;">−</button>
                                                        <input type="number" name="quantity" id="qty2" min="1" max="{{ $cart->book->quantity }}" step="1" value="{{ $cart->quantity }}" class="qty-input">
                                                        <!-- Nút tăng -->
                                                        <button type="submit" name="action" value="increase">+ </button>
                                                    </span>
                                                </div>
                                            </form>
                                        </td>
                                        <td>
                                            <span class="subtotal-price">{{ number_format($cart->book->price * $cart->quantity) }} VNĐ</span>
                                        </td>
                                        <td>
                                            <a href="{{ route('user.cart.delete', $cart->id) }}" class="remove-icon">
                                                <img src="assets/img/icon/icon-9.svg" alt="img">
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if ($total <= 0)
                            <p class="text-center mt-5 mb-5">Không có sản phẩm nào trong giỏ hàng!</p>
                            <a href="{{ route('user.book.index') }}" class="btn btn-dark"><i class="fa-solid fa-cart-plus"></i> Thêm Sản Phẩm</a>
                        @endif
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="table-responsive cart-total">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>TỔNG GIỎ HÀNG</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <span class="d-flex gap-5 align-items-center justify-content-between">
                                            <span class="sub-title">Tạm Tính:</span>
                                            <span class="sub-price">{{ number_format($total) }} VNĐ</span>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="d-flex gap-5 align-items-center  justify-content-between">
                                            <span class="sub-title">Vận Chuyển:</span>
                                            <span class="sub-text">
                                                + 30,000 VNĐ
                                            </span>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="d-flex gap-5 align-items-center  justify-content-between">
                                            <span class="sub-title">Giảm Giá:</span>
                                            <span class="sub-text">
                                                - {{ number_format(session('pont', 0)) }} VNĐ
                                            </span>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <form action="{{ route('user.cart.pont') }}" method="POST">
                                            @csrf
                                            <span class="d-flex gap-5 align-items-center  justify-content-between">
                                                <input type="number" class="form-control" name="pont" placeholder="Số lượng điểm">
                                                <button class="btn btn-primary" type="submit">Dùng</button>
                                            </span>
                                            <span class="mt-2">
                                                <p class="mt-2 text-muted" style="font-size: 14px;">Bạn hiện có 
                                                    <!-- Lấy ra session pont -->
                                                    <b>{{ number_format(auth()->user()->pont) }} điểm</b> 
                                                để sử dụng.</p>
                                            </span>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="d-flex gap-5 align-items-center  justify-content-between">
                                            <span class="sub-title">Tổng Tiền: </span>
                                            <span class="sub-price sub-price-total">{{ number_format($total + 30000 - session('pont', 0)) }} VNĐ</span>
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        @if ($total > 1)
                            <a href="{{ route('user.checkout.index') }}" class="theme-btn">Tiến Hành Đặt Hàng</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection