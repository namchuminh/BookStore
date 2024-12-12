<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\DetailOrder;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    // Hiển thị danh sách đơn hàng với tìm kiếm và phân trang
    public function index(Request $request)
    {
        $search = $request->query('search');

        $orders = Order::with('user')
            ->when(!empty($search), function ($query) use ($search) {
                $query->where('code', 'like', "%$search%")
                      ->orWhereHas('user', function ($q) use ($search) {
                          $q->where('name', 'like', "%$search%");
                      });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('Admin.order.index', compact('orders', 'search'));
    }

    // Hiển thị chi tiết đơn hàng
    public function show($id)
    {
        $order = Order::with(['user', 'detailOrders.book'])->findOrFail($id);

        return view('Admin.order.show', compact('order'));
    }

    // Cập nhật trạng thái đơn hàng
    public function status(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $validated = $request->validate([
            'status' => 'required|string|max:255', // Đảm bảo trạng thái hợp lệ với giá trị trong DB
        ]);

        $order->update(['status' => $validated['status']]);

        return redirect()->route('admin.order.index')->with('success', 'Trạng thái đơn hàng đã được cập nhật.');
    }
}
