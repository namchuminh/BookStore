@extends('Admin.layouts.app')
@section('title', 'Quản Lý Đơn Hàng')
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
                    <li class="breadcrumb-item active">Quản Lý Đơn Hàng</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <form action="{{ route('admin.order.index') }}" method="GET" class="d-flex">
                                <input type="text" name="search" class="form-control"
                                    placeholder="Tìm kiếm" value="{{ request()->query('search') }}">
                                <button type="submit" class="btn btn-primary ml-2 w-50">Tìm kiếm</button>
                            </form>
                        </div>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã Đơn Hàng</th>
                                    <th>Khách Hàng</th>
                                    <th>Tổng Tiền</th>
                                    <th>Thanh Toán</th>
                                    <th>Trạng Thái</th>
                                    <th>Ngày Tạo</th>
                                    <th>Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($orders as $key => $order)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $order->code }}</td>
                                        <td>{{ $order->user->name ?? 'N/A' }}</td>
                                        <td>{{ number_format($order->amount, 0, ',', '.') }} đ</td>
                                        <td>{{ $order->payment == "cod" ? "Tiền Mặt" : "Chuyển Khoản" }}</td>
                                        <td>
                                            @if ($order->status == "pending")
                                                Chờ Xử Lý
                                            @elseif($order->status == "confirmed")
                                                Đã Duyệt Đơn
                                            @elseif($order->status == "packed")
                                                Đã Đóng Gói
                                            @elseif($order->status == "shipped")
                                                Đang Giao Hàng
                                            @elseif($order->status == "delivered")
                                                Đã Giao Hàng
                                            @elseif($order->status == "cancelled")
                                                Đã Hủy Đơn
                                            @elseif($order->status == "returned")
                                                Đã Trả Hàng
                                            @endif
                                        </td>
                                        <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                        <td>
                                            <form action="{{ route('admin.order.status', $order->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('PUT')
                                                <select name="status" onchange="this.form.submit()" class="btn btn-sm bg-dark">
                                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Chờ Xử Lý</option>
                                                    <option value="confirmed" {{ $order->status == 'confirmed' ? 'selected' : '' }}>Đã Duyệt Đơn</option>
                                                    <option value="packed" {{ $order->status == 'packed' ? 'selected' : '' }}>Đã Đóng Gói</option>
                                                    <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Đang Giao Hàng</option>
                                                    <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Đã Giao Hàng</option>
                                                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Đã Hủy Đơn</option>
                                                    <option value="returned" {{ $order->status == 'returned' ? 'selected' : '' }}>Đã Trả Hàng</option>
                                                </select>
                                            </form>
                                            <a href="{{ route('admin.order.show', $order->id) }}"
                                                class="btn btn-sm btn-info"><i class="fa-solid fa-eye"></i> Xem Chi Tiết</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">Không tìm thấy đơn hàng nào</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer clearfix">
                        {{ $orders->appends(request()->query())->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection
