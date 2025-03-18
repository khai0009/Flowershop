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
<nav class="fixed left-0 z-50 flex flex-col justify-around h-screen bg-[#422C73]">
    <a href="#second" class="text-4xl text-white p-5 text-center"><i class="fas fa-briefcase"></i></a>
    <a href="#third" class="text-4xl text-white p-5 text-center"><i class="far fa-file"></i></a>
    <a href="#fourth" class="text-4xl text-white p-5 text-center"><i class="far fa-address-card"></i></a>
</nav>

<div class="bg-[#191919] min-h-screen font-sans">

    <section id="second" class="absolute top-0 h-screen w-0 opacity-0 transition-all ease-in duration-500 flex justify-center items-center bg-[#88BFB5]">
    <iframe src="{{route('Admin.index')}}" width="1100" height="800"></iframe>
    </section>

    <section id="third" class="absolute top-0 h-screen w-0 opacity-0 transition-all ease-in duration-500 flex justify-center items-center bg-[#F2E527]">
    <iframe src="{{route('invoices.index')}}" width="1100" height="800"></iframe>
    </section>

    <section id="fourth" class="absolute top-0 h-screen w-0 opacity-0 transition-all ease-in duration-500 flex justify-center items-center bg-[#D2A9D9]">
    <iframe src="{{route('users.index')}}" width="1100" height="800"></iframe>
    </section>
</div>

<style>
    section:target {
        opacity: 1;
        position: absolute;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 10;
    }

    section:target h1 {
        opacity: 0;
        animation: 2s fadeIn forwards .5s;
    }

    @keyframes fadeIn {
        100% {
            opacity: 1;
        }
    }
</style>
</body>
</html>