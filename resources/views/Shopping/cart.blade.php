@extends('layouts.app')

@section('title', 'Giỏ hàng')

@section('content')
    <div class="flex justify-center p-1">
    <div class="h-full p-4 w-full">
        <h1 class="text-3xl font-bold mb-6 text-pink-600 z-1">Giỏ hàng</h1>
        <a href="/" class="bg-pink-200 hover:bg-pink-300 text-pink-700 px-4 py-2 rounded-md inline-block mb-5">
            Tiếp tục mua sắm
        </a>
        <div class="flex flex-col lg:flex-row">
            <div class="overflow-x-auto w-full lg:w-[70%] overflow-y-auto">
            <div class="max-h-[600px] overflow-y-auto space-y-4">
    @foreach ($cartItems as $item)
        <div class="flex items-center border border-pink-200 rounded-lg shadow-md p-4">
            <div class="w-24 h-24 rounded-md overflow-hidden shadow-md mr-4">
                @if ($item->product && $item->product->hinhanh)
                    <img src="{{ resizeImage($item->product->hinhanh, 175, 300) }}" class="object-cover w-full h-full" alt="<?php echo $item->product->tenhoa?>">
                @else
                    Không có hình ảnh
                @endif
            </div>

            <div class="flex-grow">
                <h2 class="text-lg font-semibold text-pink-600">{{ $item->product->tenhoa }}</h2>
                <div class="flex items-center mt-2">
                    <form action="{{ route('update.quantity') }}" method="POST" class="flex items-center">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $item->product->id }}">
                        <input type="number" name="quantilylocal" value="{{ $item->quantilylocal }}" class="w-16 border rounded p-2 border-pink-300 focus:ring-pink-500 mr-2" min="1">
                        <button type="submit" class="hidden"></button>
                    </form>
                    <span class="text-gray-600">x {{ $item->product->gia }}</span>
                </div>
                <p class="mt-2 font-semibold text-pink-700">{{ $item->product->gia * $item->quantilylocal }} VNĐ</p>
            </div>

            <form action="{{ route('remove.from.cart') }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="product_id" value="{{ $item->product->id }}">
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md shadow-md transition-colors duration-200">
                    Xóa
                </button>
            </form>
        </div>
    @endforeach
</div>
            </div>
            <div class="bg-white border-2 border-pink-50 lg:w-[30%] w-full">
            @include('Shopping.orderForm')
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/address.js') }}" defer></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    const otherAddressRadio = document.getElementById('other_address');
    const addressFields = document.getElementById('address_fields');

    if (otherAddressRadio && addressFields) {
        otherAddressRadio.addEventListener('change', function() {
            if (this.checked) {
                addressFields.classList.remove('hidden');
            } else {
                addressFields.classList.add('hidden');
            }
        });

        // Ensure initial state based on radio button selection
        if (otherAddressRadio.checked) {
            addressFields.classList.remove('hidden');
        } else {
            addressFields.classList.add('hidden');
        }
    }

    // Assuming you have address data loaded into variables like:
    // let provinces = [...];
    // let districts = [...];
    // let wards = [...];
    // And you have select elements with IDs: province, district, ward.

    const provinceSelect = document.getElementById('province');
    const districtSelect = document.getElementById('district');
    const wardSelect = document.getElementById('ward');

    if (provinceSelect && districtSelect && wardSelect) {

      provinceSelect.addEventListener('change', function() {
          const selectedProvinceId = this.value;
          districtSelect.innerHTML = '<option value="">Chọn quận/huyện</option>';
          wardSelect.innerHTML = '<option value="">Chọn phường/xã</option>';

          if (selectedProvinceId) {
              const filteredDistricts = districts.filter(district => district.province_id == selectedProvinceId);
              filteredDistricts.forEach(district => {
                  const option = document.createElement('option');
                  option.value = district.id;
                  option.textContent = district.name;
                  districtSelect.appendChild(option);
              });
          }
      });

      districtSelect.addEventListener('change', function() {
          const selectedDistrictId = this.value;
          wardSelect.innerHTML = '<option value="">Chọn phường/xã</option>';

          if (selectedDistrictId) {
              const filteredWards = wards.filter(ward => ward.district_id == selectedDistrictId);
              filteredWards.forEach(ward => {
                  const option = document.createElement('option');
                  option.value = ward.id;
                  option.textContent = ward.name;
                  wardSelect.appendChild(option);
              });
          }
      });
    }
});
</script>
@endsection