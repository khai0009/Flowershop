<?php

namespace App\View\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartComposer
{
    public function compose(View $view)
    {
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if (Auth::check()) {
            // Lấy ID người dùng
            $userId = Auth::id();

            // 1. Lấy danh sách Mahd (user ID) có Thanhtoan = 0
            $checks = DB::table('checks')
                ->where('user_id',$userId)
                ->where('Thanhtoan', 0)
                ->pluck('Mahd'); // Lấy danh sách Mahd

            if ($checks->isNotEmpty()) {
                // 2. Lấy danh sách carts dựa trên Mahd
                $carts = DB::table('carts')
                    ->whereIn('cart_id', $checks)
                    ->get();

                // 3. Tính tổng productlocal và tổng tiền
                $totalItems = $carts->sum('quantilylocal');
                $totalPrice = $carts->sum(function ($cart) {
                    return $cart->quantilylocal * $cart->price;
                });
            } else {
                // Nếu không có Mahd nào thỏa mãn, gán giá trị mặc định
                $totalItems = 0;
                $totalPrice = 0;
            }
        } else {
            // Nếu người dùng chưa đăng nhập, gán giá trị mặc định
            $totalItems = 0;
            $totalPrice = 0;
        }

        $view->with('totalItems', $totalItems);
        $view->with('totalPrice', $totalPrice);
    }
}