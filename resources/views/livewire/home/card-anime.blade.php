<div class="mt-4 relative group overflow-hidden">
    <span id="blackOverlay"
        class="w-full h-full absolute z-20 group-hover:z-0 group-hover:opacity-0 transition duration-500 bg-gradient-to-t from-current"></span>
    <a href="{{route('anime', $Anime->id)}}">
        <span class="text-5xl text-netflix absolute z-10 opacity-0 group-hover:opacity-100 transition duration-500"
            style="top: 50%;left: 50%;transform: translate(-50%, -50%);">
            <i class="fas fa-play"></i>
        </span>
    </a>
    <a href="{{route('anime', $Anime->id)}}">
        <img src="{{url('storage/'.$Anime->PosterImage)}}"
            class="w-full h-full rounded-md group-hover:opacity-60 duration-500 transition ease-in-out transform group-hover:scale-110"
            alt="">
    </a>
    <span
        class="text-white text-center px-1 absolute bottom-0 bg-transparent py-2 group-hover:opacity-0 z-20 transition ease-in-out duration-500 rounded-b-md"><a
            href="{{route('anime', $Anime->id)}}">{{$Anime->AnimeName}}</a></span>

    <span
        class="absolute top-1 left-1 bg-red-600 p-1 rounded-md text-sm text-white group-hover:opacity-0 ease-in-out transition duration-500">HD</span>
</div>