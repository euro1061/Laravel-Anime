<div class="flex-auto bg-gray-900">
    <div class="py-6 px-3 bg-indigo-700 text-2xl text-white text-center shadow-2xl">
        รายการ Anime
    </div>
    <div class="mx-4 mt-5 bg-white p-5 rounded shadow-xl">
        <div class="flex justify-between mb-5">
            <div>
                <input type="text" wire:model.debounce.300ms="search" placeholder="ค้นหา : ชื่ออนิเมะ"
                    class="px-2 py-2 border border-gray-400 rounded-md bg-white shadow-xl">
            </div>
            <div>
                <a href="{{route('aAnime')}}"
                    class="px-2 py-2 bg-blue-800 hover:bg-blue-900 text-white rounded-md">เพิ่ม ANIME</a>
            </div>
        </div>
        <div class="mt-1">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            ชื่ออนิเมะ
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            หมวดหมู่
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            สถานะ
                                        </th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($Animes as $index => $Anime)
                                    <tr wire:key="{{$index}}">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-20 w-20">
                                                    <img class="h-20 w-20 rounded-full"
                                                        src="{{url('storage/'.$Anime->PosterImage)}}"
                                                        alt="">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                    {{$Anime->AnimeName}}
                                                    </div>
                                                    <div class="text-sm text-gray-500">
                                                        {{$Anime->EpisodeAvailable}}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">แท็กอนิเมะ</div>
                                            <div class="text-sm text-gray-500">
                                            @foreach ($Anime->AnimeTags as $listTag)
                                                <span>{{$listTag->Tag->Tag_Name}}@if (!$loop->last),@endif
                                                </span>
                                            @endforeach
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if ($Anime->Active == 1)
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                publish
                                            </span>
                                            @else
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-600 text-white">
                                                unpublish
                                            </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{route('uAnime', $Anime->id)}}" class="text-white px-2 py-2 bg-yellow-400 hover:text-indigo-900 rounded-md">Edit</a>
                                            <a target="_blank" href="{{route('anime', $Anime->id)}}" class="text-white px-2 py-2 bg-blue-400 hover:text-indigo-900 rounded-md">View</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    

                                    <!-- More people... -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            

        </div>
        <div class="mt-5">
            {{ $Animes->links() }}
        </div>

    </div>
</div>

<script>

</script>