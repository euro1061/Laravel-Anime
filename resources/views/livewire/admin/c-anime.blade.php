<div class="flex-auto bg-gray-900">
    <div class="py-6 px-3 bg-header text-2xl text-white text-center shadow-2xl">
        รายการ Anime
    </div>
    <div class="mx-4 mt-5 bg-white p-5 rounded shadow-xl">
        <div class="flex justify-between mb-5">
            <div>
                <input type="text" wire:model.debounce.300="search" placeholder="ค้นหา : ชื่ออนิเมะ" class="px-2 py-2 border border-gray-400 rounded-md bg-white shadow-xl">
            </div>
            <div>
                <a href="{{route('aAnime')}}" class="px-2 py-2 bg-blue-800 hover:bg-blue-900 text-white rounded-md">เพิ่ม ANIME</a>
            </div>
        </div>
        <div class="grid grid-cols-3 gap-2">
            @if (count($Animes) != 0)
                @foreach ($Animes as $Anime)
                <div class="flex w-full bg-gray-900 shadow-2xl rounded-sm p-2">
                    <img src="{{url('storage/'.$Anime->PosterImage)}}" class="w-2/5 p-1 rounded-md" alt="">
                    <div class="flex flex-col ml-1">
                        <h1 class="text-white line-clamp-2">
                            {{$Anime->AnimeName}}
                        </h1>
                        <div class="flex flex-col justify-end">
                            <a href="{{route('uAnime', $Anime->id)}}" class="text-center text-white mt-12 px-3 py-1 bg-yellow-500 rounded hover:bg-yellow-600"><i class="fas fa-save"></i> UPDATE</a>
                            <button class=" px-3 mt-1 py-1 bg-blue-500 text-white rounded hover:bg-blue-600"><i class="fas fa-eye"></i> VIEW</button>
                        </div>
                    </div>
                </div>
                @endforeach

                @else
                <h1 class="mt-2 text-xl">No result for : "{{$search}}"</h1>
            @endif
        </div>
        <div class="mt-5">
        {{ $Animes->links() }}
        </div>

    </div>
</div>

<script>

</script>