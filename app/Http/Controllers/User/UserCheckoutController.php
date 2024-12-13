<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\DetailOrder;
use Illuminate\Support\Facades\Auth;

class UserCheckoutController extends Controller
{
    public function index()
    {
        if (!auth()->user()) {
            return redirect()->back()->with('error', 'Vui lòng đăng nhập để thanh toán.');
        }

        // Lấy tất cả sản phẩm trong giỏ hàng của người dùng
        $carts = Cart::with('book')->where('user_id', auth()->user()->id)->get();

        if ($carts->count() <= 0) {
            return redirect()->back()->with('error', 'Không có sản phẩm để thanh toán.');
        }

        // Tính tổng tiền giỏ hàng
        $total = 0;

        foreach ($carts as $item) {
            // Kiểm tra nếu book tồn tại, tránh lỗi null
            if ($item->book) {
                $total += $item->book->price * $item->quantity;
            }
        }

        // Trả về view cùng dữ liệu giỏ hàng và tổng tiền
        return view('user.checkout.index', compact('carts', 'total'));

    }

    public function create(Request $request)
    {
        if (!auth()->user()) {
            return redirect()->back()->with('error', 'Vui lòng đăng nhập để thanh toán.');
        }

        // Xác thực dữ liệu yêu cầu
        $validatedData = $request->validate([
            'province_text' => 'required|string',
            'district_text' => 'required|string',
            'ward_text' => 'required|string',
            'address' => 'required|string',
        ], [
            'district_text.required' => 'Quận huyện là bắt buộc',
            'province_text.required' => 'Tỉnh thành là bắt buộc',
            'ward_text.required' => 'Xã phường là bắt buộc',
            'address.required' => 'Địa chỉ là bắt buộc',
            'district_text.string' => 'Quận huyện không hợp lệ',
            'province_text.string' => 'Tỉnh thành không hợp lệ',
            'ward_text.string' => 'Xã phường không hợp lệ',
            'address.string' => 'Địa chỉ không hợp lệ',
        ]);

        // Tạo địa chỉ từ các trường thông tin
        $address = $validatedData['address'] . ', ' . $validatedData['ward_text'] . ', ' . $validatedData['district_text'] . ', ' . $validatedData['province_text'];

        // Lấy tất cả sản phẩm trong giỏ hàng của người dùng
        $carts = Cart::where('user_id', Auth::id())->get();

        // Kiểm tra nếu giỏ hàng trống
        if ($carts->isEmpty()) {
            return redirect()->route('user.cart.index')->with('error', 'Giỏ hàng của bạn đang trống!');
        }

        // Tạo một hóa đơn mới
        $order = Order::create([
            'code' => 'ORD-' . strtoupper(uniqid()), // Mã hóa đơn (ví dụ: ORD-ABC123)
            'user_id' => Auth::id(),
            'amount' => $carts->sum(function ($cart) {
                return $cart->book->price * $cart->quantity; // Tổng tiền hóa đơn
            }),
            'payment' => 'cod', // Ví dụ thanh toán cod
            'address' => $address,
            'status' => 'pending', // Trạng thái đơn hàng (ví dụ: đang chờ xử lý)
        ]);

        // Lặp qua từng sản phẩm trong giỏ hàng để tạo chi tiết đơn hàng
        foreach ($carts as $cart) {
            DetailOrder::create([
                'order_id' => $order->id,
                'book_id' => $cart->book_id,
                'quantity' => $cart->quantity,
            ]);
        }

        // Xóa các sản phẩm trong giỏ hàng sau khi tạo đơn hàng thành công
        Cart::where('user_id', Auth::id())->delete();

        // Thông báo thành công và chuyển hướng
        return redirect()->route('user.customer.index')->with('success', 'Đơn hàng của bạn đã được tạo thành công!');
    }
}
