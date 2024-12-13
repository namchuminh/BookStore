<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Book;

class UserCartController extends Controller
{
    public function index(){
        if(!auth()->user()){
            return redirect()->back()->with('error', 'Vui lòng đăng nhập để xem giỏ hàng.');
        }

        // Lấy tất cả sản phẩm trong giỏ hàng của người dùng
        $carts = Cart::with('book')->where('user_id', auth()->user()->id)->get();

        // Tính tổng tiền giỏ hàng
        $total = 0;

        foreach ($carts as $item) {
            // Kiểm tra nếu book tồn tại, tránh lỗi null
            if ($item->book) {
                $total += $item->book->price * $item->quantity;
            }
        }

        // Trả về view cùng dữ liệu giỏ hàng và tổng tiền
        return view('user.cart.index', compact('carts', 'total'));
    }

    public function add(Request $request)
    {
        if(!auth()->user()){
            return redirect()->back()->with('error', 'Vui lòng đăng nhập để thêm sản phẩm.');
        }

        // Xác thực dữ liệu đầu vào
        $request->validate([
            'qty' => 'required|integer|min:1',
            'bookId' => 'required|exists:books,id',
        ]);

        // Lấy thông tin từ request
        $userId = auth()->user()->id;
        $bookId = $request->input('bookId');
        $quantity = $request->input('qty');

        // Kiểm tra số lượng sách còn lại trong kho
        $book = Book::findOrFail($bookId);
        if ($quantity > $book->quantity) {
            // Trả về redirect kèm thông báo lỗi
            return redirect()->back()->with('error', 'Số lượng yêu cầu vượt quá số lượng còn lại.');
        }

        // Tìm sản phẩm trong giỏ hàng của user (nếu đã tồn tại)
        $cartItem = Cart::where('user_id', $userId)->where('book_id', $bookId)->first();

        if ($cartItem) {
            // Nếu đã có trong giỏ hàng, cập nhật số lượng
            $newQuantity = $cartItem->quantity + $quantity;

            if ($newQuantity > $book->quantity) {
                return redirect()->back()->with('error', 'Số lượng yêu cầu vượt quá số lượng còn lại.');
            }

            $cartItem->update(['quantity' => $newQuantity]);
        } else {
            // Nếu chưa có, thêm mới
            Cart::create([
                'user_id' => $userId,
                'book_id' => $bookId,
                'quantity' => $quantity,
            ]);
        }

        // Trả về redirect kèm thông báo thành công
        return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng.');
    }

    public function update($id, Request $request)
    {
        $cartItem = Cart::findOrFail($id);
        if ($cartItem->user_id != auth()->user()->id) {
            return redirect()->route('user.cart.index')->with('error', 'Sản phẩm không tồn tại trong giỏ hàng.');
        }

        $action = $request->input('action');
        $quantity = $request->input('quantity');

        if ($action === 'decrease' && $cartItem->quantity > 1) {
            $cartItem->quantity -= 1; // Giảm số lượng
        } elseif ($action === 'increase' && $cartItem->quantity < $cartItem->book->quantity) {
            $cartItem->quantity += 1; // Tăng số lượng
        } else {
            $cartItem->quantity = $quantity; // Cập nhật số lượng mới nếu có
        }

        $cartItem->save();

        return redirect()->route('user.cart.index')->with('success', 'Giỏ hàng đã được cập nhật.');
    }

    public function destroy($id){
        if(!auth()->user()){
            return redirect()->back()->with('error', 'Vui lòng đăng nhập để xóa sản phẩm.');
        }

        // Tìm sản phẩm trong giỏ hàng theo id
        $cartItem = Cart::where('id', $id)->where('user_id', auth()->user()->id)->first();

        if ($cartItem) {
            // Nếu tìm thấy, xóa sản phẩm
            $cartItem->delete();

            // Trả về thông báo thành công
            return redirect()->route('user.cart.index')->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng.');
        } else {
            // Nếu không tìm thấy sản phẩm trong giỏ hàng của người dùng
            return redirect()->route('user.cart.index')->with('error', 'Sản phẩm không tồn tại trong giỏ hàng.');
        }
    }
}
