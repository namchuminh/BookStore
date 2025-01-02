@extends('User.layouts.app')
@section('title', "Khách Hàng")
@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-md-3">
            <!-- Sidebar Tabs -->
            <div class="card shadow-sm border-0">
                <div class="card-header text-white text-center py-3" style="background-color: #036280;">
                    <h5 class="text-white">Tài khoản của tôi</h5>
                </div>
                <div class="card-body">
                    <ul class="nav flex-column nav-pills" id="customerPanel" role="tablist">
                        <li class="nav-item mb-2" role="presentation">
                            <button class="nav-link active d-flex align-items-center" id="invoices-tab" data-bs-toggle="pill"
                                data-bs-target="#invoices" type="button" role="tab" aria-controls="invoices"
                                aria-selected="false">
                                <i class="bi bi-file-earmark-text me-2"></i> Hóa Đơn
                            </button>
                        </li>
                        <li class="nav-item mb-2" role="presentation">
                            <button class="nav-link d-flex align-items-center" id="update-tab" data-bs-toggle="pill"
                                data-bs-target="#update" type="button" role="tab" aria-controls="update"
                                aria-selected="false">
                                <i class="bi bi-pencil-square me-2"></i> Đổi Thông Tin
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link d-flex align-items-center" href="{{ route('user.logout.index') }}"><i class="bi bi-pencil-square me-2"></i> Đăng xuất
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <!-- Tab Content -->
            <div class="tab-content p-3 border rounded shadow-sm bg-white" id="customerPanelContent">
                <div class="tab-pane fade show active" id="invoices" role="tabpanel" aria-labelledby="invoices-tab">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered align-middle">
                        <thead class="table-primary text-center">
                            <tr>
                                <th>STT</th>
                                <th>Mã Đơn Hàng</th>
                                <th>Tổng Tiền</th>
                                <th>Thanh Toán</th>
                                <th>Trạng Thái</th>
                                <th>Ngày Tạo</th>
                                <th>Xem Chi Tiết</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $index => $order)
                            <tr>
                                <td class="text-center">{{ $orders->firstItem() + $index }}</td>
                                <td>{{ $order->code }}</td>
                                <td>{{ number_format($order->amount + 30000 - $order->sale, 0, ',', '.') }} VNĐ</td>
                                <td class="text-center">
                                    @switch($order->payment)
                                        @case('cod')
                                        <span class="badge bg-primary">Tiền Mặt</span>
                                        @break

                                        @case('bank')
                                        <span class="badge bg-success">Chuyển Khoản</span>
                                        @break

                                        @default
                                        <span class="badge bg-secondary">Chưa xác định</span>
                                    @endswitch
                                </td>
                                <td class="text-center">
                                    @switch($order->status)
                                        @case('pending')
                                        <span class="badge bg-warning">Chờ xác nhận</span>
                                        @break

                                        @case('confirmed')
                                        <span class="badge bg-info">Đã xác nhận</span>
                                        @break

                                        @case('packed')
                                        <span class="badge bg-primary">Đã đóng gói</span>
                                        @break

                                        @case('shipped')
                                        <span class="badge bg-secondary">Đang giao hàng</span>
                                        @break

                                        @case('delivered')
                                        <span class="badge bg-success">Đã giao hàng</span>
                                        @break

                                        @case('cancelled')
                                        <span class="badge bg-danger">Đã hủy</span>
                                        @break

                                        @case('returned')
                                        <span class="badge bg-dark">Đã trả lại</span>
                                        @break

                                        @default
                                        <span class="badge bg-secondary">Trạng thái không xác định</span>
                                    @endswitch
                                </td>
                                <td class="text-center">{{ $order->created_at->format('Y-m-d H:i') }}</td>
                                <td class="text-center">
                                    <a href="{{ route('user.order.show', $order->id) }}" class="btn btn-dark btn-sm">XEM</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center text-danger">Không có đơn hàng nào.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Hiển thị phân trang -->
                <div class="d-flex justify-content-center mt-3">
                    {{ $orders->links('pagination::bootstrap-4') }}
                </div>
                </div>
                <div class="tab-pane fade" id="update" role="tabpanel" aria-labelledby="update-tab">
                    <h4 class="text-primary"><i class="bi bi-pencil-square me-2"></i> Cập nhật</h4>
                    <form>
                        <div class="mb-3">
                            <label for="updateName" class="form-label">Tên</label>
                            <input type="text" class="form-control" id="updateName" placeholder="Nhập tên của bạn">
                        </div>
                        <div class="mb-3">ka
                            <label for="updateEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="updateEmail" placeholder="Nhập email">
                        </div>
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </form>
                </div>
                <div class="tab-pane fade" id="logout" role="tabpanel" aria-labelledby="logout-tab">
                    <h4 class="text-danger"><i class="bi bi-box-arrow-right me-2"></i> Đăng xuất</h4>
                    <p>Bạn có chắc chắn muốn đăng xuất không?</p>
                    <button class="btn btn-danger">Đăng xuất</button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .active, .nav-link{
        width: 100%;
    }
</style>
@endsection