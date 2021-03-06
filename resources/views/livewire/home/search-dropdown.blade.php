<div class="relative" x-data="{isOpen : true}" @click.away="isOpen = false">
    <div wire:loading class="fa absolute right-3 mt-2 text-white">
        <i class="fas fa-sync fa-spin"></i>
    </div>
    <input 
        wire:keydown.enter="gotoSearch"
        wire:model.debounce.300ms="search"
        type="text" 
        class="px-4 py-1 pl-8 w-64 bg-black text-white rounded-md"
        placeholder="Search"
        @focus="isOpen = true"
        @keydown.escape.window="isOpen= false"
    >
    <div class="absolute top-0 w-4 mt-2 ml-2">
        <svg class="svg-icon fill-current text-gray-300" viewBox="0 0 20 20">
            <path
                d="M18.125,15.804l-4.038-4.037c0.675-1.079,1.012-2.308,1.01-3.534C15.089,4.62,12.199,1.75,8.584,1.75C4.815,1.75,1.982,4.726,2,8.286c0.021,3.577,2.908,6.549,6.578,6.549c1.241,0,2.417-0.347,3.44-0.985l4.032,4.026c0.167,0.166,0.43,0.166,0.596,0l1.479-1.478C18.292,16.234,18.292,15.968,18.125,15.804 M8.578,13.99c-3.198,0-5.716-2.593-5.733-5.71c-0.017-3.084,2.438-5.686,5.74-5.686c3.197,0,5.625,2.493,5.64,5.624C14.242,11.548,11.621,13.99,8.578,13.99 M16.349,16.981l-3.637-3.635c0.131-0.11,0.721-0.695,0.876-0.884l3.642,3.639L16.349,16.981z">
            </path>
        </svg>
    </div>
    @if (strlen($search) >= 2)
        <div class="absolute bg-gray-900 rounded w-64 mt-4 text-white" x-show.transition.opacity="isOpen">
            @if (count($listAnime) > 0)
                <ul>
                    @foreach ($listAnime as $index => $anime)
                        <li class="border-b border-gray-700" wire:key="{{$index}}">
                            <a href="{{route('anime', $anime->id)}}" class="block hover:bg-gray-700 px-3 py-3 flex items-center">
                            <img src="{{url('storage/'.$anime->PosterImage)}}" class="w-12" alt="">
                            <span class="ml-4">{{$anime->AnimeName}}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="px-3 py-3">
                    No result for "{{$search}}"
                </div>
            @endif
            
        </div>
    @endif
    
</div>