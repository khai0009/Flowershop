<!DOCTYPE html>
<html lang="vi">
<x-header title="Đăng ký"/>
<body>
<div class="flex items-center justify-center min-h-screen bg-pink-100">
      <Head>
        <title>Đăng ký</title>
      </Head>
      <div class="w-full max-w-md p-8 space-y-8 bg-white rounded-lg shadow">
        <h2 class="text-2xl font-bold text-center text-pink-600">Đăng ký</h2>
        <form class="mt-8 space-y-6" method="post" action="{{ route('address.store') }}"> 
        @csrf
        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Số điện thoại</label>
            <input
              maxLength="10"
              type="tel"
              required
              name="sdt" 
              id="sdt"
              class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-pink-500 focus:border-pink-500"
            />
          </div>
          <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Mật khẩu</label>
            <input
               minlength="8"
              type="password"
              required
               name="mk" 
              id="mk"
              class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-pink-500 focus:border-pink-500"
            />
            <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Email</label>
            <input
              type="email"
              required
               name="email" 
              id="email"
              class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-pink-500 focus:border-pink-500"
            />
          </div>
              <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Địa chỉ</label>
                <input
                  type="text"
                  required
                  name="diachi" 
              id="diachi"
                  class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-pink-500 focus:border-pink-500"
                />
              </div>
              <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Thành phố/Tỉnh</label>
                <select
                  required
                  class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-pink-500 focus:border-pink-500"
                  name="city" 
                  id="city"
                    
                >
                <option value="">Chọn Tỉnh/Thành phố</option>
       
                </select>
              </div>
              <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Quận/Huyện</label>
                
   
        <select name="district"  id="district"    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-pink-500 focus:border-pink-500"
        >
            <option value="">Chọn Quận/Huyện</option>
            
        </select>
   
                
              </div>
              <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Phường/Xã</label>
            
                <select
                  required
                  class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-pink-500 focus:border-pink-500"
           
                  name="ward"
                  id="ward"
                >
                  <option value="">Chọn Phường/Xã</option>
                
                </select>
            
              </div>
          
          
                  <div class="mt-4 grid">
                  <a href="/login" class="text-base text-pink-600 hover:underline">
                    Đã có tài khoản</a>
                  
                </div>  
                  <button
                    type="submit"
                    class="w-full px-4 py-2 text-white bg-pink-600 rounded-md hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500"
                  >
                    Đăng ký
                  </button>
                </form>
                <div class="mt-4 grid">
                  <a href="/" class="text-sm text-pink-600 hover:underline">
                    Quay lại
                  </a>
                  <p id="error-message" class="text-red">
                </div>
              </div>
            </div>
           <script>

function validateForm() {
    const sdt = document.getElementById('sdt').value;
    const mk = document.getElementById('mk').value;
    const diachi = document.getElementById('diachi').value;
    const city = document.getElementById('city').value;
    const district = document.getElementById('district').value;
    const ward = document.getElementById('ward').value;

    let errorMessage = '';

    if (!sdt) {
        errorMessage += 'Số điện thoại không được để trống.<br>';
    }
    if (!mk) {
        errorMessage += 'Mật khẩu không được để trống.<br>';
    }
    if (!diachi) {
        errorMessage += 'Địa chỉ không được để trống.<br>';
    }
    if (!city) {
        errorMessage += 'Vui lòng chọn thành phố.<br>';
    }
    if (!district) {
        errorMessage += 'Vui lòng chọn quận/huyện.<br>';
    }
    if (!ward) {
        errorMessage += 'Vui lòng chọn phường/xã.<br>';
    }

    const errorElement = document.getElementById('error-message');
    if (errorMessage) {
        errorElement.innerHTML = errorMessage;
        return false; // Ngăn chặn form submit
    } else {
        errorElement.innerHTML = ''; // Xóa thông báo lỗi nếu không có lỗi
        return true; // Cho phép form submit
    }
}

// Thêm sự kiện submit cho form
document.querySelector('form').addEventListener('submit', function(event) {
    if (!validateForm()) {
        event.preventDefault(); // Ngăn chặn submit nếu có lỗi
    }})
           </script>
           <script src="{{ asset('js/address.js') }}" defer></script>


          
</body>

</html>