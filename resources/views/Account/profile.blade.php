@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-6 bg-white shadow-lg rounded-2xl">
        <div class="flex flex-col items-center">
            <img class="w-24 h-24 mb-4 rounded-full" src="{{ $user->avatar ?? '/default-avatar.jpg' }}" alt="Avatar">
            <h2 class="text-xl font-semibold">{{ $user->name }}</h2>
            <p class="text-gray-500">{{ $user->email }}</p>
        </div>
        <div class="mt-4 space-y-2">
            <div class="flex justify-between border-b pb-2">
                <span class="font-medium">Thành phố:</span>
                <span>{{ $user->thanhpho }}</span>
            </div>
            <div class="flex justify-between border-b pb-2">
                <span class="font-medium">Quận/Huyện:</span>
                <span>{{ $user->quanhuyen }}</span>
            </div>
            <div class="flex justify-between">
                <span class="font-medium">Phường/Xã:</span>
                <span>{{ $user->phuongxa }}</span>
            </div>
        </div>
        <div class="flex justify-between mt-6">
            <a href="{{ route('update.profile') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Cập nhật tài khoản</a>
            <a href="{{ route('update.password') }}" class="px-4 py-2 bg-gray-500 text-white rounded-lg">Cập nhật mật khẩu</a>
        </div>
    </div>
</div>
@endsection
