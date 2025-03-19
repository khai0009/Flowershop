<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Check;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    // ... (index method remains the same)
    public function index(Request $request)
{
    $query = Check::query(); // Truy vấn hóa đơn
    $search = '';
    // Tìm kiếm theo mã hóa đơn hoặc số điện thoại khách hàng
    if ($request->has('search')) {
        $search = $request->input('search');
        $query->where(function ($q) use ($search) {
            $q->where('Mahd', 'like', '%' . $search . '%') // Tìm theo Mã HĐ
                ->orWhereHas('user', function ($userQuery) use ($search) {
                    $userQuery->where('sdt', 'like', '%' . $search . '%'); // Tìm theo số điện thoại
                });
        });
    }

    // Lấy danh sách hóa đơn theo trạng thái
    $pendingInvoices = (clone $query)->where('Status', 'Đang chờ xét')->latest()->paginate(10, ['*'], 'pending_page');
    $approvedInvoices = (clone $query)->where('Status', 'Đã duyệt')->latest()->paginate(10, ['*'], 'approved_page');
    $canceledInvoices = (clone $query)->where('Status', 'Hủy')->latest()->paginate(10, ['*'], 'canceled_page');

    return view('invoices.index', compact('pendingInvoices', 'approvedInvoices', 'canceledInvoices', 'search'));
}

    
    /**
     * Display the details of a specific invoice.
     *
     * @param  int  $mahd // Assuming 'Mahd' is the invoice ID
     * @return \Illuminate\View\View
     */
    public function show(int $mahd)
    {
        // Find the check based on Mahd
        $check = Check::findOrFail($mahd);

        // Retrieve the cart items associated with this invoice
        // Assuming 'Mahd' from checks corresponds to 'cart_id' in carts.
        $carts = Cart::where('cart_id', $mahd)
            ->with('product') // Eager load product details
            ->get();

        return view('invoices.show', compact('check', 'carts'));
    }
    public function editStatus($id)
{
    $invoice = Check::findOrFail($id);
    return view('invoices.edit-status', compact('invoice'));
}

public function updateStatus(Request $request, $id)
{
    $invoice = Check::findOrFail($id);
    $newStatus = $request->input('status');
    if ($newStatus === 'Đã duyệt') {
        $carts = Cart::where('cart_id', $id)->get();
        $outOfStock = [];   

        foreach ($carts as $cart) {
            $product = Product::find($cart->product_id);
            if ($product) {
                // Kiểm tra nếu số lượng sản phẩm không đủ
                if ($cart->quantilylocal > $product->soluong) {
                    $outOfStock[] = "Không đủ số lượng sản phẩm: $product->tenhoa (ID: $product->id)";
                }
            }
        }

        // Nếu có sản phẩm không đủ số lượng, trả về trang cập nhật với alert
        if (!empty($outOfStock)) {
            return redirect()->route('invoices.editStatus', $id)
                ->with('error', implode('<br>', $outOfStock));
        }
        
        // Nếu đủ số lượng, tiến hành cập nhật số lượng sản phẩm
        foreach ($carts as $cart) {
            $product = Product::find($cart->product_id);
            if ($product) {
                $product->soluong -= $cart->quantilylocal;
                $product->save();
            }
        }
    }

    // Cập nhật trạng thái hóa đơn
    $invoice->Status = $newStatus;
    $invoice->save();

    return redirect()->route('invoices.index')->with('success', 'Cập nhật trạng thái thành công!');

  
}
public function editPayment($id)
{
    $invoice = Check::findOrFail($id);
    return view('invoices.edit-payment', compact('invoice'));
}

public function updatePayment(Request $request, $id)
{
    $invoice = Check::findOrFail($id);
    
    // Đảm bảo chỉ nhận giá trị 0 hoặc 1
    $thanhtoan = $request->input('thanhtoan');
    if (!in_array($thanhtoan, [0, 1])) {
        return redirect()->back()->with('error', 'Giá trị không hợp lệ.');
    }

    $invoice->Thanhtoan = (bool) $thanhtoan;
    $invoice->save();

    return redirect()->route('invoices.index')->with('success', 'Cập nhật trạng thái thanh toán thành công!');
}


    // ... (removed store, update, destroy methods)
}