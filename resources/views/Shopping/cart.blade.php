<html lang="vn">
    <x-header title="Giỏ hàng"/>
    <body>
    <div class="flex justify-center p-1">
    <div class="h-full p-4 w-full">
        <h1 class="text-3xl font-bold mb-6 text-pink-600 z-1">Giỏ hàng</h1>
        <a href="/" class="bg-pink-200 hover:bg-pink-300 text-pink-700 px-4 py-2 rounded-md inline-block mb-5">
            Tiếp tục mua sắm
        </a>
        <div class="flex flex-col lg:flex-row">
            <div class="overflow-x-auto w-full lg:w-[70%] overflow-y-auto">
                <table class="min-w-full border border-pink-200 rounded-lg shadow-md">
                    <thead>
                        <tr class="bg-pink-100">
                            <th class="py-3 px-4 border-b text-left"></th>
                            <th class="py-3 px-4 border-b text-left">Tên sản phẩm</th>
                            <th class="py-3 px-4 border-b text-left">Số lượng</th>
                            <th class="py-3 px-4 border-b text-left">Thành tiền</th>
                            <th class="py-3 px-4 border-b text-left"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartItems as $item)
                            <tr class="border-b border-pink-200 hover:bg-pink-50 transition-colors duration-200">
                                <td class="py-4 px-4 w-20">
                                    <div class="w-20 h-24 rounded-md overflow-hidden shadow-md">
                                        @if ($item->product && $item->product->hinhanh)
                                        <img src="{{ resizeImage($item->product->hinhanh, 175, 300) }}" class="object-cover w-full h-full" alt="<?php echo $item->product->tenhoa?>">
                                        @else
                                            Không có hình ảnh
                                        @endif
                                    </div>
                                </td>
                                <td class="py-4 px-4">{{ $item->product->tenhoa }}</td>
                                <td class="py-4 px-4 w-fit">
                                    <form action="{{ route('update.quantity') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $item->product->id }}">
                                        <input type="number" name="quantilylocal" value="{{ $item->quantilylocal }}" class="w-16 border rounded p-2 border-pink-300 focus:ring-pink-500" min="1">
                                        <button type="submit" class="hidden"></button>
                                    </form> x {{ $item->product->gia }}
                                </td>
                                <td class="py-4 px-4 text-center w-fit">{{ $item->product->gia * $item->quantilylocal }}</td>
                                <td class="py-4 px-4">
                                    <form action="{{ route('remove.from.cart') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="product_id" value="{{ $item->product->id }}">
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md shadow-md transition-colors duration-200">
                                            Xóa
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="bg-white border-2 border-pink-50 lg:w-[30%] w-full">
            @include('Shopping.orderForm')
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/address.js') }}" defer></script>
    </body>
</html>