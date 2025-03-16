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
        $query = Check::query()
            ->where('Thanhtoan', 1); // Only show paid invoices

        // Search by customer phone number
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('Mahd', 'like', '%' . $search . '%') // Search by invoice ID
                    ->orWhereHas('user', function ($userQuery) use ($search) {
                        $userQuery->where('sdt', 'like', '%' . $search . '%'); // Search by customer phone
                    });
            });
        }

        $invoices = $query->latest()->paginate(10); // You can adjust the pagination as needed

        return view('invoices.index', compact('invoices'));
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

    // ... (removed store, update, destroy methods)
}