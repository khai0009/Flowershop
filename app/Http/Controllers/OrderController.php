<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Check;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Check::where('user_id', Auth::id())
            ->whereNotNull('Status')
            ->where('Status', '!=', '')
            ->orderBy('created_at', 'asc')
            ->with(['carts.product']) // Load carts và products
            ->get();

        return view('orders.history', compact('orders'));
    }
}

?>