<!DOCTYPE html>
<html lang="vi">
<x-header title="Đăng ký"/>
<body>
<div class="flex items-center justify-center min-h-screen bg-pink-100">
    <div class="w-full max-w-md p-8 space-y-8 bg-white rounded-lg shadow">
        <h2 class="text-2xl font-bold text-center text-pink-600">Đăng ký</h2>
        <form class="mt-8 space-y-6" method="post" action="{{ route('address.store') }}">
            @csrf
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Số điện thoại</label>
                <div class="flex items-center bg-pink-700 p-2 rounded-lg">
                    <i class="fas fa-phone-alt text-white"></i>
                    <input maxlength="10"
                           type="tel"
                           required
                           name="sdt"
                           id="sdt"
                           placeholder="Số điện thoại"
                           class="bg-transparent text-white ml-2 w-full focus:outline-none">
                </div>
            </div>
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Mật khẩu</label>
                <div class="flex items-center bg-pink-700 p-2 rounded-lg">
                    <i class="fas fa-lock text-white"></i>
                    <input minlength="8"
                           type="password"
                           required
                           name="mk"
                           id="mk"
                           placeholder="Mật khẩu"
                           class="bg-transparent text-white ml-2 w-full focus:outline-none">
                </div>
            </div>
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <div class="flex items-center bg-pink-700 p-2 rounded-lg">
                    <i class="fas fa-envelope text-white"></i>
                    <input type="email"
                           required
                           name="email"
                           id="email"
                           placeholder="Email"
                           class="bg-transparent text-white ml-2 w-full focus:outline-none">
                </div>
            </div>
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Địa chỉ</label>
                <div class="flex items-center bg-pink-700 p-2 rounded-lg">
                    <i class="fas fa-map-marker-alt text-white"></i>
                    <input type="text"
                           required
                           name="diachi"
                           id="diachi"
                           placeholder="Địa chỉ"
                           class="bg-transparent text-white ml-2 w-full focus:outline-none">
                </div>
            </div>
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Thành phố/Tỉnh</label>
                <select required
                        class="w-full bg-pink-700 text-white p-2 rounded-lg focus:outline-none"
                        name="city"
                        id="city">
                    <option value="">Chọn Tỉnh/Thành phố</option>
                </select>
            </div>
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Quận/Huyện</label>
                <select name="district"
                        id="district"
                        class="w-full bg-pink-700 text-white p-2 rounded-lg focus:outline-none">
                    <option value="">Chọn Quận/Huyện</option>
                </select>
            </div>
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Phường/Xã</label>
                <select required
                        class="w-full bg-pink-700 text-white p-2 rounded-lg focus:outline-none"
                        name="ward"
                        id="ward">
                    <option value="">Chọn Phường/Xã</option>
                </select>
            </div>
            <div class="mt-4 grid">
                <a href="/login" class="text-base text-pink-600 hover:underline">
                    Đã có tài khoản</a>
            </div>
            <button type="submit"
                    class="w-full px-4 py-2 text-white bg-pink-600 rounded-md hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">
                Đăng ký
            </button>
        </form>
        <div class="mt-4 grid">
            <a href="/" class="text-sm text-pink-600 hover:underline">
                Quay lại
            </a>
            <p id="error-message" class="text-red"></p>
        </div>
    </div>
</div>
<script>
    function validateForm() {
        // ... (Giữ nguyên phần validateForm)
    }
    document.querySelector('form').addEventListener('submit', function (event) {
        if (!validateForm()) {
            event.preventDefault();
        }
    });
</script>
<script src="{{ asset('js/address.js') }}" defer></script>
</body>
</html>