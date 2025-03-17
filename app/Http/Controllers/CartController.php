<?php namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\product;
use App\Models\Check;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CartController extends Controller
{   
    protected function getOrCreateCheck()
{
    $Check = Check::where('user_id', Auth::id())
        ->where('Thanhtoan', 0)
        ->first();

    if (!$Check) {
        $Check = Check::create([
            'user_id' => Auth::id(),
            'Thanhtoan' => 0,
        ]);
    }

    return $Check;
}
    public function Checkcart(Request $request)
    {
        if (Auth::check()) {
            $Check = Check::where('user_id', Auth::id())
                ->where('Thanhtoan', 0)
                ->first();
    
            if (!$Check) {
                return view('Shopping.empty'); // Chuyển sang empty nếu chưa có Mahd
            }
    
            $cartItems = Cart::where('user_id', Auth::id())
                ->where('cart_id', $Check->Mahd)
                ->with('product')
                ->get();
            
            return view('Shopping.cart', compact('cartItems', 'Check'));
        } else {
            return view('Shopping.empty'); // Chuyển sang empty nếu chưa đăng nhập
        }
    }

    public function addToCart(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['message' => 'Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng.'], 401);
        }
    
        $Check = $this->getOrCreateCheck();
    
        // Kiểm tra sản phẩm đã tồn tại trong giỏ hàng chưa
        $existingCartItem = Cart::where([
            ['user_id', Auth::id()],
            ['product_id', $request->input('product_id')],
            ['cart_id', $Check->Mahd]
        ])->lockForUpdate()->first(); // Khóa bản ghi để tránh race condition
    
        if ($existingCartItem) {
            // Tăng số lượng sản phẩm
            $existingCartItem->quantilylocal += 1;
            $existingCartItem->save();
        } else {
            // Tạo sản phẩm mới trong giỏ hàng
            try {
                Cart::create([
                    'user_id' => Auth::id(),
                    'cart_id' => $Check->Mahd,
                    'product_id' => $request->input('product_id'),
                    'price' => $request->input('product_price'),
                    'quantilylocal' => 1,
                ]);
            } catch (\Exception $e) {
                return redirect()->route("index")->with('error', 'Không thể thêm sản phẩm vào giỏ hàng.');
            }
        }
    
        return redirect()->route("index")->with('success', 'Sản phẩm đã được thêm vào giỏ hàng.');
    }
    
    public function buyNow(Request $request)
    {
        if (Auth::check()) {
            $Check = $this->getOrCreateCheck();

            Cart::create([
                
                'user_id' => Auth::id(),
                'cart_id'  => $Check->Mahd,
                'product_id' => $request->input('product_id'),
                'price'=> $request->input('product_price'),
                'quantilylocal' => 1,
            ]);

            return redirect()->route('cart'); // Chuyển sang shopping.cart
        } else {
            return redirect()->route('login');
        }
    }

    public function updateQuantity(Request $request)
    {   
        $Check = Check::where('user_id', Auth::id())
        ->where('Thanhtoan', 0)
        ->first();

    if (!$Check) {
        return redirect()->route('cart')->with('error', 'Không tìm thấy giỏ hàng.');
    }
    $cartItem = Cart::where([
        ['user_id', Auth::id()],
        ['product_id', $request->input('product_id')],
        ['cart_id', $Check->Mahd]
    ])->first();
    
    if ($cartItem) {
        $cartItem->update(['quantilylocal' => $request->input('quantilylocal')]);
    }
    

        return redirect()->route('cart')->with('error', 'Không tìm thấy sản phẩm trong giỏ hàng.');
    }

    public function removeFromCart(Request $request)
    {   
        
        $Check = Check::where('user_id', Auth::id())
        ->where('Thanhtoan', 0)
        ->first();

    if (!$Check) {
        return redirect()->route('cart')->with('error', 'Không tìm thấy giỏ hàng.');
    }
    $cartItem = Cart::where([
        ['user_id', Auth::id()],
        ['product_id', $request->input('product_id')],
        ['cart_id', $Check->Mahd]
    ])->first();
    
    if ($cartItem) {
        $cartItem->delete(); // Xóa đúng 1 sản phẩm
    }

            $remainingItems = Cart::where('cart_id', $Check->Mahd)->count();
            if ($remainingItems == 0) {
                $Check->delete();
            }

        return redirect()->route('cart'); 
    

    
    }
    public function qr($totalPrice,$orderid){
        $momoInfo = [
            'acId' => env('MOMO_ACCOUNTID'), // Thay thế bằng ID tài khoản MoMo của bạn
            'acName' => env('MOMO_ACCOUNTNAME'), // Thay thế bằng tên tài khoản MoMo của bạn
            'amount' => $totalPrice,
            'memo' => 'Thanh toan don hang #' . $orderid,
        ];

        $momoUrl = 'momo://qr?data=' . urlencode(json_encode($momoInfo));

        $qrCode = QrCode::size(200)->generate($momoUrl);

        // Hiển thị mã QR cho người dùng
        return view('Shopping.momo_qr', [
            'qrCode' => $qrCode,
            'totalPrice' => $totalPrice,
            'orderId' => $orderid,
        ]);
    }
    public function checkout(Request $request)
{   
   
    $Check = Check::where('user_id', Auth::id())
                ->where('Thanhtoan', 0)
                ->first();
                
                
                
    $user = Auth::user();
  
    $cart = cart::where('user_id', $user->id)->where('cart_id', $Check->Mahd)
        ->get();
        foreach ($cart as $cartItem) {
            $product = Product::find($cartItem->product_id);
           
            if ($product->soluong < $cartItem->quantilylocal) {
                return redirect()->route('cart')->with('error', 'Số lượng sản phẩm ' . $product->name . ' không đủ hoặc không khả dụng. Vui lòng kiểm tra lại giỏ hàng của bạn.');
            }
        }
    
    $totalPrice = $cart->sum(fn($item) => $item->price * $item->quantilylocal);

        
    // Xác định địa chỉ giao hàng đầy đủ
    
    $checkoutAddress = match ($request->input('deliveryMethod')) {
        'tại nhà' => $user->phuongxa . ', ' . $user->quanhuyen . ', ' . $user->selectedCity,
        'tại cửa hàng' => 'Phường MNL, Quận XYZ, TP.HCM',
        default =>$request->input('address') .','. $request->input('ward') . ', ' . $request->input('selectedDistrict') . ', ' . $request->input('selectedCity')
    };
   
    if ($request->input('paymentMethod') === 'chuyển khoản') {
        return $this->qr($totalPrice, $Check->Mahd);
    }
    else {
        Check::where('Mahd', $Check->Mahd)
            ->where('user_id', $user->id)
            ->where('Thanhtoan',0)
            ->update([
                'Thanhtoan' => 1, // 0: chưa thanh toán, 1: đã thanh toán
                'Tongcong' => $totalPrice,
                'Pttt' => $request->input('paymentMethod'),
                'Diachi' => $checkoutAddress,
                'Ngaygiao' => Carbon::parse($request->input('deliveryTime')),
                'updated_at' => now(), // Cập nhật updated_at
            ]);
        foreach ($cart as $cartItem) {
            $product = Product::find($cartItem->product_id);
            $product->soluong -= $cartItem->quantilylocal;
            $product->save();
        }
    }

 

    return redirect()->route('index')->with('success', 'Thanh toán thành công!');

}

}?>