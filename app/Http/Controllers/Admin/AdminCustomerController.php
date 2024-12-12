<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminCustomerController extends Controller
{
    // Hiển thị danh sách khách hàng với tính năng tìm kiếm và phân trang
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        // Lấy danh sách khách hàng với điều kiện tìm kiếm và phân trang
        $customers = User::where('role', 'user')
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%')
                             ->orWhere('email', 'like', '%' . $search . '%')
                             ->orWhere('phone', 'like', '%' . $search . '%');
            })
            ->paginate(10); // Phân trang 10 khách hàng mỗi trang

        return view('admin.customer.index', compact('customers', 'search'));
    }

    // Block hoặc unblock khách hàng
    public function block($customerId)
    {
        // Tìm khách hàng theo ID
        $customer = User::findOrFail($customerId);
        
        // Kiểm tra trạng thái hiện tại và đổi trạng thái
        if ($customer->status == 'activate') {
            $customer->status = 'block';
        } else {
            $customer->status = 'activate';
        }
        
        // Lưu lại trạng thái
        $customer->save();

        // Quay lại danh sách khách hàng
        return redirect()->route('admin.customer.index')->with('success', 'Trạng thái khách hàng đã được thay đổi.');
    }
}
