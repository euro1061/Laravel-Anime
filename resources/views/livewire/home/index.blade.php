<main>
    <div class="relative pt-28 pb-32 flex content-center items-center justify-center" style="min-height: 90vh;">
        <div class="absolute top-0 w-full h-full bg-center bg-cover"
            style='background-image: url("{{url("storage/".$Random[0]["CoverImage"])}}");'>
            <span id="blackOverlay" class="w-full h-full absolute opacity-30 bg-black"></span>
        </div>
        <div class="container relative">
            <div class="items-center flex flex-wrap">
                <div class="w-full lg:w-7/12 px-4">
                    <div class="pr-12">
                        <h1 class="text-white font-semibold text-5xl mt-8">
                            <!-- <img src="https://occ-0-1588-64.1.nflxso.net/dnm/api/v6/LmEnxtiAuzezXBjYXPuDgfZ4zZQ/AAAABfMfqx6YXwfUVb29BqtJGpWMuKsf4YT4L9CVizVFsgHMouIwJqToFq88AX8yrFq1x9bnE8EPx0MWHwqhmFdj96DjQp3k0Njc40wxtBzcpeHCK0SodDGyunzBzfDKHghV51HdJMJTMkbItIjXbR4ppuHzUA4k0GCvdlcG-NMRqu8N6g.png?r=18a"
                                    class="w-96" alt=""> -->
                            {{$Random[0]['AnimeName']}}
                        </h1>
                        <div class="mt-4 text-lg text-gray-300 flex">
                            <div
                                class="p-1 bg-netflix flex flex-col rounded-md font-bold text-xs text-center text-white inline-flex">
                                <span>TOP</span>
                                <span class="text-sm">10</span>
                            </div>
                            <h1 class="text-2xl mt-2 ml-3 text-white">อันดับ 3 ในไทยวันนี้</h1>
                        </div>
                        <p class="mt-3 text-white text-base line-clamp-2">
                            {{$Random[0]['Overview']}}
                        </p>

                        <div class="flex mt-4">
                            <a href="{{route('anime', $Random[0]['id'])}}" class="px-8 py-2 bg-white rounded-md hover:bg-gray-300">
                                <i class="fas fa-play"></i>
                                <span class="font-semibold">เล่น</span>
                            </a>
                            <a href="{{route('anime', $Random[0]['id'])}}"
                                class="px-8 py-2 ml-4 bg-gray-500 opacity-90 rounded-md hover:opacity-100 text-white">
                                <i class="fas fa-info-circle"></i>
                                <span class="font-semibold">ข้อมูลเพิ่มเติม</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden"
            style="height: 70px;">
            <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"
                version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                <polygon class="text-bg_nf fill-current" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>
    <div class="container py-10 px-3 md:px-0 mx-auto">
        <h1 class="text-2xl font-bold text-white">มาใหม่</h1>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-2">
            @foreach ($Animes as $Anime)
            <livewire:home.card-anime :anime="$Anime" />
            @endforeach

        </div>
    </div>
</main>