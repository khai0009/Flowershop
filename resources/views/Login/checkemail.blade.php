<!DOCTYPE html>
<html lang="vi">
<head>
    <x-header title="Xác thực email"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function validatePasswords() {
            let password = document.getElementById("password").value;
            let confirmPassword = document.getElementById("confirm_password").value;
            if (password !== confirmPassword) {
                alert("Mật khẩu nhập lại không khớp!");
                return false;
            }
            return true;
        }
    </script>
</head>

<body class="bg-pink-100">
    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-xl shadow-lg">
            
            <!-- Logo User -->
            <div class="flex justify-center">
                <svg class="w-16 h-16 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M12 12a5 5 0 100-10 5 5 0 000 10z M5.121 17.804A12.07 12.07 0 0112 15.75c2.294 0 4.435.64 6.263 1.757" />
                </svg>
            </div>

            <h2 class="text-2xl font-bold text-center text-pink-700">Nhập email</h2>
            
            @if ($errors->any())
                <div class="p-3 bg-red-100 text-red-600 rounded-md">
                    <ul class="text-sm">
                        @foreach ($errors->all() as $error)
                            <li class="font-medium">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="space-y-5" method="post" action="{{ route('checkemail.process') }}">
                @csrf
                
                <div>
                    <label class="block text-sm font-medium text-pink-700">Email</label>
                    <input type="email" name="email" id="email" required placeholder="Nhập email"
                        class="w-full px-4 py-2 border border-pink-300 rounded-md bg-pink-50 focus:outline-none focus:ring-2 focus:ring-pink-500">
                </div>

                <button type="submit"
                    class="w-full px-4 py-2 text-white bg-pink-500 rounded-md hover:bg-pink-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-400 transition">
                    Kiểm tra email
                </button>
            </form>
            <div class="text-center">
                <a href="/login" class="text-sm text-pink-600 hover:underline">Quay lại</a>
            </div>
        </div>
    </div>
</body>
</html>
