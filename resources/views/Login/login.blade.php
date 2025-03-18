<!DOCTYPE html>
<html lang="vi">
<head>
    <x-header title="Đăng nhập"/>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-pink-100">
    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-xl shadow-lg">
            
            <!-- Logo User -->
            <div class="flex justify-center">
                <svg class="w-16 h-16 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M5.121 17.804A12.07 12.07 0 0112 15.75c2.294 0 4.435.64 6.263 1.757m-12.525 0A12.073 12.073 0 0112 20.25c2.294 0 4.435-.64 6.263-1.757M12 12a5 5 0 100-10 5 5 0 000 10z" />
                </svg>
            </div>

            <h2 class="text-2xl font-bold text-center text-gray-800">Đăng nhập</h2>
            
            @if ($errors->any())
                <div class="p-3 bg-red-100 text-red-600 rounded-md">
                    <ul class="text-sm">
                        @foreach ($errors->all() as $error)
                            <li class="font-medium">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="space-y-5" method="post" action="{{ route('login.post') }}">
                @csrf
                
                <div>
                    <label class="block text-sm font-medium text-gray-700">Số điện thoại</label>
                    <input maxlength="10" type="text" name="sdt" id="sdt" required placeholder="Số điện thoại"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-50 focus:outline-none focus:ring-2 focus:ring-pink-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Mật khẩu</label>
                    <input type="password" name="password" id="password" required placeholder="Mật khẩu"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-50 focus:outline-none focus:ring-2 focus:ring-pink-500">
                </div>

                <button type="submit"
                    class="w-full px-4 py-2 text-white bg-pink-500 rounded-md hover:bg-pink-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-400 transition">
                    Đăng nhập
                </button>
            </form>

            <div class="text-center">
                
                <a href="/register" class="text-sm text-pink-500 hover:underline">Tạo tài khoản</a>
            </div>
            <div class="text-center">
                
                <a href="/checkemail" class="text-sm text-pink-500 hover:underline">Quên mật khẩu</a>
            </div>
            <div class="text-center">
                <a href="/" class="text-sm text-red-600 hover:underline">Quay lại</a>
            </div>
        </div>
    </div>
</body>
</html>
