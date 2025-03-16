@extends('layouts.app')

@section('title', 'Trang chủ')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Hero Slider -->
    <div class="relative w-full flex justify-center mt-4 md:mt-8">
        <div class="slider w-full md:w-[80%] lg:w-[65%] mx-auto overflow-hidden rounded-lg shadow-lg">
            <div class="w-full">
                <img src="https://images.unsplash.com/photo-1562690868-60bbe7293e94?w=1200&h=600&fit=crop" alt="Flower 1" class="w-full h-[200px] md:h-[400px] object-cover">
            </div>
            <div class="w-full">
                <img src="https://images.unsplash.com/photo-1508610048659-a06b669e3321?w=1200&h=600&fit=crop" alt="Flower 2" class="w-full h-[200px] md:h-[400px] object-cover">
            </div>
            <div class="w-full">
                <img src="https://images.unsplash.com/photo-1519378058457-4c29a0a2efac?w=1200&h=600&fit=crop" alt="Flower 3" class="w-full h-[200px] md:h-[400px] object-cover">
            </div>
            <div class="w-full">
                <img src="https://images.unsplash.com/photo-1490750967868-88aa4486c946?w=1200&h=600&fit=crop" alt="Flower 4" class="w-full h-[200px] md:h-[400px] object-cover">
            </div>
        </div>
    </div>

    

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 py-8"  id="main-content">
        <div class="container mx-auto py-10">
    <div class="text-center">
        <h2 class="text-xl font-semibold text-pink-600 mb-2">✓ MUA HÀNG TẠI BEATIFULFLOWER.COM.VN</h2>
    </div>

    <div class="flex justify-center mt-8">
        <div class="grid grid-cols-4 gap-8">
            <div class="text-center">
                <div class="rounded-full border-2 border-pink-200 p-4 w-20 h-20 mx-auto relative">
                    <i class="fas fa-truck text-3xl text-pink-600 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"></i>
                </div>
                <p class="mt-4 text-sm">MIỄN PHÍ GIAO HOA</p>
                <p class="text-xs text-gray-500">NỘI THÀNH CÁC TỈNH</p>
            </div>

            <div class="text-center">
                <div class="rounded-full border-2 border-pink-200 p-4 w-20 h-20 mx-auto relative">
                    <i class="fas fa-shield-alt text-3xl text-pink-600 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"></i>
                </div>
                <p class="mt-4 text-sm">0% RỦI RO KHI</p>
                <p class="text-xs text-gray-500">MUA HOA ONLINE</p>
            </div>

            <div class="text-center">
                <div class="rounded-full border-2 border-pink-200 p-4 w-20 h-20 mx-auto relative">
                    <i class="fas fa-camera text-3xl text-pink-600 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"></i>
                </div>
                <p class="mt-4 text-sm">GỬI HÌNH ẢNH</p>
                <p class="text-xs text-gray-500">TRƯỚC & SAU GIAO HOA</p>
            </div>

            <div class="text-center">
                <div class="rounded-full border-2 border-pink-200 p-4 w-20 h-20 mx-auto relative">
                    <i class="fas fa-leaf text-3xl text-pink-600 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"></i>
                </div>
                <p class="mt-4 text-sm">HOA LUÔN TƯƠI ĐẸP</p>
                <p class="text-xs text-gray-500">HOA MỚI MỖI NGÀY</p>
            </div>
        </div>
    </div>
</div>
        <!-- Search and Sort -->
        <div class="space-y-4 md:space-y-0 md:flex md:items-center md:justify-between mb-8">
            <form action="{{ route('timkiem.sanpham') }}" method="GET" class="flex-1 md:max-w-md">
                <div class="relative">
                    <input 
                        type="text" 
                        name="tenhoa" 
                        placeholder="Tìm kiếm hoa..." 
                        class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent"
                    >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                    </svg>
                </div>
            </form>

            <form action="{{ route('products.index') }}" method="GET" class="flex items-center space-x-4">
                <label for="sortSelect" class="text-sm font-medium text-gray-700">Sắp xếp:</label>
                <select 
                    id="sortSelect" 
                    name="sort" 
                    class="pl-3 pr-10 py-2 text-base border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent"
                >
                    <option value="">Mặc định</option>
                    <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Giá tăng dần</option>
                    <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Giá giảm dần</option>
                </select>
                <button type="submit" class="px-4 py-2 bg-pink-500 text-white rounded-lg hover:bg-pink-600 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent">
            Sắp xếp
        </button>
            </div>
        </form>

        <!-- Products Grid -->
        <div id="product-list-container" class="product-list grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
            @include('Home.products')
        </div>

        <!-- Pagination -->
        <div class="mt-8" id="pagination-container">
            @if($duLieu instanceof \Illuminate\Pagination\LengthAwarePaginator)
                <div class="flex justify-center">
                    {{ $duLieu->appends(request()->query())->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection