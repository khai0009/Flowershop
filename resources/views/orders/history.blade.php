@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
<a href="{{ route('profile') }}" 
   class="mb-4 inline-block bg-gray-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-gray-600 transition">
   ⬅ Quay lại trang cá nhân
</a>
    <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">Lịch sử mua hàng</h2>
    <div class="bg-white shadow-xl rounded-lg p-6">
        <table class="w-full border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 p-3 text-left">Mã HĐ</th>
                    <th class="border border-gray-300 p-3 text-left">Thanh toán</th>
                    <th class="border border-gray-300 p-3 text-left">Trạng thái</th>
                    <th class="border border-gray-300 p-3 text-left">Tổng cộng</th>
                    <th class="border border-gray-300 p-3 text-left">Địa chỉ</th>
                    <th class="border border-gray-300 p-3 text-left">Ngày giao</th>
                    <th class="border border-gray-300 p-3 text-left">PTTT</th>
                    <th class="border border-gray-300 p-3 text-left">Chi tiết</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr class="border border-gray-200">
                    <td class="p-3">{{ $order->Mahd }}</td>
                    <td>
                    <div class="p-3 font-semibold text-white 
    @if ($order->Thanhtoan == 1) bg-green-500 @else bg-red-500 @endif 
    px-3 py-1 rounded-lg flex items-center justify-center">
    @if ($order->Thanhtoan == 1)
        <i class="fas fa-check-circle mr-2"></i> Đã thanh toán
    @else
        <i class="fas fa-times-circle mr-2"></i> Chưa thanh toán
    @endif
</div>
                    </td>
<td><div class="p-3 font-semibold px-3 py-1 rounded-lg flex items-center justify-center
    @if ($order->Status === 'Đang chờ xét') bg-yellow-100 border border-yellow-500 text-yellow-700
    @elseif ($order->Status === 'Đã duyệt') bg-green-100 border border-green-500 text-green-700
    @else bg-red-100 border border-red-500 text-red-700 @endif">
    @if ($order->Status === 'Đang chờ xét')
        <i class="fas fa-clock mr-2 text-yellow-700"></i> <span class="text-yellow-700">Đang chờ xét</span>
    @elseif ($order->Status === 'Đã duyệt')
        <i class="fas fa-check-circle mr-2 text-green-700"></i> <span class="text-green-700">Đã duyệt</span>
    @else
        <i class="fas fa-times-circle mr-2 text-red-700"></i> <span class="text-red-700">Đã hủy</span>
    @endif
</div></td>


                    <td class="p-3">{{ number_format($order->Tongcong, 0, ',', '.') }} VNĐ</td>
                    <td class="p-3">{{ $order->Diachi }}</td>
                    <td class="p-3">{{ \Carbon\Carbon::parse($order->Ngaygiao)->format('d/m/Y') }}</td>

                    <td class="p-3">{{ $order->Pttt }}</td>
                    <td class="p-3 text-center">
                        <button onclick="toggleCart('{{ $order->Mahd }}')" 
                            class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-600 transition">
                            Xem
                        </button>
                    </td>
                </tr>
                <tr id="cart-{{ $order->Mahd }}" class="hidden">
                    <td colspan="8" class="p-3 bg-gray-50">
                        <ul>
                            @foreach ($order->carts ?? [] as $cart)
                            <li class="border-b p-2 flex justify-between">
                                <div class="flex items-center">
                                <img src="{{ resizeImage($cart->product->hinhanh ?? '/default-image.jpg', 175, 300) }}" 
     class="object-cover w-16 h-24 rounded-lg mr-2" 
     alt="{{ $cart->product->tenhoa ?? 'Sản phẩm không tồn tại' }}">    
                                    <span>
                                        {{ optional($cart->product)->tenhoa ?? 'Sản phẩm không tồn tại' }} 
                                        (x{{ $cart->quantilylocal }})
                                    </span>
                                </div>
                                <span>
                                    {{ number_format(($cart->price ?? 0) * ($cart->quantilylocal ?? 1), 0, ',', '.') }} VNĐ
                                </span>
                            </li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    function toggleCart(mahd) {
        let row = document.getElementById('cart-' + mahd);
        row.classList.toggle('hidden');
    }
</script>
@endsection
