<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class UserCustomerController extends Controller
{
    public function index(){
        if(!auth()->user()){
            return redirect()->back()->with('error', 'Vui lòng đăng nhập để truy cập thông tin khách hàng.');
        }
        // Lấy danh sách đơn hàng của người dùng hiện tại
        $orders = Order::where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'desc') // Sắp xếp giảm dần theo ngày tạo
            ->paginate(10); // Phân trang, mỗi trang 10 đơn hàng

        // Truyền dữ liệu sang view
        return view('user.customer.index', compact('orders'));
    }
}
