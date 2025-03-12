@extends('layouts.app')

@section('title', 'Chi tiết sản phẩm')

@section('content')

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 mt-5">
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="md:flex">
            <div class="md:w-1/2">
                <img src="<?php echo resizeImage($sanPham->hinhanh, 400, 700); ?>" alt="<?php echo $sanPham->tenhoa; ?>">
            </div>

            <div class="md:w-1/2 p-6">
                <h1 class="text-5xl font-bold text-gray-900 mb-2">
                    <?php echo $sanPham->tenhoa; ?>
                </h1>
                <p class="text-gray-600 mb-4"><?php echo $sanPham->mieuta; ?></p>

                <div class="mb-4">
                    <span class="text-5xl font-semibold text-green-600">
                        <?php echo $sanPham->gia; ?> VND
                    </span>
                    <p class="text-sm text-gray-500">
                        <?php echo ($sanPham->soluong > 0) ? 'In Stock' : 'Out of Stock'; ?>
                        <?php if ($sanPham->soluong > 0) { echo ' (' . $sanPham->soluong . ' available)'; } ?>
                    </p>
                </div>

                <button
                    class="w-full py-3 px-4 rounded-md text-white font-semibold <?php echo ($sanPham->soluong > 0) ? 'bg-pink-600 hover:bg-pink-700' : 'bg-gray-400 cursor-not-allowed'; ?>"
                    <?php echo ($sanPham->soluong === 0) ? 'disabled' : ''; ?>
                >
                    <?php echo ($sanPham->soluong > 0) ? 'Thêm vào giỏ' : 'Hết hàng'; ?>
                </button>
            </div>
        </div>
    </div>

    <button
        onclick="history.back()"
        class="mt-6 inline-flex items-center px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50"
    >
        Quay lại
    </button>
</div>
@endsection