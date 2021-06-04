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
            <div class="py-6 px-3 bg-header w-72 text-2xl text-white text-center shadow-2xl">
                <a href="#">
                    <span class="text-yellow-500 text-semibold">
                        <i class="fab fa-accusoft"></i>
                    </span>
                    Dashboard Control
                </a>
            </div>
            <a href="{{route('admin')}}" class="flex py-3 px-5 hover:bg-gray-900 transition duration-400 group {{ (request()->is('admin')) ? 'bg-menu' : '' }}">
                <span class="text-white text-xl group-hover:text-gray-400">
                    <i class="fas fa-cubes"></i>
                </span>
                <h1 class="text-white ml-4 font-light group-hover:text-gray-400">ภาพรวมระบบ</h1>
            </a>
            <a href="{{route('cAnime')}}" class="flex py-3 px-5 hover:bg-gray-900 transition duration-400 group {{ (request()->is('admin/anime')) ? 'bg-menu' : '' }}">
                <span class="text-white text-xl group-hover:text-gray-400">
                    <i class="fas fa-play-circle"></i>
                </span>
                <h1 class="text-white ml-4 font-light group-hover:text-gray-400">อนิเมะ</h1>
            </a>
            <a href="{{route('tags')}}" class="flex py-3 px-5 hover:bg-gray-900 transition duration-400 group {{ (request()->is('admin/tags')) ? 'bg-menu' : '' }}">
                <span class="text-white text-xl group-hover:text-gray-400">
                    <i class="fas fa-list"></i>
                </span>
                <h1 class="text-white ml-4 font-light group-hover:text-gray-400">แท็ก</h1>
            </a>
            <a href="#" class="flex py-3 px-5 hover:bg-gray-900 transition duration-400 group">
                <span class="text-white text-xl group-hover:text-gray-400">
                    <i class="fas fa-cog"></i>
                </span>
                <h1 class="text-white ml-4 font-light group-hover:text-gray-400">การตั้งค่า</h1>
            </a>
            <livewire:admin.logout />
        </div>
        {{$slot}}
    </div>
</body>
</html>