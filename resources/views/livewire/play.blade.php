<nav
    class="top-0 absolute bg-gradient-to-b from-black to-transparent z-50 w-full flex flex-wrap items-center justify-between px-2 py-3">
    <div class="container px-4 mx-auto flex flex-wrap items-center">
        <div>
            <a href="{{route('anime', $Anime['id'])}}">
                <span class="text-5xl text-netflix hover:text-white transition duration-300">
                    <i class="fas fa-arrow-circle-left"></i>
                </span>
            </a>
        </div>
        <div class="text-white ml-5">
            <span class="font-semibold">Now Playing : {{$Anime['AnimeName']}} ตอนที่ {{$Episode['EpisodeName']}}</span>
        </div>
    </div>
</nav>
<main>
    <div class="relative pt-28 pb-32 flex content-center items-center justify-center" style="min-height: 100vh;">
        <div class="absolute top-0 w-full h-full bg-center bg-cover"
            style='background-image: url("https://flevix.com/wp-content/uploads/2019/12/Barline-Loading-Images-1.gif");'>
            <iframe width="100%" height="100%" src="{{$Episode['EpisodeLink']}}" frameborder="0"
                allowfullscreen></iframe>
        </div>
    </div>
    </div>
</main>