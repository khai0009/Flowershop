<!DOCTYPE html>
<html lang="vi">
<head>
    <title>Trang chủ</title>
    <meta charset="UTF-8">
    <meta name="user-id" content="{{ Auth::id() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    @vite('resources/css/app.css')
    <style>
        .slick-prev:before,
        .slick-next:before {
            color: white !important; /* Ensure arrow color is white */
        }
        .w-55 {
            width: 13.75rem; /* Equivalent to 55 in your context, adjust if needed */
        }
    </style>
</head>
<body>
<header class="bg-pink-200 py-3 shadow-md">
    <div class="container mx-auto px-4">
        <div class="md:hidden flex flex-col space-y-4">
            <div class="flex items-center justify-between">
                <a href="/" class="flex-shrink-0">
                    <img src="/Beautifulflower.jpg" alt="Logo" class="w-32">
                </a>
                
                <div class="flex items-center space-x-2">
                    @auth
                        <div x-data="{ open: false }" class="relative">
                            <button @click="open = !open" class="flex items-center bg-pink-300 p-1.5 rounded-lg text-sm text-white hover:bg-pink-400">
                                <img src="https://i.pravatar.cc/250?u=mail@ashallendesign.co.uk" alt="Avatar" class="w-6 h-6 rounded-full mr-1">
                                <span class="max-w-[80px] truncate">{{ Auth::user()->name }}</span>
                                <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                                <a href="/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Thông tin tài khoản</a>
                                <a href="/settings" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Cài đặt</a>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Đăng xuất</button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="/login" class="text-sm bg-gray-100 px-3 py-1.5 rounded-full hover:bg-pink-300 hover:text-white transition">
                            <i class="fas fa-sign-in-alt"></i>
                        </a>
                    @endauth

                    <a href="/cart" class="relative bg-gray-100 px-3 py-1.5 rounded-full text-sm hover:bg-pink-300 hover:text-white transition">
                        <i class="fas fa-shopping-bag"></i>
                        <span class="absolute -top-1 -right-1 bg-pink-500 text-white text-xs w-4 h-4 rounded-full flex items-center justify-center">
                        @include('partials/cart_summary')
                        </span>
                    </a>
                </div>
            </div>

            <div class="text-xs space-y-1 text-gray-700">
                <p><i class="fas fa-envelope text-pink-500"></i> beautifulflower@gmail.com</p>
                <p><i class="fas fa-phone text-pink-500"></i> 0993745782</p>
                <p class="text-xs"><i class="fas fa-clock text-pink-500"></i> T2-T6: 7h30-21h30 | T7: 7h30-20h30</p>
            </div>
        </div>

        <!-- Desktop Header -->
        <div class="hidden md:flex items-center justify-between">
            <div class="flex flex-col space-y-2 text-sm text-gray-700">
                <p><i class="fas fa-envelope text-pink-500"></i> beautifulflower@gmail.com</p>
                <p><i class="fas fa-phone text-pink-500"></i> 0993745782</p>
                <p><i class="fas fa-clock text-pink-500"></i> T2 - T6: 7h30 - 21h30 | T7: 7h30 - 20h30</p>
            </div>

            <a href="/" class="flex-shrink-0">
                <img src="/Beautifulflower.jpg" alt="Logo" class="w-48">
            </a>

            <div class="flex items-center space-x-4">
                @auth
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="flex items-center bg-pink-300 p-2 rounded-lg text-white hover:bg-pink-400">
                            <img src="https://i.pravatar.cc/250?u=mail@ashallendesign.co.uk" alt="Avatar" class="w-8 h-8 rounded-full mr-2">
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                            <a href="/profile" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Thông tin tài khoản</a>
                            <a href="/settings" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Cài đặt</a>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">Đăng xuất</button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="/login" class="bg-gray-100 px-4 py-2 rounded-full hover:bg-pink-300 hover:text-white transition">
                        <i class="fas fa-sign-in-alt"></i> Đăng nhập
                    </a>
                @endauth

                <a href="/cart" class="relative hidden sm:block">
                    <div class="bg-gray-100 px-4 py-2 rounded-full hover:bg-pink-300 hover:text-white transition">
                        <i class="fas fa-shopping-bag"></i> @include('partials/cart_summary')
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Social Links -->
    <div class="container mx-auto mt-4 px-4">
        <div class="flex justify-center space-x-6 text-xl sm:text-2xl text-gray-700">
            <a href="#" class="hover:text-pink-500 transition-colors"><i class="fab fa-facebook"></i></a>
            <a href="#" class="hover:text-pink-500 transition-colors"><i class="fab fa-youtube"></i></a>
            <a href="#" class="hover:text-pink-500 transition-colors"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
</header>

<div id="content">
    @yield('content')
</div>

<footer class="bg-gray-100 py-8">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="space-y-2">
                <h3 class="text-lg font-semibold mb-4">Liên hệ</h3>
                <p class="text-sm">Địa chỉ: 123 Đường ABC,Phường MNL, Quận XYZ, TP.HCM</p>
                <p class="text-sm">Điện thoại: 0123 456 789</p>
                <p class="text-sm">Email: info@Beautifulflower.com</p>
            </div>
            <div class="space-y-2">
                <h3 class="text-lg font-semibold mb-4">Liên kết nhanh</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-sm hover:text-pink-500 transition-colors">Trang chủ</a></li>
                    <li><a href="#" class="text-sm hover:text-pink-500 transition-colors">Sản phẩm</a></li>
                    <li><a href="#" class="text-sm hover:text-pink-500 transition-colors">Giới thiệu</a></li>
                    <li><a href="#" class="text-sm hover:text-pink-500 transition-colors">Liên hệ</a></li>
                </ul>
            </div>
            <div class="space-y-2">
                <h3 class="text-lg font-semibold mb-4">Mạng xã hội</h3>
                <div class="flex flex-col space-y-2">
                    <a href="#" class="text-sm hover:text-pink-500 transition-colors"><i class="fab fa-tiktok w-6"></i> Tiktok</a>
                    <a href="#" class="text-sm hover:text-pink-500 transition-colors"><i class="fab fa-facebook w-6"></i> Facebook</a>
                    <a href="#" class="text-sm hover:text-pink-500 transition-colors"><i class="fab fa-instagram w-6"></i> Instagram</a>
                    <a href="#" class="text-sm hover:text-pink-500 transition-colors"><i class="fab fa-twitter w-6"></i> Twitter</a>
                </div>
            </div>
        </div>
        <div class="mt-8 text-center">
            <p class="text-sm text-gray-600">&copy; 2025 Flower Shop. All rights reserved.</p>
        </div>
    </div>
</footer>

<script src="//unpkg.com/alpinejs" defer></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script>
    $(document).ready(function(){
        $('.slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,  
            autoplay: true,
            autoplaySpeed: 2000,
            prevArrow: '<i class="fas fa-chevron-left slick-prev cursor-pointer absolute top-1/2 w-auto -mt-5.5 p-4 text-white font-bold text-lg transition-all duration-600 ease-linear rounded-r-md select-none hover:bg-black/80 z-10"></i>',
            nextArrow: '<i class="fas fa-chevron-right slick-next cursor-pointer absolute top-1/2 w-auto -mt-5.5 p-4 text-white font-bold text-lg transition-all duration-600 ease-linear rounded-r-md select-none right-0 rounded-l-md hover:bg-black/80"></i>',
            responsive: [
                {
                    breakpoint: 640,
                    settings: {
                        arrows: false,
                        dots: false
                    }
                }
            ]
        });
    });
</script>
</body>
</html>