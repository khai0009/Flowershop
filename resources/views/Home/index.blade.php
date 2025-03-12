

@extends('layouts.app')

@section('title', 'Trang chủ')

@section('content')

<div class="relative w-full justify-center flex flex-row mt-10 border-pink-800  overflow-hidden">
    <div class="slider flex flex-row w-[65%] h-120">
        <div class="w-full">
            <img src="https://picsum.photos/id/11/800/400" alt="Image 1" class="w-full h-auto object-cover">
        </div>
        <div class="w-full">
            <img src="https://picsum.photos/id/12/800/400" alt="Image 2" class="w-full h-auto object-cover">
        </div>
        <div class="w-full">
            <img src="https://picsum.photos/id/13/800/400" alt="Image 3" class="w-full h-auto object-cover">
        </div>
        <div class="w-full">
            <img src="https://picsum.photos/id/14/800/400" alt="Image 4" class="w-full h-auto object-cover">
        </div>
    </div>
  
</div>
</div>
<div class="max-w-6xl mx-auto px-2 bg-white">
    <form action="{{ route('timkiem.sanpham') }}" method="GET" >
        <input type="text" name="tenhoa" placeholder="Nhập tên hoa" class="w-full p-2 my-4 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        <button type="submit" style="display: none;"></button>
    </form>
    
    <form id="sortForm">
    <select name="sort" id="sortSelect">
        <option value="">Sắp xếp theo giá</option>
        <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Giá tăng dần</option>
        <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Giá giảm dần</option>
    </select>
    </form>
    <div id="product-list-container" class="product-list grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 text-center py-2">


    @include('Home.products', ['duLieu' => $duLieu])
    
    
</div>

<div class="pagination" id="pagination-container">
    @if($duLieu instanceof \Illuminate\Pagination\LengthAwarePaginator)
        {{ $duLieu->appends(request()->query())->links() }}
    @endif
</div>
    
@endsection
