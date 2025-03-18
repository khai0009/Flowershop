<!DOCTYPE html>
<html lang="vi">
<head>
    <x-header title="Đăng ký"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-pink-100">
    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-md p-8 space-y-8 bg-white rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold text-center text-pink-600">Đăng ký</h2>
            <form class="mt-8 space-y-6" method="post" action="{{ route('address.store') }}">
                @csrf
                <!-- Các trường nhập liệu được sắp xếp theo từng dòng -->
                <div class="space-y-6">
                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">Họ và tên</label>
                        <input type="text" name="name" id="name" maxlength="10" required placeholder="Họ và tên"
                               class="w-full px-4 py-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-pink-500">
                    </div>
                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">Số điện thoại</label>
                        <input type="tel" name="sdt" id="sdt" maxlength="10" required placeholder="Số điện thoại"
                               class="w-full px-4 py-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-pink-500">
                    </div>
                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">Mật khẩu</label>
                        <input type="password" name="mk" id="mk" minlength="8" required placeholder="Mật khẩu"
                               class="w-full px-4 py-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-pink-500">
                    </div>
                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" required placeholder="Email"
                               class="w-full px-4 py-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-pink-500">
                    </div>
                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">Địa chỉ</label>
                        <input type="text" name="diachi" id="diachi" required placeholder="Địa chỉ"
                               class="w-full px-4 py-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-pink-500">
                    </div>
                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">Thành phố/Tỉnh</label>
                        <select name="city" id="city" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-pink-500">
                            <option value="">Chọn Tỉnh/Thành phố</option>
                        </select>
                    </div>
                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">Quận/Huyện</label>
                        <select name="district" id="district"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-pink-500">
                            <option value="">Chọn Quận/Huyện</option>
                        </select>
                    </div>
                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">Phường/Xã</label>
                        <select name="ward" id="ward" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-pink-500">
                            <option value="">Chọn Phường/Xã</option>
                        </select>
                    </div>
                </div>
                <div class="mt-4 text-center">
                    <a href="/login" class="text-base text-pink-600 hover:underline">Đã có tài khoản</a>
                </div>
                <button type="submit"
                        class="w-full px-4 py-2 text-white bg-pink-600 rounded-md hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">
                    Đăng ký
                </button>
            </form>
            <div class="mt-4 text-center">
                <a href="/" class="text-sm text-pink-600 hover:underline">Quay lại</a>
                <p id="error-message" class="text-red"></p>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/address.js') }}" defer></script>
</body>
</html>
