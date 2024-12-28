@extends('Admin.layouts.app')
@section('title', 'Trang Quản Trị')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Trang Chủ</a></li>
                    <li class="breadcrumb-item active">Bảng Điều Khiển</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?php echo $ordersToday; ?></h3>

                        <p>Đơn Hàng Hôm Nay</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?php echo number_format($revenueToday); ?> VND</h3>
                        <p>Doanh Thu Hôm Nay</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?php echo $customersToday; ?></h3>

                        <p>Khách Mua Hôm Nay</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="ion ion-stats-bars"></i></span>
                    <a href="#" class="info-box-content" style="color: black;">
                        <span class="info-box-text">Doanh Thu Tháng Này</span>
                        <span class="info-box-number"><?php echo number_format($revenueMonth); ?> VND</span>
                    </a>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-4 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="fa-solid fa-cart-shopping"></i></span>

                    <a href="#" class="info-box-content" style="color: black;">
                        <span class="info-box-text">Đơn Hàng Tháng Này</span>
                        <span class="info-box-number"><?php echo $ordersMonth; ?> Đơn Hàng</span>
                    </a>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-4 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="fa-solid fa-bag-shopping"></i></span>

                    <a href="#" class="info-box-content" style="color: black;">
                        <span class="info-box-text">Bán Trong Tháng Này</span>
                        <span class="info-box-number"><?php echo $booksSoldMonth; ?> Sản Phẩm</span>
                    </a>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="ion ion-stats-bars"></i></span>
                    <a href="#" class="info-box-content" style="color: black;">
                        <span class="info-box-text">Doanh Thu Tuần Này</span>
                        <span class="info-box-number"><?php echo number_format($revenueWeek); ?> VND</span>
                    </a>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-4 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="fa-solid fa-cart-shopping"></i></span>

                    <a href="#" class="info-box-content" style="color: black;">
                        <span class="info-box-text">Đơn Hàng Tuần Này</span>
                        <span class="info-box-number"><?php echo $ordersWeek; ?> Đơn Hàng</span>
                    </a>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-4 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="fa-solid fa-bag-shopping"></i></span>

                    <a href="#" class="info-box-content" style="color: black;">
                        <span class="info-box-text">Bán Trong Tuần Này</span>
                        <span class="info-box-number"><?php echo $booksSoldWeek; ?> Sản Phẩm</span>
                    </a>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>

        <div class="row">
            <section class="col-lg-6 connectedSortable ui-sortable">
                <!-- solid sales graph -->
                <div class="card bg-gradient-white">
                    <div class="card-header border-0">
                        <h3 class="card-title">
                            <i class="fas fa-th mr-1"></i>
                            Đơn Hàng Theo Tháng
                        </h3>
                    </div>
                    <div class="card-body">
                        <canvas id="orderChar"
                            style="min-height: 250px; height: 400px; max-height: 400px; max-width: 100%;"></canvas>
                    </div>
                    <!-- /.card-body -->

                </div>
                <!-- /.card -->
            </section>

            <section class="col-lg-6 connectedSortable ui-sortable">
                <!-- solid sales graph -->
                <div class="card bg-gradient-white">
                    <div class="card-header border-0">
                        <h3 class="card-title">
                            <i class="fas fa-th mr-1"></i>
                            Doanh Thu Theo Tháng
                        </h3>
                    </div>
                    <div class="card-body">
                        <canvas id="revenueChart"
                            style="min-height: 250px; height: 400px; max-height: 400px; max-width: 100%;"></canvas>
                    </div>
                    <!-- /.card-body -->

                </div>
                <!-- /.card -->
            </section>
        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    $(document).ready(function () {
        // Biểu đồ số lượng đơn hàng theo tháng
        $.get('{{ route('admin.sumOrder') }}', function (data) {
            // Dữ liệu tháng
            var months = ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"];
            var order = data;

            // Lấy thẻ canvas
            var ctx = document.getElementById('orderChar').getContext('2d');

            // Khởi tạo biểu đồ cột
            var orderChar = new Chart(ctx, {
                type: 'bar', // Đổi thành biểu đồ cột
                data: {
                    labels: months,
                    datasets: [{
                        label: 'Đơn Hàng Theo Tháng',
                        data: order,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)', // Màu nền
                        borderColor: 'rgb(75, 192, 192)', // Màu viền
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1, // Đảm bảo hiển thị số nguyên
                                callback: function (value) {
                                    return Math.round(value); // Làm tròn giá trị
                                }
                            }
                        }
                    }
                }
            });
        });

        // Biểu đồ doanh thu theo tháng
        $.get('{{ route('admin.sumRevenue') }}', function (data) {
            // Dữ liệu tháng
            var months = ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"];
            var revenues = data;

            // Lấy thẻ canvas
            var ctx = document.getElementById('revenueChart').getContext('2d');

            // Khởi tạo biểu đồ cột
            var revenueChart = new Chart(ctx, {
                type: 'bar', // Đổi thành biểu đồ cột
                data: {
                    labels: months,
                    datasets: [{
                        label: 'Doanh Thu Theo Tháng (VND)',
                        data: revenues,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)', // Màu nền
                        borderColor: 'rgb(54, 162, 235)', // Màu viền
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function (value) {
                                    // Hiển thị giá trị dưới dạng tiền tệ
                                    return value.toLocaleString('vi-VN') + ' đ';
                                }
                            }
                        }
                    }
                }
            });
        });
    });
</script>
@endsection