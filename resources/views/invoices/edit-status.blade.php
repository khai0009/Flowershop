<html>
<x-header title="Cập nhật trạng thái hóa đơn" />
<body class="bg-gray-50">
@if (session('error'))
    <div class="bg-red-500 text-white px-4 py-2 rounded-md mb-4">
        {!! session('error') !!}
    </div>
@endif
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-6 rounded-lg shadow-md w-[400px]">
            <h2 class="text-xl font-semibold text-gray-900 mb-4">Cập nhật trạng thái hóa đơn</h2>
            <form method="POST" action="{{ route('invoices.updateStatus', $invoice->Mahd) }}">
                @csrf
                <label class="block text-gray-700 font-medium mb-2">Trạng thái:</label>
                <select name="status" class="w-full px-3 py-2 border rounded-md">
                    <option value="Đang chờ xét" {{ $invoice->Status == 'Đang chờ xét' ? 'selected' : '' }}>Đang chờ xét</option>
                    <option value="Đã duyệt" {{ $invoice->Status == 'Đã duyệt' ? 'selected' : '' }}>Đã duyệt</option>
                    <option value="Hủy" {{ $invoice->Status == 'Hủy' ? 'selected' : '' }}>Hủy</option>
                </select>
                <div class="mt-4 flex justify-end gap-2">
                    <a href="{{ route('invoices.index') }}" class="px-4 py-2 bg-gray-100 rounded-md">Hủy</a>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Lưu</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
