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
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Big+Shoulders:opsz,wght@10..72,100&family=DM+Serif+Text:ital@0;1&family=Roboto&family=Trocchi&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
      .dm-serif-text-regular-italic {
  font-family: "DM Serif Text", serif;
  font-weight: 400;
  font-style: italic;
}
      body {
        font-family: "Roboto", sans-serif;
  font-optical-sizing: auto;
  font-weight: 400;
  font-style: normal;
  font-variation-settings:
    "wdth" 100;
}
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
<header class="relative h-[300px] overflow-hidden bg-cover bg-[50%]" style="background-image: url('/pink_flower_4k.jpg');">
  <div class="absolute inset-0 z-10 flex items-center justify-center">
    <div class="text-center text-white border-5 border-white p-2 px-12 bg-black/20">
      <h1 class="text-4xl font-bold">Beautifulflower</h1>
      <i class="mt-[-0.5em]">Vườn hoa trong nhà bạn</i>
    </div>
  </div>
  <div class="absolute inset-0 bg-gray-900 bg-cover bg-center blur-lg opacity-0" id="overlay"></div>
</header>
<section class="bg-pink-900 py-3 shadow-md" id="nav">
    <div class="container mx-auto px-4">
        <div class="flex  items-center justify-between w-full">


        <!-- Desktop Header -->
        <div class=" flex flex-row items-center justify-between w-full">
            <!-- Contact Info -->
            <div class="flex flex-col md:flex-row space-x-8 md:text-xl text-xs text-white">
                <a href="/" class="flex flex-row text-pink-300 dm-serif-text-regular-italic"><img src="/favicon.ico" width="20" height="20" /> BEATIFULFLOWER </a>
                <span><i class="fas fa-envelope"></i> beautifulflower@gmail.com</span>
                <span><i class="fas fa-phone"></i> 0993745782</span>
                <span><i class="fas fa-clock"></i> T2-T6: 7h30-21h30 | T7: 7h30-20h30</span>
            </div>

            <!-- User and Cart -->
            <div class="flex  flex-col md:flex-row items-center space-x-4">
                @auth
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="flex items-center bg-pink-500 px-4 py-2 rounded-lg text-white hover:bg-pink-400">
                            <img src="https://i.pravatar.cc/250?u=mail@ashallendesign.co.uk" alt="Avatar" class="w-8 h-8 rounded-full mr-2">
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-2 z-50">
                            <a href="/profile" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Thông tin tài khoản</a>
                            <a href="/settings" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Cài đặt</a>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">Đăng xuất</button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="/login" class="flex justify-center bg-gray-100 px-4 py-2 rounded-3xl hover:bg-pink-700 hover:text-white transition">
                        <i class="fas fa-sign-in-alt m-auto mr-2"></i> Đăng nhập
                    </a>
                @endauth

                <a href="/cart" class="relative bg-gray-100 px-3 py-1.5 rounded-full text-sm hover:bg-pink-700 hover:text-white transition">
                        <i class="fas fa-shopping-bag"></i>
                        <span class="absolute -top-1 -right-1 bg-pink-500 text-white text-xs w-4 h-4 rounded-full flex items-center justify-center">
                        @include('partials/cart_summary')
                        </span>
                    </a>
            </div>
        </div>
    </div>
    
    <!-- Social Links -->
    <div class="container mx-auto mt-4 px-4">
        <div class="flex justify-center space-x-6 text-xl sm:text-2xl text-gray-700">
            <a href="#" class="hover:text-pink-500  0 transition-colors"><i class="fab fa-facebook"></i></a>
            <a href="#" class="hover:text-pink-500 transition-colors"><i class="fab fa-youtube"></i></a>
            <a href="#" class="hover:text-pink-500 transition-colors"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
    </section>

<div id="content">
    @yield('content')
</div>

<footer class="bg-pink-900">
  <div class="max-w-screen-xl px-4 pt-16 pb-6 mx-auto sm:px-6 lg:px-8 lg:pt-24">
    <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
      <div>
        <div class="flex justify-center text-pink-300 sm:justify-start ">
        
          <svg
            class="h-8 w-64 p-0"
            viewBox="0 0 118 24"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <text x="0" y="20" fill="currentColor" font-size="20" font-weight="bold">Beautifulflower</text>
          </svg>
          <span class="ml-2 text-pink-300">2025</span>
        </div>

        <p class="max-w-md mx-auto mt-6 leading-relaxed text-center text-gray-400 sm:max-w-xs sm:mx-0 sm:text-left">
          Chào mừng đến với trang web của chúng tôi. Chúng tôi cung cấp những bông hoa đẹp nhất.
        </p>

        <ul class="flex justify-center gap-6 mt-8 md:gap-8 sm:justify-start">
          <li>
            <a href="/" rel="noopener noreferrer" target="_blank" class="text-pink-500 transition hover:text-pink-500/75">
              <span class="sr-only">Facebook</span>
              <i class="fab fa-facebook-f w-6 h-6"></i>
            </a>
          </li>

          <li>
            <a href="/" rel="noopener noreferrer" target="_blank" class="text-pink-500 transition hover:text-pink-500/75">
              <span class="sr-only">Instagram</span>
              <i class="fab fa-instagram w-6 h-6"></i>
            </a>
          </li>

          <li>
            <a href="/" rel="noopener noreferrer" target="_blank" class="text-pink-500 transition hover:text-pink-500/75">
              <span class="sr-only">Twitter</span>
              <i class="fab fa-twitter w-6 h-6"></i>
            </a>
          </li>

          <li>
            <a href="/" rel="noopener noreferrer" target="_blank" class="text-pink-500 transition hover:text-pink-500/75">
              <span class="sr-only">GitHub</span>
              <i class="fab fa-github w-6 h-6"></i>
            </a>
          </li>

          <li>
            <a href="/" rel="noopener noreferrer" target="_blank" class="text-pink-500 transition hover:text-pink-500/75">
              <span class="sr-only">Dribbble</span>
              <i class="fab fa-dribbble w-6 h-6"></i>
            </a>
          </li>
        </ul>
      </div>

      <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:col-span-2 md:grid-cols-4">
        <div class="text-center sm:text-left">
          <p class="text-lg font-medium text-white">Về chúng tôi</p>

          <nav class="mt-8">
            <ul class="space-y-4 text-sm">
              <li>
                <a class="text-white transition hover:text-white/75" href="/">
                  Lịch sử công ty
                </a>
              </li>

              <li>
                <a class="text-white transition hover:text-white/75" href="/">
                  Gặp gỡ đội ngũ
                </a>
              </li>

              <li>
                <a class="text-white transition hover:text-white/75" href="/">
                  Sổ tay nhân viên
                </a>
              </li>

              <li>
                <a class="text-white transition hover:text-white/75" href="/">
                  Tuyển dụng
                </a>
              </li>
            </ul>
          </nav>
        </div>

        <div class="text-center sm:text-left">
          <p class="text-lg font-medium text-white">Dịch vụ của chúng tôi</p>

          <nav class="mt-8">
            <ul class="space-y-4 text-sm">
              <li>
                <a class="text-white transition hover:text-white/75" href="/">
                  Bán hoa tươi
                </a>
              </li>

              <li>
                <a class="text-white transition hover:text-white/75" href="/">
                  Thiết kế hoa
                </a>
              </li>

              <li>
                <a class="text-white transition hover:text-white/75" href="/">
                  Giao hoa tận nơi
                </a>
              </li>

              <li>
                <a class="text-white transition hover:text-white/75" href="/">
                  Tư vấn hoa
                </a>
              </li>
            </ul>
          </nav>
        </div>

        <div class="text-center sm:text-left">
          <p class="text-lg font-medium text-white">Liên kết hữu ích</p>

          <nav class="mt-8">
            <ul class="space-y-4 text-sm">
              <li>
                <a class="text-white transition hover:text-white/75" href="/">
                  Câu hỏi thường gặp
                </a>
              </li>

              <li>
                <a class="text-white transition hover:text-white/75" href="/">
                  Hỗ trợ
                </a>
              </li>

              <li>
                <a class="flex group justify-center sm:justify-start gap-1.5" href="/">
                  <span class="text-white transition group-hover:text-white/75">
                    Trò chuyện trực tiếp
                  </span>

                  <span class="relative flex w-2 h-2 -mr-2">
                    <span class="absolute inline-flex w-full h-full bg-pink-400 rounded-full opacity-75 animate-ping"></span>
                    <span class="relative inline-flex w-2 h-2 bg-pink-500 rounded-full"></span>
                  </span>
                </a>
              </li>
            </ul>
          </nav>
        </div>

        <div class="text-center sm:text-left">
          <p class="text-lg font-medium text-white">Liên hệ với chúng tôi</p>

          <ul class="mt-8 space-y-4 text-sm">
            <li>
              <a class="flex items-center justify-center sm:justify-start gap-1.5 group" href="/">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>

                <span class="text-white transition group-hover:text-white/75">
                  info@beautifulflower.com
                </span>
              </a>
            </li>

            <li>
              <a class="flex items-center justify-center sm:justify-start gap-1.5 group" href="/">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a 1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>

                <span class="text-white transition group-hover:text-white/75">
                  +1 555 123 4567
                </span>
              </a>
            </li>

            <li>
              <a class="flex items-center justify-center sm:justify-start gap-1.5 group" href="/">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>

                <span class="text-white transition group-hover:text-white/75">
                  123 Đường Hoa, Thành phố
                </span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="pt-6 mt-12 border-t border-pink-700">
      <div class="text-center sm:flex sm:justify-between sm:text-left">
        <p class="text-sm text-gray-400">
          <span class="block sm:inline">© 2025 Beautifulflower.</span>
          <span class="block sm:inline">All rights reserved.</span>
        </p>

        <ul class="flex justify-center mt-4 space-x-4 text-sm sm:mt-0">
          <li>
            <a class="text-gray-400 transition hover:text-gray-400/75" href="/"> Terms & Conditions </a>
          </li>

          <li>
            <a class="text-gray-400 transition hover:text-gray-400/75" href="/"> Privacy Policy </a>
          </li>
        </ul>
      </div>
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
        $('.slidercart').slick({
            slidesToShow: 4,
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
  const content = document.querySelector('header .absolute');
  const overlay = document.getElementById('overlay');
  const nav = document.getElementById('nav');
  let wHeight = window.innerHeight;

  window.addEventListener('resize', function() {
    wHeight = window.innerHeight;
  });

  function update() {
    const currentScrollY = window.scrollY;

    const slowScroll = currentScrollY / 2;
    const blurScroll = currentScrollY * 2;
    const opaScroll = 1.4 - currentScrollY / 400;

    if (currentScrollY > wHeight) {
      nav.classList.add('fixed-nav');
    } else {
      nav.classList.remove('fixed-nav');
    }

    content.style.transform = `translateY(${slowScroll}px)`;
    content.style.opacity = opaScroll;

    overlay.style.opacity = blurScroll / wHeight;
  }

  window.addEventListener('scroll', update);

  overlay.style.backgroundImage = window.getComputedStyle(document.querySelector('header')).backgroundImage;
});
</script>
</body>
</html>