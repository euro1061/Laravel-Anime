<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @livewireStyles
    @livewireScripts

</head>

<body class="bg-white antialiased font-body">
    <div class="flex min-w-full min-h-screen">
        <div class="w-72 bg-header_bg shadow-xl">
            <div class="py-6 px-3 bg-indigo-700 w-72 text-2xl text-white text-center shadow-2xl">
                <a href="#">
                    <span class="text-yellow-500 text-semibold">
                        <i class="fab fa-accusoft"></i>
                    </span>
                    Dashboard Control
                </a>
            </div>
            <div class="flex justify-center bg-gradient-to-r from-yellow-400 via-red-500 to-pink-500 h-36">
                <img src="https://images3.alphacoders.com/811/thumb-350-811579.jpg" class="w-full object-cover" alt="">
            </div>
            <div class="flex flex-col mt-3 text-white w-full">
                <h1 class="font-light text-center w-full">V 1.0.0 Build 1</h1>
                <h1 class="font-semibold text-center w-full">ระบบจัดการอนิเมะ VIP</h1>
            </div>
            <a href="{{route('admin')}}" class="flex mt-2 py-3 px-5 transition duration-400 group {{ (request()->is('admin')) ? 'bg-blue-700 hover:bg-blue-700' : 'hover:bg-gray-900' }}">
                <span class="{{ (request()->is('admin')) ? 'text-white' : 'text-gray-400' }} text-xl group-hover:text-white">
                    <i class="fas fa-cubes"></i>
                </span>
                <h1 class="{{ (request()->is('admin')) ? 'text-white' : 'text-gray-400' }} ml-4 font-light group-hover:text-white">ภาพรวมระบบ</h1>
            </a>
            <div class="flex mt-3 py-3 px-5 bg-gray-900 border-l-4 border-blue-700 transition duration-400 group">
                <span class="text-white text-xl">
                    <img src="{{url('storage/gundam.svg')}}" class="w-7" alt="">
                </span>
                <h1 class="text-white text-xl ml-4 font-bold font-light">Anime</h1>
            </div>
            <a href="{{route('cAnime')}}" class="flex pl-10 py-2 px-5 transition duration-400 group {{ (request()->is('admin/anime')) || (request()->is('admin/anime/add')) || (request()->is('admin/anime/update/*')) ? 'bg-blue-700 hover:bg-blue-700' : 'hover:bg-gray-900' }}">
                <span class="{{ (request()->is('admin/anime')) || (request()->is('admin/anime/add')) || (request()->is('admin/anime/update/*')) ? 'text-white' : 'text-gray-400' }} text-xl group-hover:text-white">
                    <i class="fas fa-play-circle"></i>
                </span>
                <h1 class="{{ (request()->is('admin/anime')) || (request()->is('admin/anime/add')) || (request()->is('admin/anime/update/*')) ? 'text-white' : 'text-gray-400' }} ml-4 font-light group-hover:text-white">จัดการอนิเมะ</h1>
            </a>
            <a href="{{route('tags')}}" class="flex py-2 pl-10 px-5 transition duration-400 group {{ (request()->is('admin/tags')) ? 'bg-blue-700 hover:bg-blue-700' : 'hover:bg-gray-900' }}">
                <span class="{{ (request()->is('admin/tags')) ? 'text-white' : 'text-gray-400' }} text-xl group-hover:text-white">
                    <i class="fas fa-list"></i>
                </span>
                <h1 class="{{ (request()->is('admin/tags')) ? 'text-white' : 'text-gray-400' }} ml-4 font-light group-hover:text-white">จัดการแท็ก</h1>
            </a>
            <div class="flex py-3 px-5 bg-gray-900 border-l-4 border-blue-700 transition duration-400 group">
                <span class="text-white text-xl">
                    <img src="{{url('storage/settings.svg')}}" class="w-7" alt="">
                </span>
                <h1 class="text-white text-xl ml-4 font-bold font-light">Setting</h1>
            </div>
            <a href="{{route('menu')}}" class="flex pl-10 py-2 px-5 transition duration-400 group {{(request()->is('admin/menu')) ? 'bg-blue-700 hover:bg-blue-700' : 'hover:bg-gray-900' }}">
                <span class="{{ (request()->is('admin/menu')) ? 'text-white' : 'text-gray-400' }} text-xl group-hover:text-white">
                    <i class="fab fa-elementor"></i>
                </span>
                <h1 class="{{ (request()->is('admin/menu')) ? 'text-white' : 'text-gray-400' }} ml-4 font-light group-hover:text-white">เมนูหน้าเว็บ</h1>
            </a>
            <!-- <a href="#" class="flex py-3 px-5 hover:bg-gray-900 transition duration-400 group">
                <span class="text-white text-xl group-hover:text-gray-400">
                    <i class="fas fa-cog"></i>
                </span>
                <h1 class="text-white ml-4 font-light group-hover:text-gray-400">การตั้งค่า</h1>
            </a> -->
            <livewire:admin.logout />
        </div>
        {{$slot}}
    </div>
    <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>

</body>
</html>