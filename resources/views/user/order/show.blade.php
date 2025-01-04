@extends('User.layouts.app')
@section('title', "Giỏ Hàng")
@section('content')
<div class="cart-section section-padding">
    <div class="container">
        <div class="main-cart-wrapper">
            <div class="row g-5">
                <div class="col-xl-7">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Tên Sách</th>
                                    <th>Giá Bán</th>
                                    <th>Số Lượng</th>
                                    <th>Tạm Tính</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>
                                            <span class="d-flex gap-5 align-items-center">
                                                <span class="cart">
                                                    <img style="width: 52px; height: 68px;" src="{{ asset('storage/' . $product->book->avatar) ?? 'https://www.contentviewspro.com/wp-content/uploads/2017/07/default_image.png' }}" alt="img">
                                                </span>
                                                <span class="cart-title">
                                                    {{ $product->book->name }}
                                                </span>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="cart-price">{{ number_format($product->book->price) }} VNĐ</span>
                                        </td>
                                        <td>
                                            <span class="cart-price">{{ number_format($product->quantity) }} sản phẩm</span>
                                        </td>
                                        <td>
                                            <span class="subtotal-price">{{ number_format($product->book->price * $product->quantity) }} VNĐ</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-xl-5">
                    <div class="table-responsive cart-total">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>THÔNG TIN ĐẶT HÀNG</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <span class="d-flex gap-5 align-items-center justify-content-between">
                                            <span class="sub-title">Tạm Tính:</span>
                                            <span class="sub-price">{{ number_format($order->amount) }} VNĐ</span>
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
                                                - {{ number_format($order->sale) }} VNĐ
                                            </span>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="d-flex gap-5 align-items-center  justify-content-between">
                                            <span class="sub-title">Địa Chỉ:</span>
                                            <span class="sub-text">
                                                {{ $order->address }}
                                            </span>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="d-flex gap-5 align-items-center  justify-content-between">
                                            <span class="sub-title">Tổng Tiền: </span>
                                            <span class="sub-price sub-price-total">{{ number_format($order->amount + 30000 + $order->sale) }} VNĐ</span>
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="{{ route('user.customer.index') }}" class="theme-btn">Quay Lại</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection