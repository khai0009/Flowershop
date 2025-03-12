
      
      @foreach ($duLieu as $flower)
     
    <div class="product-item group relative w-64 h-80 overflow-hidden border rounded-lg hover:shadow-lg transition-shadow">
        <a href="{{ route('sanpham.chitiet', ['id' => $flower->id]) }}">
            <img src="{{ resizeImage($flower->hinhanh, 275, 400) }}" class="object-cover w-full h-full" alt="{{ $flower->tenhoa}}">
        </a>

    <div class="absolute bottom-0 left-0 w-full   transition-transform duration-300 ease-in-out group-hover:-translate-y-full group-hover:opacity-0">
        <div class="relative w-full h-full">
            <div class="absolute inset-0 bg-black opacity-30 p-4"></div>
                <div class="relative z-10 text-white">
                <h2 class="text-xl font-semibold">{{ $flower->tenhoa ; }}</h2>
                <p class="text-lg font-medium mt-2 ">{{ $flower->gia; }} VND</p>
            </div>
        </div>
    
    </div>

        <div  class="z-10 absolute top-full left-0 w-full bg-pink-500 text-white p-4 transition-transform duration-300 ease-in-out group-hover:-translate-y-full">
            <form  method="post" action="{{ route('buy.now') }}">
                @csrf
                <button class="w-full py-2 bg-pink-700 hover:bg-pink-800 rounded" type="submit">
            Mua ngay
                </button>
                <input type="hidden" name="product_id" value="{{ $flower->id }}">
                <input type="hidden" name="product_price" value="{{ $flower->gia }}">
            </form>
            <form  method="post" action="{{ route('add.to.cart') }}">
            @csrf
                <button class="w-full py-2 mt-2 bg-gray-500 hover:bg-gray-600 rounded" type="submit">
            Thêm vào giỏ hàng
                </button>
                <input type="hidden" name="product_id" value="{{ $flower->id }}">
                <input type="hidden" name="product_price" value="{{ $flower->gia }}">      
            </form>
        </div>
    </div> 
    @endforeach