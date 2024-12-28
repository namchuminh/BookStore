@extends('User.layouts.app')
@section('title', "Giỏ Hàng")
@section('content')
<section class="checkout-section fix section-padding">
    <div class="container">
        <form class="row g-5" action="{{ route('user.checkout.create') }}" method="POST">
            @csrf
            <div class="col-lg-7">
                <div class="checkout-single-wrapper">
                    <div class="checkout-single boxshado-single">
                        <h4>Thông Tin Đặt Hàng</h4>
                        <div class="checkout-single-form">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="input-single">
                                        <span>Họ Tên*</span>
                                        <input disabled type="text" required="" value="{{ auth()->user()->name }}">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="input-single">
                                        <span>Email*</span>
                                        <input disabled type="text" required="" value="{{ auth()->user()->email }}">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="input-single">
                                        <span>Số Điện Thoại*</span>
                                        <input disabled type="text" required="" value="{{ auth()->user()->phone }}">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="input-single">
                                        <span>Tỉnh/Thành Phố*</span>
                                        <select id="province" name="province" class="form-control w-100"
                                            style="display: unset;">
                                            <option value="">Chọn Tỉnh/Thành phố</option>
                                        </select>
                                        <input type="hidden" id="province_text" name="province_text">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="input-single">
                                        <span>Quận/Huyện*</span>
                                        <select id="district" name="district" class="form-control w-100">
                                            <option value="">Chọn Quận/Huyện</option>
                                        </select>
                                        <input type="hidden" id="district_text" name="district_text">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="input-single">
                                        <span>Xã/Phường*</span>
                                        <select id="ward" name="ward" class="form-control w-100">
                                            <option value="">Chọn Xã/Phường</option>
                                        </select>
                                        <input type="hidden" id="ward_text" name="ward_text">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-single">
                                        <span>Địa chỉ*</span>
                                        <input type="text" name="address" placeholder="Số nhà, đường, xóm, ngõ">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="checkout-order-area">
                    <h3>THÔNG TIN GIỎ HÀNG</h3>
                    <div class="product-checout-area">
                        <div class="checkout-item d-flex align-items-center justify-content-between">
                            <p>Tên Sách</p>
                            <p>Tạm Tính</p>
                        </div>
                        @foreach ($carts as $cart)
                            <div class="checkout-item d-flex align-items-center justify-content-between">
                                <p>{{ $cart->book->name }} x {{ $cart->quantity }}</p>
                                <p>{{ number_format($cart->quantity * $cart->book->price) }} VNĐ</p>
                            </div>
                        @endforeach
                        <div class="checkout-item d-flex justify-content-between">
                            <p>Phí Giao Hàng</p>
                            <div class="shopping-items">
                                <div class="form-check d-flex align-items-center from-customradio">
                                    <label class="form-check-label">
                                        30,000 VNĐ
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="checkout-item d-flex align-items-center justify-content-between">
                            <p>Giảm Giá</p>
                            <p>0 VNĐ</p>
                        </div>
                        <div class="checkout-item d-flex align-items-center justify-content-between">
                            <p>Tổng Tiền</p>
                            <p>{{ number_format($total) }} VNĐ</p>
                        </div>
                        <div class="checkout-item-2">
                            <div class="form-check-2 d-flex align-items-center from-customradio-2">
                                <input class="form-check-input" type="radio" name="payment"
                                    id="flexRadioDefault1222" value="cod" checked>
                                <label class="form-check-label" for="flexRadioDefault1222">
                                    Tiền Mặt
                                </label>
                            </div>
                            <p>
                                Bạn sẽ thanh toán khi chúng tôi gửi sản phẩm đến địa chỉ thanh toán của bạn.
                            </p>
                            <div class="form-check-3 d-flex align-items-center from-customradio-2 mt-3">
                                <input class="form-check-input" type="radio" name="payment"
                                    id="flexRadioDefault12224" value="bank">
                                <label class="form-check-label" for="flexRadioDefault12224">
                                    Chuyển Khoản
                                </label>
                            </div>
                            <p>
                                Bạn sẽ thanh toán bằng cách chuyển khoản trước, không cần phải thanh toán khi nhận hàng.
                            </p>
                            <button type="submit" class="theme-btn mt-5 w-100">Thanh Toán</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<style>
    #province,
    #district,
    #ward {
        width: 100%;
        outline: none;
        box-shadow: none;
        border: 1px solid #E5E5E5;
        border-radius: 6px;
        padding: 19px 24px;
        color: var(--header);
        text-transform: capitalize;
        font-weight: 500;
    }
</style>
@endsection
@section('script')
<script>
    $(document).ready(function () {
        // Load danh sách Tỉnh/Thành phố khi trang được tải
        $("#province").css("display", "unset");
        $("#district").css("display", "unset");
        $("#ward").css("display", "unset");
        $.getJSON('/api/province', function (data) {
            let $provinceSelect = $('#province');
            data.results.forEach(function (province) {
                $provinceSelect.append($('<option>', {
                    value: province.province_id,
                    text: province.province_name
                }));
            });
        });

        // Khi thay đổi Tỉnh/Thành phố
        $('#province').on('change', function () {
            let provinceId = $(this).val();
            let $districtSelect = $('#district');
            $districtSelect.html('<option value="">Chọn Quận/Huyện</option>'); // Reset danh sách Quận/Huyện

            if (provinceId) {
                $.getJSON(`/api/district/${provinceId}`, function (data) {
                    data.results.forEach(function (district) {
                        $districtSelect.append($('<option>', {
                            value: district.district_id,
                            text: district.district_name
                        }));
                    });
                });
            }

            $('#ward').html('<option value="">Chọn Xã/Phường</option>'); // Reset danh sách Xã/Phường
            $('#province_text').val($(this).find('option:selected').text()); // Lưu giá trị text của tỉnh
        });

        // Khi thay đổi Quận/Huyện
        $('#district').on('change', function () {
            let districtId = $(this).val();
            let $wardSelect = $('#ward');
            $wardSelect.html('<option value="">Chọn Xã/Phường</option>'); // Reset danh sách Xã/Phường

            if (districtId) {
                $.getJSON(`/api/ward/${districtId}`, function (data) {
                    data.results.forEach(function (ward) {
                        $wardSelect.append($('<option>', {
                            value: ward.ward_id,
                            text: ward.ward_name
                        }));
                    });
                });
            }

            $('#district_text').val($(this).find('option:selected').text()); // Lưu giá trị text của quận
            $('#ward_text').val(''); // Reset giá trị text của xã
        });

        // Khi thay đổi Xã/Phường
        $('#ward').on('change', function () {
            $('#ward_text').val($(this).find('option:selected').text()); // Lưu giá trị text của xã
        });
    });
</script>
@endsection