<!DOCTYPE html>
<html>
<x-header title=""/>
<body>
<header class="bg-pink-200 py-3 shadow-md">
    <div class="container mx-auto flex items-center justify-between px-4">
        
        <div class="hidden sm:flex flex-col  space-x-4 text-lg text-gray-700">
            <p><i class="fas fa-envelope text-pink-500"></i> beautifulflower@gmail.com</p>
            <p><i class="fas fa-phone text-pink-500"></i> 0993745782</p>
            <p><i class="fas fa-clock text-pink-500"></i> T2 - T6: 7h30 - 21h30 | T7: 7h30 - 20h30</p>
        </div>

        <a href="/" class="flex items-center">
            <img src="/Beautifulflower.jpg" alt="Logo" class="w-55">
        </a>
        <div class="flex items-center space-x-4">
            @auth
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="flex items-center bg-pink-300 p-2 rounded-lg text-lg text-white hover:bg-pink-400">
                        <img src="https://i.pravatar.cc/250?u=mail@ashallendesign.co.uk" alt="Avatar" class="w-8 h-8 rounded-full mr-2">
                        <span>{{ Auth::user()->name }}</span>
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1">
                        <a href="/profile" class="block px-4 py-2 text-lg text-gray-700 hover:bg-gray-100">Thông tin tài khoản</a>
                        <a href="/settings" class="block px-4 py-2 text-lg text-gray-700 hover:bg-gray-100">Cài đặt</a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-lg text-gray-700 hover:bg-gray-100">Đăng xuất</button>
                        </form>
                    </div>
                </div>
            @else
                <a href="/login" class="text-lg bg-gray-100 px-4 py-2 rounded-full hover:bg-pink-300 hover:text-white transition">
                    <i class="fas fa-sign-in-alt"></i> Đăng nhập
                </a>
            @endauth

            <!-- Giỏ hàng -->
            <a href="/cart" class="relative">
                <div class="bg-gray-100 px-4 py-2 rounded-full text-lg hover:bg-pink-300 hover:text-white transition">
                    <i class="fas fa-shopping-bag"></i> {{ $tongQuantily }} sản phẩm
                </div>
            </a>
        </div>
    </div>

    <!-- Mạng xã hội -->
    <div class="container mx-auto mt-2 bg-pink-200 flex justify-center space-x-4 text-3xl text-gray-700">
        <a href="#" class="hover:text-pink-500"><i class="fab fa-facebook"></i></a>
        <a href="#" class="hover:text-pink-500"><i class="fab fa-youtube"></i></a>
        <a href="#" class="hover:text-pink-500"><i class="fab fa-instagram"></i></a>
    </div>
</header>

    <div id="content">
        
        @yield('content')
    </div>
    <footer class="bg-gray-100 py-8">
          <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
             
              <div>
                <h3 class="text-lg font-semibold mb-4">Liên hệ</h3>
                <p>Địa chỉ: 123 Đường ABC,Phường MNL, Quận XYZ, TP.HCM</p>
                <p>Điện thoại: 0123 456 789</p>
                <p>Email: info@Beautifulflower.com</p>
              </div>
        
          
              <div>
                <h3 class="text-lg font-semibold mb-4">Liên kết nhanh</h3>
                <ul class="space-y-2">
                  <li><a href="#" class="hover:text-blue-500">Trang chủ</a></li>
                  <li><a href="#" class="hover:text-blue-500">Sản phẩm</a></li>
                  <li><a href="#" class="hover:text-blue-500">Giới thiệu</a></li>
                  <li><a href="#" class="hover:text-blue-500">Liên hệ</a></li>
                </ul>
              </div>
       
              <div>
                <h3 class="text-lg font-semibold mb-4">Mạng xã hội</h3>
                <div class="flex space-x-4 xl:space-x-0 flex-row xl:flex-col">
                <a href="#" class="hover:text-blue-500"><i class="fab fa-tiktok"></i> Tiktok</a>
<a href="#" class="hover:text-blue-500"><i class="fab fa-facebook"></i> Facebook</a>
<a href="#" class="hover:text-blue-500"><i class="fab fa-instagram"></i> Instagram</a>
<a href="#" class="hover:text-blue-500"><i class="fab fa-twitter"></i> Twitter</a>
                </div>
              </div>
            </div>
            <div class="mt-8 text-center">
              <p>&copy; 2025 Flower Shop. All rights reserved.</p>
            </div>
          </div>
        </footer>
        <script src="//unpkg.com/alpinejs" defer></script>
        <script>
    const userDropdownButton = document.getElementById('userDropdownButton');
    const userDropdown = document.getElementById('userDropdown');

    userDropdownButton.addEventListener('click', () => {
        userDropdown.classList.toggle('hidden');
    });

    document.addEventListener('click', (event) => {
        if (!userDropdownButton.contains(event.target) && !userDropdown.contains(event.target)) {
            userDropdown.classList.add('hidden');
        }
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script>
    $(document).ready(function(){
        $('.slider').slick({
            lidesToShow: 1,
      
            slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000,
            prevArrow: '<i class="fas fa-chevron-left slick-prev cursor-pointer absolute top-1/2 w-auto -mt-5.5 p-4 text-white font-bold text-lg transition-all duration-600 ease-linear rounded-r-md select-none hover:bg-black/80 z-10"></i>',
    nextArrow: '<i class="fas fa-chevron-right slick-next cursor-pointer absolute top-1/2 w-auto -mt-5.5 p-4 text-white font-bold text-lg transition-all duration-600 ease-linear rounded-r-md select-none right-0 rounded-l-md hover:bg-black/80"></i>'
        });
});
</script>
<script>
    document.getElementById('sortSelect').addEventListener('change', function() {
        const sortValue = this.value;
        const url = "{{ route('products.index') }}"; // Lấy URL route index sản phẩm

        fetch(`${url}?sort=${sortValue}`, { // Gửi request AJAX GET
            headers: {
                'X-Requested-With': 'XMLHttpRequest' // Báo hiệu đây là AJAX request (nếu cần trong controller)
            }
        })
        .then(response => response.text())
        .then(html => {
            const tempElement = document.createElement('div'); // Tạo element tạm để parse HTML trả về
            tempElement.innerHTML = html;

            const productListHTML = tempElement.querySelector('.product-list').innerHTML; // Line 251 (approximately) // Lấy HTML danh sách sản phẩm
            const paginationHTML = tempElement.querySelector('.pagination').innerHTML; // Lấy HTML phân trang

            document.getElementById('product-list-container').innerHTML = productListHTML; // Cập nhật khu vực sản phẩm
            document.getElementById('pagination-container').innerHTML = paginationHTML; // Cập nhật phân trang

            // Cập nhật URL trình duyệt (tùy chọn, nếu muốn URL thay đổi khi sắp xếp)
            const newUrl = `${url}?sort=${sortValue}`;
            window.history.pushState({path: newUrl}, '', newUrl);

        })
        .catch(error => {
            console.error('Lỗi:', error);
            alert('Có lỗi xảy ra khi sắp xếp sản phẩm.');
        });
    });
</script>
</body>
</html>