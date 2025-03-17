@extends('layouts.app')

@section('title', 'Thanh toán qua MoMo')

@section('content')
    <div class="flex justify-center p-1">
        <div class="h-full p-4 w-full max-w-md">
            <h1 class="text-3xl font-bold mb-6 text-pink-600 z-1">Thanh toán qua MoMo</h1>

            <div class="bg-white rounded-lg shadow-md p-6">
                <p class="mb-4">Vui lòng quét mã QR sau để thanh toán đơn hàng <span class="font-semibold">#{{ $orderId }}</span> với tổng số tiền:</p>
                <p class="text-xl font-semibold text-pink-600 mb-4">{{ number_format($totalPrice, 0, ',', '.') }} VNĐ</p>

                <div class="flex justify-center mb-4">
                    {!! $qrCode !!}
                </div>

                <p class="text-center text-gray-700">Sử dụng ứng dụng MoMo để quét mã QR và hoàn tất thanh toán.</p>
                <p class="text-center text-gray-700 mt-2">Sau khi thanh toán thành công, bạn sẽ được tự động chuyển hướng.</p>

                <div class="mt-6">
                    <a href="{{ route('index') }}" class="bg-pink-200 hover:bg-pink-300 text-pink-700 px-4 py-2 rounded-md inline-block">
                        Quay về trang chủ
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection