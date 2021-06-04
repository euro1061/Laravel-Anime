<main>
    <div class="relative pt-28 pb-32 flex content-center items-center justify-center" style="min-height: 90vh;">
        <div class="absolute top-0 w-full h-full bg-center bg-cover"
            style='background-image: url("{{url($Anime["CoverImage"])}}");'>
            <span id="blackOverlay" class="w-full h-full absolute opacity-30 bg-black"></span>
        </div>
        <div class="container relative">
            <div class="items-center flex flex-wrap">
                <div class="w-full lg:w-9/12 px-4">
                    <div class="pr-12">
                        <h1 class="text-white font-semibold text-5xl mt-8">
                            <!-- <img src="https://occ-0-1588-64.1.nflxso.net/dnm/api/v6/LmEnxtiAuzezXBjYXPuDgfZ4zZQ/AAAABfMfqx6YXwfUVb29BqtJGpWMuKsf4YT4L9CVizVFsgHMouIwJqToFq88AX8yrFq1x9bnE8EPx0MWHwqhmFdj96DjQp3k0Njc40wxtBzcpeHCK0SodDGyunzBzfDKHghV51HdJMJTMkbItIjXbR4ppuHzUA4k0GCvdlcG-NMRqu8N6g.png?r=18a"
                                    class="w-96" alt=""> -->
                            {{$Anime['AnimeName']}}
                        </h1>
                        <div class="mt-4 text-lg text-gray-300 flex">
                            <div
                                class="p-1 bg-netflix flex flex-col rounded-md font-bold text-sm text-center text-white inline-flex">
                                <span>FULL</span>
                                <span class="text-sm">HD</span>
                            </div>
                            <h1 class="text-2xl mt-2 ml-3 text-white">หมวดหมู่ :
                                @foreach ($AnimeTags as $TagAnime)
                                {{$TagAnime->Tag->Tag_Name}}
                                @endforeach
                            </h1>
                        </div>
                        <!-- <p class="mt-3 text-white text-base bg-gray-300 p-3">
                                เรื่องราวในยุคทองของโจรสลัด โจรสลัดทุกคนมีเป้าหมายเดียวกันคือเพื่อค้นหา สมบัติที่เรียกว่า "วันพีซ" ซึ่งผู้ใดสามารถค้นหาและครอบครองวันพีซอยู่ ผู้นั้นก็คือเจ้าแห่งโจรสลัด(ราชาโจรสลัด) โดยผู้ที่เคยครอบครองวันพีซนั้นมีอยู่คนเดียวตามที่เปิดเผยคือ เจ้าแห่งโจรสลัด โกลด์ ดี โรเจอร์ ซึ่งหลังจากที่ ได้ครอบครองวันพีซแล้ว โกลด์ ดี โรเจอร์ก็ได้มอบตัว และยอมรับโทษการประหารชีวิตที่เกาะโร๊คบ้านเกิดของตน และก่อนตายโกลด์ ดี โรเจอร์ ได้ทิ้งคำพูดก่อนตายที่เปลี่ยนยุคสมัยของโจรสลัดว่า "สมบัติของฉันน่ะเหรอ อยากได้ก็เอาไปสิ ไปหาเอาเลย ฉันเอาทุกอย่างบนโลกไปไว้ที่นั่นหมดแล้ว" แล้วเหล่า โจรสลัดทั้งหลายจึงมุ่งหน้าสู่แกรนด์ไลน์เพื่อตามหาวันพีซ
                            </p> -->
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
    <div class="container py-10 mx-auto px-4 md:px-0">
        <h1 class="text-2xl font-bold text-white">{{$Anime['AnimeName']}} {{$Anime['EpisodeAvailable']}}</h1>
        <div class="flex flex-col md:flex-row mt-6">
            <div class="bg-gray-800 rounded-md shadow-xl w-full md:w-9/12 p-3">
                <div class="show_image flex flex-col md:flex-row">
                    <div style="width:60rem"><img src="{{url($Anime['PosterImage'])}}"
                            class="rounded-md w-full hidden md:block" alt=""></div>
                    <div class="md:flex-auto ml-4 text-white">เรื่องย่อ : {{$Anime['Overview']}}</div>
                </div>
                <div class="flex flex-col mt-5">
                    @foreach ($Episodes as $Episode)
                    <a href="{{route('play', [$Anime['id'], $Episode->id])}}"
                        class="w-full bg-gray-900 text-white p-3 mb-1 rounded-md hover:bg-gray-700"><i
                            class="far fa-play-circle"></i> {{$Anime['AnimeName']}} ตอนที่ {{$Episode->EpisodeName}}</a>
                    @endforeach
                </div>
            </div>
            <div class="flex-auto text-white rounded-md ml-0 md:ml-2">
                <div class="flex flex-col bg-white w-full rounded-md mt-3 md:mt-0">
                    <h1 class="p-3 bg-black rounded-t-md"><i class="fas fa-search"></i> ค้นห้า Anime</h1>
                    <div class="p-3 relative">
                        <div class="absolute left-0 w-4 mt-2 ml-5">
                            <svg class="svg-icon fill-current text-gray-300" viewBox="0 0 20 20">
                                <path
                                    d="M18.125,15.804l-4.038-4.037c0.675-1.079,1.012-2.308,1.01-3.534C15.089,4.62,12.199,1.75,8.584,1.75C4.815,1.75,1.982,4.726,2,8.286c0.021,3.577,2.908,6.549,6.578,6.549c1.241,0,2.417-0.347,3.44-0.985l4.032,4.026c0.167,0.166,0.43,0.166,0.596,0l1.479-1.478C18.292,16.234,18.292,15.968,18.125,15.804 M8.578,13.99c-3.198,0-5.716-2.593-5.733-5.71c-0.017-3.084,2.438-5.686,5.74-5.686c3.197,0,5.625,2.493,5.64,5.624C14.242,11.548,11.621,13.99,8.578,13.99 M16.349,16.981l-3.637-3.635c0.131-0.11,0.721-0.695,0.876-0.884l3.642,3.639L16.349,16.981z">
                                </path>
                            </svg>
                        </div>
                        <input class="px-4 py-1 pl-8 w-full bg-black rounded-md" placeholder="Search..." type="text"
                            wire:model="search" wire:keydown.enter="gotoSearch">
                    </div>
                </div>

                <div class="flex flex-col bg-gray-800 w-full rounded-md mt-4">
                    <h1 class="p-3 bg-black rounded-t-md"><i class="fas fa-rss-square"></i> Anime มาใหม่</h1>
                    <div class="p-3">
                        <div class="flex text-white mb-3">
                            <div><a href="#"><img class="w-56 rounded"
                                        src="https://www.anime-sugoi.com/upload/fecb4e74d3943e85e7f508b03f5b6025.jpg?v=6"
                                        alt=""></a></div>
                            <div class="ml-2 flex-auto"><a href="#">Fruits Basket The Final Season เสน่ห์สาวข้าวปั้น
                                    (ภาค3)
                                    ตอนที่ 1-7 ซับไทย ยังไม่จบ</a></div>
                        </div>
                        <div class="flex text-white mb-3">
                            <div><a href="#"><img class="w-56 rounded"
                                        src="https://www.anime-sugoi.com/upload/854186327928532e8ef2a882a5b39fd0.jpg?v=6"
                                        alt=""></a></div>
                            <div class="ml-2 flex-auto"><a href="#">Wu Shen Zhu Zai (Martial Master) ปรมาจารย์การต่อสู้
                                    ตอนที่ 1-126 ซับไทย ยังไม่จบ</a></div>
                        </div>
                        <div class="flex text-white mb-3">
                            <div><a href="#"><img class="w-56 rounded"
                                        src="https://www.anime-sugoi.com/upload/c6f46916e14174cf6ad0645a8087fc62.jpg?v=6"
                                        alt=""></a></div>
                            <div class="ml-2 flex-auto"><a href="#">Nanatsu no Taizai Season 4 ศึกตำนาน 7 อัศวิน (ภาค4)
                                    ตอนที่ 1-19 ซับไทย ยังไม่จบ</a></div>
                        </div>
                        <div class="flex text-white mb-3">
                            <div><a href="#"><img class="w-56 rounded"
                                        src="https://www.anime-sugoi.com/upload/d50a68e89ad224e3a4edd2f714824a27.jpg?v=6"
                                        alt=""></a></div>
                            <div class="ml-2 flex-auto"><a href="#">Douluo Dalu (Soul Land) ตำนานจอมยุทธ์ภูตถังซาน
                                    (ภาค1-4)
                                    ตอนที่ 1-156 ซับไทย ยังไม่จบ</a></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>