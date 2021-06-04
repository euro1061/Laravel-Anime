<div class="container py-10 px-3 md:px-0 mx-auto mt-20">
    <h1 class="text-4xl font-bold text-white mb-3">
        ผลการค้นหาสำหรับ : {{$search}}
        @if (count($listAnime) != 0)
            (จำนวน {{count($listAnime)}} รายการ)
        @endif
    </h1>
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-2">
        @if (count($listAnime) != 0)
            @foreach ($listAnime as $Anime)
                <livewire:home.card-anime :anime="$Anime" />
            @endforeach
        @else
            <div class="mt-10 text-white text-2xl col-span-6">ไม่พบรายการที่ต้องการ</div>
        @endif
        
    </div>
</div>