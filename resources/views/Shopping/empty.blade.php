@extends('layouts.app')

@section('title', 'Giỏ hàng trống')

@section('content')


<div class="h-full p-4 center flex items-center justify-center  w-full ">
          <div class="bg-white shadow-lg rounded-lg p-8 w-[50%]  h-full text-center">
            <image
              src="/emptycart.png" 
              alt="Empty Cart"
              width={100}
              height={100}
              class="mx-auto w-32 h-32 mb-4"
            />
            <h2 class="text-2xl font-semibold text-gray-700">
              Giỏ hàng của bạn <span class="text-red-500">Rỗng!</span>
            </h2>
            <p class="text-gray-500 my-5 text-sm">
              Hãy thêm sản phẩm trước khi thanh toán.
            </p>
            <a href="/" class="mt-6 px-6 py-2 bg-red-500 text-white rounded-full shadow-md hover:bg-red-600 transition">
              Quay lại
            </a>
          </div>
        </div>

        @endsection