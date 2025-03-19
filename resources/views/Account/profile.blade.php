@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gradient-to-br from-blue-50 to-gray-100 p-6">
    <div class="w-full max-w-md bg-white shadow-xl rounded-3xl p-6 space-y-6">
        <div class="flex flex-col items-center text-center">
            <img class="w-24 h-24 mb-4 rounded-full border-4 border-blue-500 shadow-sm" 
                 src="{{ $user->avatar ?? '/default-avatar.jpg' }}" alt="Avatar">
            <h2 class="text-2xl font-bold text-gray-800">{{ $user->name }}</h2>
            <p class="text-gray-500">{{ $user->email }}</p>
        </div>
        <div class="space-y-4">
        <div class="flex justify-between bg-gray-50 p-3 rounded-lg shadow-sm">
                <span class="font-medium text-gray-600">Địa chỉ: </span>
                <span class="text-gray-800">{{ $user->diachi }}</span>
            </div>
            <div class="flex justify-between bg-gray-50 p-3 rounded-lg shadow-sm">
                <span class="font-medium text-gray-600">Thành phố:</span>
                <span class="text-gray-800">{{ $user->thanhpho }}</span>
            </div>
            <div class="flex justify-between bg-gray-50 p-3 rounded-lg shadow-sm">
                <span class="font-medium text-gray-600">Quận/Huyện:</span>
                <span class="text-gray-800">{{ $user->quanhuyen }}</span>
            </div>
            <div class="flex justify-between bg-gray-50 p-3 rounded-lg shadow-sm">
                <span class="font-medium text-gray-600">Phường/Xã:</span>
                <span class="text-gray-800">{{ $user->phuongxa }}</span>
            </div>
        </div>
        <div class="flex gap-4 mt-4">
            <a href="{{ route('update.profile') }}" 
               class="flex-1 text-center px-4 py-2 bg-blue-500 text-white rounded-xl shadow-md hover:bg-blue-600 transition">Cập nhật tài khoản</a>
            <a href="{{ route('update.password') }}" 
               class="flex-1 text-center px-4 py-2 bg-gray-500 text-white rounded-xl shadow-md hover:bg-gray-600 transition">Cập nhật mật khẩu</a>
        </div>
        <div class="mt-6 text-center">
            <a href="{{ route('order.history') }}" 
               class="inline-block px-4 py-2 bg-purple-500 text-white rounded-xl shadow-md hover:bg-purple-600 transition">Lịch sử mua hàng</a>
        </div>
        <div class="mt-4 text-center">
    <a href="/" 
       class="inline-block px-4 py-2 bg-red-500 text-white rounded-xl shadow-md hover:bg-red-600 transition">
       ⬅ Quay lại Trang Chủ
    </a>
</div>
    </div>
</div>
@endsection