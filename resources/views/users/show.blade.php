<html>
<x-header title="Chi tiết người dùng" />
<body class="bg-gray-50">
    <div class="min-h-screen bg-gray-50">
        <div class="bg-white border-b">
            <div class="px-6 py-4 max-w-7xl mx-auto">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <a href="{{ route('users.index') }}" class="text-indigo-600 hover:text-indigo-900">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                            </svg>
                        </a>
                        <h1 class="text-xl font-semibold text-gray-900">Chi tiết người dùng #{{ $user->id }}</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-6 py-8">
            <div class="bg-white rounded-lg shadow overflow-hidden p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Thông tin người dùng</h2>
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <p class="text-gray-600">ID: <span class="font-semibold">{{ $user->id }}</span></p>
                        <p class="text-gray-600">Tên: <span class="font-semibold">{{ $user->name }}</span></p>
                        <p class="text-gray-600">Email: <span class="font-semibold">{{ $user->email }}</span></p>
                        <p class="text-gray-600">Số điện thoại: <span class="font-semibold">{{ $user->sdt }}</span></p>
                    </div>
                    <div>
                        <p class="text-gray-600">Thành phố: <span class="font-semibold">{{ $user->thanhpho }}</span></p>
                        <p class="text-gray-600">Quận/Huyện: <span class="font-semibold">{{ $user->quanhuyen }}</span></p>
                        <p class="text-gray-600">Phường/Xã: <span class="font-semibold">{{ $user->phuongxa }}</span></p>
                        <p class="text-gray-600">Địa chỉ: <span class="font-semibold">{{ $user->diachi }}</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
