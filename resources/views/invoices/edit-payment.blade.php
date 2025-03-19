<x-header title="Cập nhật thanh toán" />
<body class="bg-gray-50 flex justify-center items-center min-h-screen">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-xl font-semibold mb-4">Cập nhật trạng thái thanh toán</h2>

        @if (session('error'))
            <div class="bg-red-500 text-white px-4 py-2 rounded mb-3">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('invoices.updatePayment', $invoice->Mahd) }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Trạng thái thanh toán</label>
                <select name="thanhtoan" class="w-full p-2 border rounded">
                    <option value="1" {{ (int) $invoice->Thanhtoan === 1 ? 'selected' : '' }}>Đã thanh toán</option>
                    <option value="0" {{ (int) $invoice->Thanhtoan === 0 ? 'selected' : '' }}>Chưa thanh toán</option>
                </select>
            </div>

            <button type="submit"
                class="w-full bg-indigo-600 text-white py-2 px-4 rounded hover:bg-indigo-700">
                Cập nhật
            </button>
        </form>
    </div>
</body>
