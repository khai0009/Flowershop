@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-6 bg-white shadow-lg rounded-2xl">
        <h2 class="text-xl font-semibold text-center mb-4">Cập nhật mật khẩu</h2>

        @if (session('error'))
            <div class="bg-red-500 text-white p-2 mb-4 rounded">{{ session('error') }}</div>
        @endif
        @if (session('success'))
            <div class="bg-green-500 text-white p-2 mb-4 rounded">{{ session('success') }}</div>
        @endif

        <form action="{{ route('update.password.post') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="block font-medium">Mật khẩu cũ</label>
                <input type="password" name="current_password" class="w-full px-4 py-2 border rounded-lg">
            </div>

            <div class="mb-3">
                <label class="block font-medium">Mật khẩu mới</label>
                <input type="password" name="new_password" class="w-full px-4 py-2 border rounded-lg">
            </div>

            <div class="mb-3">
                <label class="block font-medium">Xác nhận mật khẩu mới</label>
                <input type="password" name="new_password_confirmation" class="w-full px-4 py-2 border rounded-lg">
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg">Đổi mật khẩu</button>
        </form>

        <a href="{{ route('profile') }}" class="block text-center mt-4 text-blue-500">Quay lại hồ sơ</a>
    </div>
</div>
@endsection
