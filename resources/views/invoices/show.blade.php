<html>
<x-header title="Chi tiết hóa đơn" />
<body class="bg-gray-50">
    <div class="min-h-screen bg-gray-50">
        <div class="bg-white border-b">
            <div class="px-6 py-4 max-w-7xl mx-auto">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <a href="{{ route('invoices.index') }}" class="text-indigo-600 hover:text-indigo-900">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                            </svg>
                        </a>
                        <h1 class="text-xl font-semibold text-gray-900">Chi tiết hóa đơn #{{ $check->Mahd }}</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-6 py-8">
            <div class="bg-white rounded-lg shadow overflow-hidden p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Thông tin hóa đơn</h2>
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <p class="text-gray-600">Mã hóa đơn: <span class="font-semibold">{{ $check->Mahd }}</span></p>
                        <p class="text-gray-600">User ID: <span class="font-semibold">{{ $check->user_id }}</span></p>
                        <p class="text-gray-600">Ngày giao: <span class="font-semibold">{{ $check->Ngaygiao }}</span></p>
                    </div>
                    <div>
                        <p class="text-gray-600">Tổng cộng: <span class="font-semibold">{{number_format($check->Tongcong  , 0, ',', '.') . ' VND'}}</span></p>
                        <p class="text-gray-600">Phương thức thanh toán: <span class="font-semibold">{{ $check->Pttt }}</span></p>
                        <p class="text-gray-600">Ngày tạo: <span class="font-semibold">{{ $check->created_at }}</span></p>
                    </div>
                    <div>
                        <p class="text-gray-600">Địa chỉ giao: <span class="font-semibold">{{ $check->Diachi }}</span></p>
                    </div>
                </div>

                <h2 class="text-lg font-semibold text-gray-900 mb-4">Chi tiết đơn hàng</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tên sản phẩm</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Giá</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Số lượng</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tổng giá</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($carts as $cart)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $cart->product->tenhoa ?? 'N/A' }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ number_format($cart->price  , 0, ',', '.') . ' VND'}}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $cart->quantilylocal }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ number_format($cart->price * $cart->quantilylocal  , 0, ',', '.') . ' VND'}}</div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap" colspan="4">
                                        <div class="text-center text-gray-500">Không có sản phẩm nào trong hóa đơn này.</div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>