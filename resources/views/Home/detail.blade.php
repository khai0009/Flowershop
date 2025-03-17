@extends('layouts.app')

@section('title', 'Chi tiết sản phẩm')

@section('content')
<div class="min-h-screen bg-gray-50 p-4 md:p-8">
    <div class="max-w-7xl mx-auto">
    <a
    href="/"
    class="mt-6 inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold text-pink-700 bg-pink-100 hover:bg-pink-200 shadow-md transition duration-300 ease-in-out"
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
<div class="bg-gray-100 text-gray-800 font-sans my-5">
    <!-- Header -->
    <div class="bg-pink-500 text-white text-center py-4">
        <h1 class="text-xl font-bold">Đánh giá & Nhận xét - Sản phẩm Hoa</h1>
    </div>

    <div class="max-w-5xl mx-auto flex flex-col md:flex-row gap-6 mt-6">
        <!-- Average Rating Section -->
        <aside class="bg-white p-6 rounded-lg shadow-md w-full md:w-1/3 text-center">
            <h2 class="text-lg font-semibold text-pink-500">Đánh giá trung bình</h2>
            <div class="mt-4 text-yellow-500">
                <span class="text-6xl font-bold">4.4</span>
                <span class="text-xl">/5.0</span>
            </div>
            <div class="text-yellow-500 text-3xl mt-2">
                ⭐⭐⭐⭐☆
            </div>
            <p class="text-gray-600 mt-2">Dựa trên 10 đánh giá</p>
        </aside>

        <!-- Reviews Section -->
        <main class="bg-white p-4 rounded-lg shadow-md flex-1">
            <!-- Review List -->
            <div class="h-96 overflow-y-scroll">
                <div class="border-b pb-4 mb-4">
                    <div class="flex justify-between items-center">
                        <strong class="text-lg">Nguyễn Văn A</strong>
                        <span class="text-yellow-500">⭐⭐⭐⭐⭐</span>
                    </div>
                    <p class="mt-2">Hoa tươi và đẹp, mùi thơm dễ chịu. Tôi rất hài lòng!</p>
                </div>
                <div class="border-b pb-4 mb-4">
                    <div class="flex justify-between items-center">
                        <strong class="text-lg">Lê Thị B</strong>
                        <span class="text-yellow-500">⭐⭐⭐⭐☆</span>
                    </div>
                    <p class="mt-2">Hoa khá đẹp nhưng giao hàng hơi chậm.</p>
                </div>
                <div class="border-b pb-4 mb-4">
                    <div class="flex justify-between items-center">
                        <strong class="text-lg">Trần Văn C</strong>
                        <span class="text-yellow-500">⭐⭐⭐☆☆</span>
                    </div>
                    <p class="mt-2">Chất lượng trung bình, không như mong đợi.</p>
                </div>
                <!-- Additional Sample Reviews -->
                <div class="border-b pb-4 mb-4">
                    <div class="flex justify-between items-center">
                        <strong class="text-lg">Phạm Thị D</strong>
                        <span class="text-yellow-500">⭐⭐⭐⭐⭐</span>
                    </div>
                    <p class="mt-2">Dịch vụ xuất sắc, hoa tươi và giao hàng rất nhanh!</p>
                </div>
                <div class="border-b pb-4 mb-4">
                    <div class="flex justify-between items-center">
                        <strong class="text-lg">Hoàng Anh E</strong>
                        <span class="text-yellow-500">⭐⭐⭐⭐☆</span>
                    </div>
                    <p class="mt-2">Rất thích, hoa đẹp và tư vấn chu đáo!</p>
                </div>
                <div>
                    <div class="flex justify-between items-center">
                        <strong class="text-lg">Vũ Thị F</strong>
                        <span class="text-yellow-500">⭐⭐⭐☆☆</span>
                    </div>
                    <p class="mt-2">Hoa ổn, nhưng giá hơi cao so với mặt bằng chung.</p>
                </div>
            </div>

            <!-- Add Review Form -->
            <div class="mt-6 border-t pt-4">
                <h3 class="text-lg font-semibold text-pink-500">Thêm đánh giá của bạn</h3>
                <form action="/submit-review" method="POST" class="mt-4">
                    <textarea
                        name="review"
                        rows="4"
                        placeholder="Nhập đánh giá của bạn..."
                        class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-pink-500"
                        required
                    ></textarea>
                    <div class="flex items-center mt-4">
                        <label for="rating" class="mr-2 text-gray-700">Đánh giá:</label>
                        <select
                            name="rating"
                            id="rating"
                            class="border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-pink-500"
                        >
                            <option value="5">⭐⭐⭐⭐⭐ - Tuyệt vời</option>
                            <option value="4">⭐⭐⭐⭐☆ - Tốt</option>
                            <option value="3">⭐⭐⭐☆☆ - Trung bình</option>
                            <option value="2">⭐⭐☆☆☆ - Kém</option>
                            <option value="1">⭐☆☆☆☆ - Tệ</option>
                        </select>
                    </div>
                    <button
                        type="submit"
                        class="mt-4 px-4 py-2 bg-pink-500 text-white rounded-lg hover:bg-pink-600 focus:outline-none focus:ring-2 focus:ring-pink-500"
                    >
                        Gửi đánh giá
                    </button>
                </form>
            </div>
        </main>
    </div>
</div>



<div class="flex justify-center w-full mt-8">
  <div class="px-6 py-3 bg-pink-100 rounded-full shadow-md">
    <p class="text-pink-600 font-semibold uppercase text-sm tracking-wide">
      Sản phẩm tương tự
    </p>
  </div>
</div>
<div class="relative w-full flex justify-center mt-4 md:mt-8">
    <div class="slidercart w-full md:w-[80%] lg:w-[65%] mx-auto rounded-lg shadow-lg">
        @foreach ($products as $flower)
            <a class="product-tiles-grid-item js-ga-track" href="{{ route('sanpham.chitiet', ['id' => $flower->id]) }}" data-style-id="{{ $flower->id }}" dt-dtname="Product Details Page" id="{{ $flower->id }}" data-position="{{ $loop->index }}" data-list-name="ProductGrid" data-category-path="Flowers" aria-label="{{ $flower->tenhoa }}" data-list-page="/flowers">
                <div class="product-tiles-grid-item-image-wrapper">
                    <div class="product-tiles-grid-item-image">
                        <picture data-image-type="picture">
                            <source data-image-size="standard-retina" srcset="{{ resizeImage($flower->hinhanh, 540, 540) }}" media="(min-width: 1024px) and (-webkit-min-device-pixel-ratio: 2), (min-width: 1024px) and (min-resolution: 192dpi)">
                            <source data-image-size="small-retina" srcset="{{ resizeImage($flower->hinhanh, 316, 316) }}" media="(max-width: 767px) and (-webkit-min-device-pixel-ratio: 2), (max-width: 767px) and (min-resolution: 192dpi)">
                            <source data-image-size="medium-retina" srcset="{{ resizeImage($flower->hinhanh, 470, 470) }}" media="(min-width: 768px) and (max-width: 1023px) and (-webkit-min-device-pixel-ratio: 2), (min-width: 768px) and (max-width: 1023px) and (min-resolution: 192dpi)">
                            <source data-image-size="medium" srcset="{{ resizeImage($flower->hinhanh, 235, 235) }}" media="(min-width: 768px) and (max-width: 1023px)">
                            <source data-image-size="small" srcset="{{ resizeImage($flower->hinhanh, 158, 158) }}" media="(max-width: 767px)">
                            <source data-image-size="standard" srcset="{{ resizeImage($flower->hinhanh, 316, 316) }}" media="(min-width: 1024px)">
                            <img data-image-type="fallback" srcset="{{ resizeImage($flower->hinhanh, 316, 316) }}" alt="{{ $flower->tenhoa }}">
                        </picture>
                    </div>
                </div>
                <div class="product-tiles-grid-item-detail" data-has-gallery-images="false">
                    <div class="product-tiles-grid-item-image-wrapper touch-remove">
                        <div class="product-tiles-grid-item-image">
                            <picture data-image-type="picture">
                                <source data-image-size="standard-retina" srcset="{{ resizeImage($flower->hinhanh_phu ?? $flower->hinhanh, 540, 540) }}" media="(min-width: 1024px) and (-webkit-min-device-pixel-ratio: 2), (min-width: 1024px) and (min-resolution: 192dpi)">
                                <source data-image-size="small-retina" srcset="{{ resizeImage($flower->hinhanh_phu ?? $flower->hinhanh, 316, 316) }}" media="(max-width: 767px) and (-webkit-min-device-pixel-ratio: 2), (max-width: 767px) and (min-resolution: 192dpi)">
                                <source data-image-size="medium-retina" srcset="{{ resizeImage($flower->hinhanh_phu ?? $flower->hinhanh, 470, 470) }}" media="(min-width: 768px) and (max-width: 1023px) and (-webkit-min-device-pixel-ratio: 2), (min-width: 768px) and (max-width: 1023px) and (min-resolution: 192dpi)">
                                <source data-image-size="medium" srcset="{{ resizeImage($flower->hinhanh_phu ?? $flower->hinhanh, 235, 235) }}" media="(min-width: 768px) and (max-width: 1023px)">
                                <source data-image-size="small" srcset="{{ resizeImage($flower->hinhanh_phu ?? $flower->hinhanh, 158, 158) }}" media="(max-width: 767px)">
                                <source data-image-size="standard" srcset="{{ resizeImage($flower->hinhanh_phu ?? $flower->hinhanh, 316, 316) }}" media="(min-width: 1024px)">
                                <img data-image-type="fallback" srcset="{{ resizeImage($flower->hinhanh_phu ?? $flower->hinhanh, 316, 316) }}" alt="{{ $flower->tenhoa }}">
                            </picture>
                        </div>
                    </div>
                    <div class="product-tiles-grid-item-info">
                        <h2 aria-hidden="true">{{ $flower->tenhoa }}</h2>
                        <p class="price" dir="ltr">
                            <span class="sale" dir="ltr">{{ number_format($flower->gia, 0) }} VND</span>
                            <span class="price-label"></span>
                        </p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
<style>
    .product-tiles-grid-item {
    position: relative;
    display: block;
    text-decoration: none;
    color: inherit;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease, border 0.3s ease;
    border: 1px solid transparent;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.product-tiles-grid-item:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    border: 1px solid #ccc;
}

.product-tiles-grid-item-image-wrapper {
    position: relative;
    overflow: hidden;
}

.product-tiles-grid-item-image {
    width: 100%;
    display: block;
}

.product-tiles-grid-item-detail {
    padding: 1rem;
}

.product-tiles-grid-item-info h2 {
    font-size: 1rem;
    margin-bottom: 0.5rem;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.product-tiles-grid-item-info .price {
    font-weight: bold;
    margin-bottom: 0.5rem;
}

.product-tiles-grid-item-info .cta {
    font-size: 0.9rem;
    color: #000;
}

.product-tiles-grid-item-image-wrapper.touch-remove {
    display: none;
}
/* Slick Carousel arrows */
.slick-prev,
.slick-next {
    font-size: 20px;
    z-index: 10;
}

.slick-prev:before,
.slick-next:before {
    font-family: 'Font Awesome 5 Free';
    font-weight: 900;
    color: white;
}
</style>
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