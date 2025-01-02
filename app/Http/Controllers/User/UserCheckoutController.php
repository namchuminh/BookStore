<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Book;
use App\Models\Order;
use App\Models\DetailOrder;
use Illuminate\Support\Facades\Auth;

class UserCheckoutController extends Controller
{
    public function index(Request $request)
    {
        if (!auth()->user()) {
            return redirect()->back()->with('error', 'Vui lòng đăng nhập để thanh toán.');
        }

        if($request->query('resultCode') == "0"){
            $carts = Cart::where('user_id', Auth::id())->get();

            $sale = 0;

            if($request->session()->has('pont')){
                $sale = $request->session()->get('pont');
                $request->session()->forget('pont');
            }

            // Tạo một hóa đơn mới
            $order = Order::create([
                'code' => 'ORD-' . strtoupper(uniqid()), // Mã hóa đơn (ví dụ: ORD-ABC123)
                'user_id' => Auth::id(),
                'amount' => $carts->sum(function ($cart) {
                    return $cart->book->price * $cart->quantity; // Tổng tiền hóa đơn
                }),
                'sale' => $sale,
                'payment' => 'bank', // Ví dụ thanh toán cod
                'address' => $request->query('address'),
                'status' => 'pending', // Trạng thái đơn hàng (ví dụ: đang chờ xử lý)
            ]);

            $pontIncrease = $order->amount / 100;

            $user = Auth::user();

            $user->pont += $pontIncrease;

            $user->save();

            // Lặp qua từng sản phẩm trong giỏ hàng để tạo chi tiết đơn hàng
            foreach ($carts as $cart) {
                DetailOrder::create([
                    'order_id' => $order->id,
                    'book_id' => $cart->book_id,
                    'quantity' => $cart->quantity,
                ]);

                // Trừ số lượng trong bảng Book
                $book = Book::find($cart->book_id);
                if ($book) {
                    // Kiểm tra nếu số lượng đủ để trừ
                    if ($book->quantity >= $cart->quantity) {
                        $book->decrement('quantity', $cart->quantity); // Trừ trực tiếp
                    }
                }
            }

            // Xóa các sản phẩm trong giỏ hàng sau khi tạo đơn hàng thành công
            Cart::where('user_id', Auth::id())->delete();

            // Thông báo thành công và chuyển hướng
            return redirect()->route('user.customer.index')->with('success', 'Đơn hàng của bạn đã được tạo thành công!');
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

    private function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }

    private function paymentMomo($amount, $address){
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo";
        $orderId = time() ."";
        $redirectUrl = route('user.checkout.index', ['address' => $address]);
        $ipnUrl = "https://webhook.site/b3088a6a-2d17-4f8d-a383-71389a6c600b";
        $extraData = "";


        if (!empty($_POST)) {
            $requestId = time() . "";
            $requestType = "payWithATM";
            //before sign HMAC SHA256 signature
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $secretKey);
            $data = array('partnerCode' => $partnerCode,
                'partnerName' => "Test",
                "storeId" => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature);
            $result = $this->execPostRequest($endpoint, json_encode($data));
            $jsonResult = json_decode($result, true);  // decode json

            //Just a example, please check more in there

            header('Location: ' . $jsonResult['payUrl']);
        }
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
            'payment' => 'required'
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

        if($validatedData['payment'] == "bank"){
            $amount = $carts->sum(function ($cart) {
                return $cart->book->price * $cart->quantity; // Tổng tiền hóa đơn
            });
            $this->paymentMomo($amount, $address);
            die();
        }

        $sale = 0;

        if($request->session()->has('pont')){
            $sale = $request->session()->get('pont');
            $request->session()->forget('pont');
        }

        // Tạo một hóa đơn mới
        $order = Order::create([
            'code' => 'ORD-' . strtoupper(uniqid()), // Mã hóa đơn (ví dụ: ORD-ABC123)
            'user_id' => Auth::id(),
            'amount' => $carts->sum(function ($cart) {
                return $cart->book->price * $cart->quantity; // Tổng tiền hóa đơn
            }),
            'payment' => 'cod', // Ví dụ thanh toán cod
            'sale' => $sale,
            'address' => $address,
            'status' => 'pending', // Trạng thái đơn hàng (ví dụ: đang chờ xử lý)
        ]);

        $pontIncrease = $order->amount / 100;

        $user = Auth::user();

        $user->pont += $pontIncrease;

        $user->save();

        // Lặp qua từng sản phẩm trong giỏ hàng để tạo chi tiết đơn hàng
        foreach ($carts as $cart) {
            DetailOrder::create([
                'order_id' => $order->id,
                'book_id' => $cart->book_id,
                'quantity' => $cart->quantity,
            ]);

            // Trừ số lượng trong bảng Book
            $book = Book::find($cart->book_id);
            if ($book) {
                // Kiểm tra nếu số lượng đủ để trừ
                if ($book->quantity >= $cart->quantity) {
                    $book->decrement('quantity', $cart->quantity); // Trừ trực tiếp
                }
            }
        }

        // Xóa các sản phẩm trong giỏ hàng sau khi tạo đơn hàng thành công
        Cart::where('user_id', Auth::id())->delete();

        // Thông báo thành công và chuyển hướng
        return redirect()->route('user.customer.index')->with('success', 'Đơn hàng của bạn đã được tạo thành công!');
    }
}
