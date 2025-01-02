@extends('Admin.layouts.app')
@section('title', 'Chi Tiết Đơn Hàng')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Quản Lý Đơn Hàng</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Trang Chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.order.index') }}">Quản Lý Đơn Hàng</a></li>
                    <li class="breadcrumb-item active">Chi Tiết Đơn Hàng</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h4 class="text-center mt-3">Thông Tin Đơn Hàng</h4>
                    <div style="line-height: 20px;word-spacing: 2px;" class="m-3 detail-order">
                        <span style="display: flex;">
                            <b>Mã Hóa Đơn: </b>
                            <p style="margin-left: 10px;">{{ $order->code }}</p>
                        </span>
                        <span style="display: flex;">
                            <b>Tên Khách Hàng: </b>
                            <p style="margin-left: 10px;">
                                {{ $order->user->name }}
                            </p>
                        </span>
                        <span style="display: flex;">
                            <b>Địa Chỉ Nhận: </b>
                            <p style="margin-left: 10px;">{{ $order->address }}</p>
                        </span>
                        <span style="display: flex;">
                            <b>Thời Gian: </b>
                            <p style="margin-left: 10px;">{{ $order->user->created_at }}</p>
                        </span>
                        <span style="display: flex;">
                            <b>Thanh Toán: </b>
                            <p style="margin-left: 10px;">
                                {{ $order->payment == "cod" ? "Chưa thanh toán" : "Đã thanh toán" }}
                            </p>
                        </span>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="not_print">Hình Ảnh</th>
                                    <th>Tên Sản Phẩm</th>
                                    <th>Giá Bán</th>
                                    <th>Số Lượng</th>
                                    <th>Đơn Giá</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key => $product)
                                    <tr>
                                        <td><?php echo $key + 1; ?></td>
                                        <td class="not_print">
                                            <img style="width: 100px; height: 100px;" src="{{ asset('storage/' . $product->book->avatar) ?? 'https://www.contentviewspro.com/wp-content/uploads/2017/07/default_image.png' }}">
                                        </td>
                                        <td>{{ $product->book->name }}</td>
                                        <td>{{ number_format($product->book->price) }} VNĐ</td>
                                        <td>
                                            {{ number_format($product->quantity) }} sản phẩm
                                        </td>
                                        <td>
                                            {{ number_format($product->book->price * $product->quantity) }} VNĐ
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="text-right mt-2 d-flex justify-content-end mr-4">
                            <span class="d-flex m-1">
                                <b>Tạm Tính: </b>
                                <p style="margin-left: 5px;"><?php echo number_format($order->amount) ?> VND</p>
                            </span>
                            <span class="d-flex m-1">
                                <b>Phí Giao Hàng: </b>
                                <p style="margin-left: 5px;">
                                    + {{ number_format(30000) }}
                                    VND
                                </p>
                            </span>
                            <span class="d-flex m-1">
                                <b>Giảm Giá: </b>
                                <p style="margin-left: 5px;">
                                    - {{ number_format($order->sale) }}
                                    VND
                                </p>
                            </span>
                            <span class="d-flex m-1">
                                <b>Tổng Tiền: </b>
                                <p style="margin-left: 5px;">{{ number_format($order->amount + 30000 - $order->sale) }} VNĐ</p>
                            </span>
                        </div>
                    </div>
                    <div class="card-footer clearfix" style="background: white;">
                        <a class="btn btn-success not_print" href="{{ route('admin.order.index') }}">Quay
                            Lại</a>
                        <button class="btn btn-primary not_print" onclick="window.print()">In Hóa Đơn</button>

                        <?php if (($order->payment == "cod")) { ?>
                            <a class="btn btn-warning not_print"
                            href="{{ route('admin.order.payment', $order->id) }}"
                            style="color: white;">Xác Nhận Thanh Toán</a>
                        <?php } ?>

                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<style type="text/css">
    @media print {
        .main-footer {
            display: none !important;
        }

        .content-wrapper {
            background-color: white;
        }

        .not_print {
            display: none !important;
        }

    }
</style>
@endsection