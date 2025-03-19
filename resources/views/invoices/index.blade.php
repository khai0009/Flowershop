<html>
<x-header title="Quản lý hóa đơn" />
<body class="bg-gray-50">
    @if (session('success'))
        <div class="fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="max-w-7xl mx-auto px-6 py-8">

        <!-- Thanh tìm kiếm -->
        <form method="GET" action="{{ route('invoices.index') }}" class="mb-6">
            <input type="text" name="search" placeholder="Tìm theo mã HĐ hoặc SĐT khách hàng..."
                value="{{ request('search') }}"
                class="border p-2 rounded-md w-1/3 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            <button type="submit" class="ml-2 px-4 py-2 bg-indigo-600 text-white rounded-md">Tìm kiếm</button>
        </form>

        <!-- Bảng hóa đơn Đang chờ xét -->
        <h2 class="text-lg font-semibold text-yellow-600 mb-2">Đang chờ xét</h2>
        <div class="bg-white rounded-lg shadow overflow-hidden overflow-x-scroll mb-8">
            @include('invoices.partials.table', ['invoices' => $pendingInvoices])
        </div>

        <!-- Bảng hóa đơn Đã duyệt -->
        <h2 class="text-lg font-semibold text-green-600 mb-2">Đã duyệt</h2>
        <div class="bg-white rounded-lg shadow overflow-hidden overflow-x-scroll mb-8">
            @include('invoices.partials.table', ['invoices' => $approvedInvoices])
        </div>

        <!-- Bảng hóa đơn Hủy -->
        <h2 class="text-lg font-semibold text-red-600 mb-2">Hủy</h2>
        <div class="bg-white rounded-lg shadow overflow-hidden overflow-x-scroll">
            @include('invoices.partials.table', ['invoices' => $canceledInvoices])
        </div>
    </div>
</body>
</html>
