<table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
        <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mã HĐ</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User ID</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Thanh toán</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Trạng thái</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ngày giao</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tổng cộng</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phương thức TT</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Địa chỉ giao</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ngày tạo</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @forelse($invoices as $invoice)
        <tr class="hover:bg-gray-100 cursor-pointer"
            onclick="window.location='{{route('invoices.show',$invoice->Mahd)}}'">
            <td class="px-6 py-4 whitespace-nowrap">{{ $invoice->Mahd }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ $invoice->user_id }}</td>

            <!-- Cột Thanh Toán -->
            <td class="px-6 py-4 whitespace-nowrap">
    <a href="{{ $invoice->Status === 'Đang chờ xét' ? '#' : route('invoices.editPayment', $invoice->Mahd) }}" 
       class="text-sm flex items-center gap-2 p-2 rounded-md border transition-all 
            
            @if ((int) $invoice->Thanhtoan === 1) border-green-500 bg-green-500 text-white hover:bg-green-600 
            @else border-red-500 bg-red-500 text-white hover:bg-red-600 
            @endif">
        @if ((int) $invoice->Thanhtoan === 1)
            <i class="fas fa-check-circle"></i>
            <p>Đã thanh toán</p>
        @else
            <i class="fas fa-times-circle"></i>
            <p>Chưa thanh toán</p>
        @endif
    </a>
</td>



            <!-- Cột Trạng Thái -->
            <td class="px-6 py-4 whitespace-nowrap">
                <a href="{{ route('invoices.editStatus', $invoice->Mahd) }}"
                   class="text-sm flex items-center gap-2 p-2 rounded-md border transition-all
                    @if ($invoice->Status === 'Đang chờ xét') border-yellow-500 text-yellow-600 hover:bg-yellow-100 
                    @elseif ($invoice->Status === 'Đã duyệt') border-green-500 text-green-600 hover:bg-green-100 
                    @else border-red-500 text-red-600 hover:bg-red-100 
                    @endif">
                    @if ($invoice->Status === 'Đang chờ xét')
                        <i class="fas fa-clock"></i>
                    @elseif ($invoice->Status === 'Đã duyệt')
                        <i class="fas fa-check-circle"></i>
                    @else
                        <i class="fas fa-times-circle"></i>
                    @endif
                    {{ $invoice->Status }}
                </a>
            </td>

            <td class="px-6 py-4 whitespace-nowrap">{{ $invoice->Ngaygiao }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ number_format($invoice->Tongcong , 0, ',', '.') . ' VND' }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ $invoice->Pttt }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ $invoice->Diachi }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ $invoice->created_at }}</td>
        </tr>
        @empty
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-center text-gray-500" colspan="9">
                    Không có hóa đơn nào.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
