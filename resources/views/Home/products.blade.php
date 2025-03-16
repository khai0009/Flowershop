<style>
.product-tiles-grid-item {
    position: relative;
    display: block;
    text-decoration: none;
    color: inherit;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease, border 0.3s ease;
    border: 1px solid transparent;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Đổ bóng mặc định */
}

.product-tiles-grid-item:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Đổ bóng khi hover */
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
</style>

@foreach ($duLieu as $flower)
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