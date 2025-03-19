@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-6 bg-white shadow-lg rounded-2xl">
        <h2 class="text-xl font-semibold text-center mb-4">Cập nhật tài khoản</h2>

        @if (session('success'))
            <div class="bg-green-500 text-white p-2 mb-4 rounded">{{ session('success') }}</div>
        @endif

        <form action="{{ route('update.profile.post') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="block font-medium">Họ và tên</label>
                <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}" class="w-full px-4 py-2 border rounded-lg">
            </div>

            <div class="mb-3">
                <label class="block font-medium">Email</label>
                <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}" class="w-full px-4 py-2 border rounded-lg">
            </div>
            <div class="mb-3">
                <label class="block font-medium">Địa chỉ</label>
                <input type="text" name="city" value="{{ old('diachi', auth()->user()->diachi) }}" class="w-full px-4 py-2 border rounded-lg">
            </div>
            <div class="mb-3">
                <label class="block font-medium">Thành phố</label>
                <input type="text" name="city" value="{{ old('thanhpho', auth()->user()->thanhpho) }}" class="w-full px-4 py-2 border rounded-lg">
            </div>

            <div class="mb-3">
                <label class="block font-medium">Quận/Huyện</label>
                <input type="text" name="district" value="{{ old('quanhuyen', auth()->user()->quanhuyen) }}" class="w-full px-4 py-2 border rounded-lg">
            </div>

            <div class="mb-3">
                <label class="block font-medium">Phường/Xã</label>
                <input type="text" name="ward" value="{{ old('phuongxa', auth()->user()->phuongxa) }}" class="w-full px-4 py-2 border rounded-lg">
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg">Lưu thay đổi</button>
        </form>

        <a href="{{ route('profile') }}" class="block text-center mt-4 text-blue-500">Quay lại hồ sơ</a>
    </div>
</div>
@endsection
