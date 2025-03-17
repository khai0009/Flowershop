<form action="{{ route('checkout') }}" method="POST" class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md space-y-6">
    @csrf
    <div class="space-y-2">
        <label class="block text-sm font-medium text-gray-700">Ngày giao hàng:</label>
        <input type="datetime-local" name="deliveryTime" class="mt-1 block w-full rounded-md border-pink-300 shadow-sm focus:border-pink-500 focus:ring-pink-500">
    </div>

    <div class="space-y-2">
        <label class="block text-sm font-medium text-gray-700">Địa điểm nhận hàng:</label>
        <div class="space-y-2">
            <div class="flex items-center">
                <input type="radio" name="deliveryMethod" value="tại cửa hàng" id="atStore" class="h-4 w-4 text-pink-600 focus:ring-pink-500 border-pink-300">
                <label class="ml-2 text-sm text-gray-700">Tại cửa hàng</label>
            </div>
            <div class="flex items-center">
                <input type="radio" name="deliveryMethod" value="tại nhà" id="atHome" class="h-4 w-4 text-pink-600 focus:ring-pink-500 border-pink-300">
                <label class="ml-2 text-sm text-gray-700">Tại nhà</label>
            </div>
            <div class="flex items-center">
                <input type="radio" name="deliveryMethod" value="địa chỉ khác" id="otherAddress" class="h-4 w-4 text-pink-600 focus:ring-pink-500 border-pink-300">
                <label class="ml-2 text-sm text-gray-700">Địa chỉ khác</label>
            </div>
        </div>
    </div>

    <div class="space-y-4" id="addressFields" style="display: none;">
        <input type="text" name="address" placeholder="Địa chỉ" class="mt-1 block w-full rounded-md border-pink-300 shadow-sm focus:border-pink-500 focus:ring-pink-500">
        
        <select name="city" id="city" class="mt-1 block w-full rounded-md border-pink-300 shadow-sm focus:border-pink-500 focus:ring-pink-500">
            <option value="">Chọn Thành phố/Tỉnh</option>
        </select>
        
        <select name="district" id="district" class="mt-1 block w-full rounded-md border-pink-300 shadow-sm focus:border-pink-500 focus:ring-pink-500">
            <option value="">Chọn Quận/Huyện</option>
        </select>
        
        <select name="ward" id="ward" class="mt-1 block w-full rounded-md border-pink-300 shadow-sm focus:border-pink-500 focus:ring-pink-500">
            <option value="">Chọn Phường/Xã</option>
        </select>
    </div>

    <div class="space-y-2">
        <label class="block text-sm font-medium text-gray-700">Hình thức thanh toán:</label>
        <div class="space-y-2">
            <div class="flex items-center">
                <input type="radio" name="paymentMethod" value="chuyển khoản" class="h-4 w-4 text-pink-600 focus:ring-pink-500 border-pink-300">
                <label class="ml-2 text-sm text-gray-700">Chuyển khoản</label>
                
            </div>
            <div class="flex items-center">
                <input type="radio" name="paymentMethod" value="tiền mặt" class="h-4 w-4 text-pink-600 focus:ring-pink-500 border-pink-300">
                <label class="ml-2 text-sm text-gray-700">Tiền mặt</label>
            </div>
        </div>
    </div>
<div class="pt-4 flex items-center justify-between">
    <span class="text-xl font-semibold">Tổng: <span class="text-pink-600"> @include('partials/cart_sum')</span></span>
    <button type="submit" class="bg-pink-600 text-white py-2 px-4 rounded-md hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 transition-colors">
        Thanh toán
    </button>
</div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const atStoreRadio = document.getElementById('atStore');
        const atHomeRadio = document.getElementById('atHome');
        const otherAddressRadio = document.getElementById('otherAddress');
        const addressFields = document.getElementById('addressFields');

        function toggleAddressFields() {
            if (otherAddressRadio.checked) {
                addressFields.style.display = 'block';
            } else {
                addressFields.style.display = 'none';
            }
        }

        atStoreRadio.addEventListener('change', toggleAddressFields);
        atHomeRadio.addEventListener('change', toggleAddressFields);
        otherAddressRadio.addEventListener('change', toggleAddressFields);

        toggleAddressFields(); // Initialize based on default checked state
    });
</script>