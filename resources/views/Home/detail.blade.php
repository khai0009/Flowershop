@extends('layouts.app')

@section('title', 'Chi tiết sản phẩm')

@section('content')
<div class="min-h-screen bg-gray-50 p-4 md:p-8">
    <div class="max-w-7xl mx-auto">
    <a
        href="/"
        class="mt-6 inline-flex items-center px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50"
    >
        Quay lại
</a>
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="grid md:grid-cols-2 gap-8 p-6 md:p-8">
                <div class="relative group">
                     <img src="{{ resizeImage($sanPham->hinhanh, 275, 400) }}"
                        alt="<?php echo $sanPham->tenhoa; ?>"
                        class="w-full h-[500px] object-cover rounded-lg"
                    />
                    <button class="absolute top-4 right-4 p-2 bg-white rounded-full shadow-md opacity-0 group-hover:opacity-100 transition-opacity">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="15 3 21 3 21 9"></polyline>
                            <polyline points="9 21 3 21 3 15"></polyline>
                            <line x1="21" y1="3" x2="14" y2="10"></line>
                            <line x1="3" y1="21" x2="10" y2="14"></line>
                        </svg>
                    </button>
                </div>

                <div class="space-y-6">
                    <div class="space-y-2">
                        <h1 class="text-3xl font-bold text-gray-900"><?php echo $sanPham->tenhoa; ?></h1>
                        <div class="flex items-center gap-2">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium <?php echo ($sanPham->soluong > 0) ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 mr-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                                <?php echo ($sanPham->soluong > 0) ? 'Còn hàng' : 'Hết hàng'; ?>
                                <?php if ($sanPham->soluong > 0) { echo ' (' . $sanPham->soluong . ' sản phẩm)'; } ?>
                            </span>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <div class="flex items-baseline gap-4">
                            <span class="text-3xl font-bold text-pink-500"><?php echo number_format($sanPham->gia, 0, ',', '.') ?> VND</span>
                        </div>
                    </div>

                    <p class="text-gray-600 min-h-60 "><?php echo $sanPham->mieuta; ?></p>

                    <div class="space-y-4">
                        <form method="post" action="{{ route('buy.now') }}">
                            @csrf
                            <button class="w-full py-3 px-4 rounded-md text-white font-semibold bg-pink-700 hover:bg-pink-800 <?php echo ($sanPham->soluong === 0) ? 'opacity-50 cursor-not-allowed' : ''; ?>" type="submit" <?php echo ($sanPham->soluong === 0) ? 'disabled' : ''; ?>>
                                Mua ngay
                            </button>
                            <input type="hidden" name="product_id" value="{{ $sanPham->id }}">
                            <input type="hidden" name="product_price" value="{{ $sanPham->gia }}">
                            <input type="hidden" name="quantity" value="1"> {{-- Mặc định mua 1 sản phẩm khi mua ngay --}}
                        </form>
                        <form method="post" action="{{ route('add.to.cart') }}">
                            @csrf
                            <button class="w-full py-3 px-4 rounded-md text-white font-semibold bg-black hover:bg-gray-600 <?php echo ($sanPham->soluong === 0) ? 'opacity-50 cursor-not-allowed' : ''; ?>" type="submit" <?php echo ($sanPham->soluong === 0) ? 'disabled' : ''; ?>>
                                Thêm vào giỏ hàng
                            </button>
                            <input type="hidden" name="product_id" value="{{ $sanPham->id }}">
                            <input type="hidden" name="product_price" value="{{ $sanPham->gia }}">
                            <input type="hidden" name="quantity" x-ref="quantity" value="1"> {{-- Giá trị quantity sẽ được cập nhật bởi script --}}
                        </form>
                    </div>

                    {{-- Bạn có thể thêm các thông tin khác nếu cần --}}
                </div>
            </div>
        </div>
    </div>

    
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const quantityInput = document.querySelector('input[name="quantity"][x-ref="quantity"]');
        const quantityRef = document.querySelector('input[x-ref="quantity"]');

        // Hàm cập nhật giá trị quantity cho form "Thêm vào giỏ hàng"
        function updateAddToCartQuantity() {
            if (quantityInput && quantityRef) {
                quantityInput.value = quantityRef.value;
            }
        }

        // Lắng nghe sự kiện thay đổi số lượng
        const quantityIncrementButton = document.querySelector('.space-y-2 > .flex > button:nth-child(3)');
        const quantityDecrementButton = document.querySelector('.space-y-2 > .flex > button:nth-child(1)');

        if (quantityIncrementButton) {
            quantityIncrementButton.addEventListener('click', updateAddToCartQuantity);
        }
        if (quantityDecrementButton) {
            quantityDecrementButton.addEventListener('click', updateAddToCartQuantity);
        }
        if (quantityRef) {
            quantityRef.addEventListener('change', updateAddToCartQuantity);
        }
    });
</script>
@endsection