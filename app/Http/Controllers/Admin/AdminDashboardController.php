<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\DetailOrder;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Lấy ngày hiện tại
        $today = Carbon::today();
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        // Đơn hàng hôm nay
        $ordersToday = Order::whereDate('created_at', $today)->count();
        
        // Doanh thu hôm nay
        $revenueToday = Order::whereDate('created_at', $today)->sum('amount');

        // Khách hàng hôm nay
        $customersToday = Order::whereDate('created_at', $today)->distinct('user_id')->count('user_id');

        // Doanh thu tháng này
        $revenueMonth = Order::whereBetween('created_at', [$startOfMonth, $endOfMonth])->sum('amount');

        // Đơn hàng tháng này
        $ordersMonth = Order::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();

        // Bán trong tháng này (số lượng sách)
        $booksSoldMonth = DetailOrder::whereHas('order', function ($query) use ($startOfMonth, $endOfMonth) {
            $query->whereBetween('created_at', [$startOfMonth, $endOfMonth]);
        })->sum('quantity');

        // Doanh thu tuần này
        $revenueWeek = Order::whereBetween('created_at', [$startOfWeek, $endOfWeek])->sum('amount');

        // Đơn hàng tuần này
        $ordersWeek = Order::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();

        // Bán trong tuần này (số lượng sách)
        $booksSoldWeek = DetailOrder::whereHas('order', function ($query) use ($startOfWeek, $endOfWeek) {
            $query->whereBetween('created_at', [$startOfWeek, $endOfWeek]);
        })->sum('quantity');

        return view('admin.dashboard', compact(
            'ordersToday',
            'revenueToday',
            'customersToday',
            'revenueMonth',
            'ordersMonth',
            'booksSoldMonth',
            'revenueWeek',
            'ordersWeek',
            'booksSoldWeek'
        ));
    }

    public function sumRevenue()
    {
        $data = [];

        // Duyệt qua từng tháng trong năm
        for ($i = 1; $i <= 12; $i++) {
            // Lấy tổng doanh thu của tháng
            $revenue = Order::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', $i)
                ->sum('amount');

            // Nếu không có doanh thu, mặc định là 0
            $data[] = $revenue ? (int) $revenue : 0;
        }

        // Trả về JSON
        return response()->json($data);
    }

    /**
     * Tổng đơn hàng từng tháng trong năm
     */
    public function sumOrder()
    {
        $data = [];

        // Duyệt qua từng tháng trong năm
        for ($i = 1; $i <= 12; $i++) {
            // Lấy số lượng đơn hàng của tháng
            $orders = Order::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', $i)
                ->count();

            // Nếu không có đơn hàng, mặc định là 0
            $data[] = $orders ? (int) $orders : 0;
        }

        // Trả về JSON
        return response()->json($data);
    }
}
