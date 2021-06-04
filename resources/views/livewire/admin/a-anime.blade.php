<div class="flex-auto bg-gray-900">
    <div class="py-6 px-3 bg-header text-2xl text-white text-center shadow-2xl">
        เพิ่ม Anime
    </div>
    <div class="mx-4 mt-5 bg-white p-5 rounded shadow-xl">
        <form wire:submit.prevent="store">
            <div class="flex justify-between">
                <div></div>
                <div class="grid grid-cols-1">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">ACTIVE</label>
                    <select
                        class="py-1 px-2 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                        wire:model="Active">
                        <option value="0">OFF</option>
                        <option value="1">ON</option>
                    </select>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8">
                <div class="grid grid-cols-1">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">ชื่ออนิเมะ
                        @error('NameAnime') <small class="text-red-800">({{ $message }})</small> @enderror</label>

                    <input
                        class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                        wire:model="NameAnime" type="text" placeholder="ชื่ออนิเมะ" />

                </div>
                <div class="grid grid-cols-1">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Episode
                        Available @error('EpisodeAvailable') <small class="text-red-800">({{ $message }})</small>
                        @enderror</label>
                    <input
                        class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                        wire:model="EpisodeAvailable" type="text" placeholder="Episode Available" />
                </div>
            </div>

            <div class="grid grid-cols-1 mt-3 text-gray-500">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">แท็ก @error('Tags')
                    <small class="text-red-800">({{ $message }})</small> @enderror</label>
                <select x-cloak id="select">
                    @foreach ($TagAll as $Tag)
                    <option value="{{$Tag->id}}" selected>{{$Tag->Tag_Name}}</option>
                    @endforeach
                </select>

                <div x-data="dropdown()" x-init="loadOptions()"
                    class="w-full md:w-full flex flex-col items-center h-full">
                    <input name="values" id="values" type="hidden" x-bind:value="selectedValues()">
                    <div class="inline-block relative w-full">
                        <div class="flex flex-col items-center relative">
                            <div x-on:click="open" class="w-full">
                                <div
                                    class="my-2 p-1 flex border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent bg-white rounded">
                                    <div class="flex flex-auto flex-wrap">
                                        <template x-for="(option,index) in selected" :key="options[option].value">
                                            <div
                                                class="flex justify-center items-center m-1 font-medium py-1 px-1 bg-white rounded bg-gray-100 border">
                                                <div class="text-xs font-normal leading-none max-w-full flex-initial x-model="
                                                    options[option] x-text="options[option].text"></div>
                                                <div class="flex flex-auto flex-row-reverse">
                                                    <div x-on:click.stop="remove(index,option)">
                                                        <svg class="fill-current h-4 w-4 " role="button"
                                                            viewBox="0 0 20 20">
                                                            <path d="M14.348,14.849c-0.469,0.469-1.229,0.469-1.697,0L10,11.819l-2.651,3.029c-0.469,0.469-1.229,0.469-1.697,0
                                           c-0.469-0.469-0.469-1.229,0-1.697l2.758-3.15L5.651,6.849c-0.469-0.469-0.469-1.228,0-1.697s1.228-0.469,1.697,0L10,8.183
                                           l2.651-3.031c0.469-0.469,1.228-0.469,1.697,0s0.469,1.229,0,1.697l-2.758,3.152l2.758,3.15
                                           C14.817,13.62,14.817,14.38,14.348,14.849z" />
                                                        </svg>

                                                    </div>
                                                </div>
                                            </div>
                                        </template>
                                        <div x-show="selected.length == 0" class="flex-1">
                                            <input placeholder="Select a tags"
                                                class="bg-transparent p-1 px-2 appearance-none outline-none h-full w-full text-gray-800"
                                                x-bind:value="selectedValues()">
                                        </div>
                                    </div>
                                    <div
                                        class="text-gray-300 w-8 py-1 pl-2 pr-1 border-l flex items-center border-gray-200 svelte-1l8159u">

                                        <button type="button" x-show="isOpen() === true" x-on:click="open"
                                            class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none">
                                            <svg version="1.1" class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                                <path d="M17.418,6.109c0.272-0.268,0.709-0.268,0.979,0s0.271,0.701,0,0.969l-7.908,7.83
                c-0.27,0.268-0.707,0.268-0.979,0l-7.908-7.83c-0.27-0.268-0.27-0.701,0-0.969c0.271-0.268,0.709-0.268,0.979,0L10,13.25
                L17.418,6.109z" />
                                            </svg>

                                        </button>
                                        <button type="button" x-show="isOpen() === false" @click="close"
                                            class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none">
                                            <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                                <path d="M2.582,13.891c-0.272,0.268-0.709,0.268-0.979,0s-0.271-0.701,0-0.969l7.908-7.83
	            c0.27-0.268,0.707-0.268,0.979,0l7.908,7.83c0.27,0.268,0.27,0.701,0,0.969c-0.271,0.268-0.709,0.268-0.978,0L10,6.75L2.582,13.891z
	            " />
                                            </svg>

                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full px-4">
                                <div x-show.transition.origin.top="isOpen()"
                                    class="absolute shadow top-100 bg-white z-40 w-full left-0 rounded max-h-select"
                                    x-on:click.away="close">
                                    <div class="flex flex-col w-full overflow-y-auto h-64">
                                        <template x-for="(option,index) in options" :key="option" class="overflow-auto">
                                            <div class="cursor-pointer w-full border-gray-100 rounded-t border-b hover:bg-gray-100"
                                                @click="select(index,$event)">
                                                <div
                                                    class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative">
                                                    <div class="w-full items-center flex justify-between">
                                                        <div class="mx-2 leading-6" x-model="option"
                                                            x-text="option.text"></div>
                                                        <div x-show="option.selected">
                                                            <svg class="svg-icon" viewBox="0 0 20 20">
                                                                <path fill="none" d="M7.197,16.963H7.195c-0.204,0-0.399-0.083-0.544-0.227l-6.039-6.082c-0.3-0.302-0.297-0.788,0.003-1.087
							C0.919,9.266,1.404,9.269,1.702,9.57l5.495,5.536L18.221,4.083c0.301-0.301,0.787-0.301,1.087,0c0.301,0.3,0.301,0.787,0,1.087
							L7.741,16.738C7.596,16.882,7.401,16.963,7.197,16.963z"></path>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 mt-5">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">เรื่องย่อ
                    @error('Overview') <small class="text-red-800">({{ $message }})</small> @enderror</label>

                <textarea cols="30" rows="4"
                    class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                    placeholder="เรื่องย่อ" wire:model="Overview"></textarea>
            </div>

            <div class="grid grid-cols-4 mt-5 gap-3">
                <div>
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Cover
                        Image</label>
                    <div class='flex items-center justify-center w-full'>
                        <label
                            class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group'>
                            <div class='flex flex-col items-center justify-center pt-7'>
                                <svg class="w-10 h-10 text-purple-400 group-hover:text-purple-600" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <p
                                    class='lowercase text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>
                                    Select a photo</p>
                            </div>
                            <input type='file' class="hidden" wire:model="CoverImage" id="CoverImage" />
                        </label>
                    </div>
                </div>
                <div class="mt-5">
                    @if ($CoverImage)
                    <img src="{{$CoverImage->temporaryUrl()}}" alt="">
                    @else
                    <img src="https://i.stack.imgur.com/y9DpT.jpg" alt="" class="w-full rounded-md">
                    @endif
                </div>

                <div>
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Poster
                        Image</label>
                    <div class='flex items-center justify-center w-full'>
                        <label
                            class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group'>
                            <div class='flex flex-col items-center justify-center pt-7'>
                                <svg class="w-10 h-10 text-purple-400 group-hover:text-purple-600" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <p
                                    class='lowercase text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>
                                    Select a photo</p>
                            </div>
                            <input type='file' class="hidden" id="PosterImage"
                                wire:model="PosterImage"/>
                        </label>
                    </div>
                </div>
                <div class="mt-5">
                    @if ($PosterImage)
                    <img src="{{$PosterImage->temporaryUrl()}}" alt="">
                    @else
                    <img src="https://i.stack.imgur.com/y9DpT.jpg" alt="" class="w-full rounded-md">
                    @endif
                </div>
            </div>

            <div class="grid grid-cols-1 mt-5 p-3 bg-indigo-500 rounded-md">
                <div class="flex justify-between">
                    <label class="uppercase md:text-xl text-xs text-white text-light font-semibold">Anime Episode</label>
                    <button class="py-2 px-2 bg-yellow-600 hover:bg-yellow-700 rounded text-white" wire:click.prevent="addEpisode">+ ADD</button>
                </div>
                @foreach ($EpisodeAdds as $index => $Episode)
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-2 mt-3">
                    <div class="grid grid-cols-1">
                        <input
                            class="py-2 px-3 rounded-lg border-2 mt-1 focus:border-transparent @error('EpisodeAdds.'.$index.'.EpisodeName') border-red-500 focus:outline-none focus:ring-2 focus:ring-red-600 @else border-purple-300 focus:outline-none focus:ring-2 focus:ring-purple-600 @enderror"
                            type="text" placeholder="ตอนที่" wire:model="EpisodeAdds.{{$index}}.EpisodeName" />
                            
                    </div>
                    <div class="grid @if ($index != 0) grid-cols-7 @else grid-cols-1 @endif">
                        <input
                            class="py-2 px-3 rounded-lg border-2 mt-1
                            @error('EpisodeAdds.'.$index.'.EpisodeName') border-red-500 focus:outline-none focus:ring-2 focus:ring-red-600 @else border-purple-300 focus:outline-none focus:ring-2 focus:ring-purple-600 @enderror
                            focus:border-transparent @if ($index != 0)
                                col-span-6
                            @endif"
                            type="text" placeholder="Video Url" wire:model="EpisodeAdds.{{$index}}.EpisodeLink" />
                        @if ($index != 0)
                            <button wire:click="deleteEpisode({{$index}})" type="button" class="bg-red-600 text-white rounded">X</button>
                        @endif
                    </div>
                </div>
                @endforeach

            </div>

            <div class="mt-5" x-data="{}">
                <button @click="getTags()" type="submit"
                    class="px-2 py-3 bg-blue-800 hover:bg-blue-900 rounded-md w-full text-white">SAVE</button>
            </div>
        </form>
    </div>
</div>

<script>
/* window.livewire.on('fileChoosenCover', postId => {
    let inputField = document.getElementById('CoverImage')
    let file = inputField.files[0]

    let reader = new FileReader();
    reader.onloadend = () => {
        window.livewire.emit('fileUploadCover', reader.result)
    }

    reader.readAsDataURL(file)
})

window.livewire.on('fileChoosenPoster', postId => {
    let inputField = document.getElementById('PosterImage')
    let file = inputField.files[0]

    let reader = new FileReader();
    reader.onloadend = () => {
        window.livewire.emit('fileUploadPoster', reader.result)
    }

    reader.readAsDataURL(file)
}) */

function getTags() {
    let Tags = document.getElementById("values").value;
    @this.set('Tags', Tags);
}

function dropdown() {
    return {
        options: [],
        selected: [],
        show: false,
        open() {
            this.show = true
        },
        close() {
            this.show = false
        },
        isOpen() {
            return this.show === true
        },
        select(index, event) {

            if (!this.options[index].selected) {
                this.options[index].selected = true;
                this.options[index].element = event.target;
                this.selected.push(index);
            } else {
                this.selected.splice(this.selected.lastIndexOf(index), 1);
                this.options[index].selected = false
            }
        },
        remove(index, option) {
            this.options[option].selected = false;
            this.selected.splice(index, 1);


        },
        loadOptions() {

            const options = document.getElementById('select').options;
            for (let i = 0; i < options.length; i++) {
                this.options.push({
                    value: options[i].value,
                    text: options[i].innerText,
                    selected: options[i].getAttribute('selected') != null ? options[i].getAttribute(
                        'selected') : false
                });
            }
        },
        selectedValues() {
            return this.selected.map((option) => {
                return this.options[option].value;
            })
        }
    }
}
</script>