<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Website</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-gray-100 font-sans">
    <div class="container mx-auto max-w-4xl py-8 bg-white rounded-lg shadow-md">
        <h1 class="text-center text-3xl font-bold text-gray-800 mb-6">Danh sách các mục quản lý</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-md shadow-sm p-4 hover:shadow-lg transition duration-200 ease-in-out">
                <a href="{{route('Admin.index')}}" target="_blank" class="flex flex-col items-center text-gray-700">
                <i class="fa-solid fa-square-poll-horizontal text-4xl mb-2 text-blue-500"></i>
                    <span class="font-semibold">Danh sách sản phẩm</span>
                </a>
            </div>
            <div class="bg-white rounded-md shadow-sm p-4 hover:shadow-lg transition duration-200 ease-in-out">
                <a href="{{route('invoices.index')}}" target="_blank" class="flex flex-col items-center text-gray-700">
                    <i  class="fa-solid fa-list-check text-4xl mb-2 text-red-500"></i>
                    <span class="font-semibold">Danh sách hóa đơn</span>
                </a>
            </div>
           
            </div>
    </div>
</body>
</html>