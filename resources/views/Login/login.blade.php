<!DOCTYPE html>
<html lang="vi">
<x-header title="đăng nhập"/>
<body class="bg-pink-100">
    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-md p-8 space-y-8 bg-white rounded-lg shadow">
            <h2 class="text-2xl font-bold text-center text-pink-600">Đăng nhập</h2>
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-red-600 font-bold text-center w-full">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

            <form class="mt-8 space-y-6" method="post" action="{{ route('login.post') }}">
                @csrf
                <div class="space-y-1">
                    <label class="block text-sm font-medium text-gray-700">Số điện thoại</label>
                    <div class="flex items-center bg-pink-700 p-2 rounded-lg">
                    <i class="fas fa-envelope text-white"></i>
                    <input maxlength="10"
                        type="text"
 
                        required
                        name="sdt" id="sdt" type="text" placeholder="Số điện thoại" class="bg-transparent text-white ml-2 w-full focus:outline-none">
                </div>
                   
                </div>
                <div class="space-y-1">
                    <label class="block text-sm font-medium text-gray-700">Mật khẩu</label>
                    <div class="flex items-center bg-pink-700 p-2 rounded-lg">
                    <i class="fas fa-lock text-white"></i>
                    <input id="password"  name="password"
                    required type="password" placeholder="Mật khẩu" class="bg-transparent text-white ml-2 w-full focus:outline-none">
                </div>
                   
                </div>
                <button
                    type="submit"
                    class="w-full px-4 py-2 text-white bg-pink-600 rounded-md hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500"
                >
                    Đăng nhập
                </button>
            </form>
            <div class="mt-4 grid">
                <a href="/register" class="text-sm text-pink-600 hover:underline">
                    Chưa có tài khoản? hãy đăng ký!!
                </a>
            </div>
            <div class="mt-4 grid">
                <a href="/" class="text-sm text-pink-600 hover:underline">
                    Quay lại
                </a>
            </div>
        </div>
    </div>
</body>

</html>