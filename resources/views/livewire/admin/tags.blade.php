<div class="flex-auto bg-gray-900">
    <div class="py-6 px-3 bg-header text-2xl text-white text-center shadow-2xl">
        จัดการ Tags ของ Anime
    </div>
    <div class="mx-4 mt-5 bg-white p-5 rounded shadow-xl" x-data="{ 'isDialogOpen': @entangle('isDialogOpen') }"
        @keydown.escape="isDialogOpen = false">
        <div class="overflow-auto" style="background-color: rgba(0,0,0,0.5)" x-show="isDialogOpen"
            :class="{ 'absolute inset-0 z-10 flex items-start justify-center': isDialogOpen }">
            <!-- dialog -->
            <div class="bg-white rounded shadow-2xl m-4 sm:m-8" x-show="isDialogOpen"
                @click.away="$set('isDialogOpen', false)">
                <div class="flex justify-between items-center border-b p-3 text-xl">
                    <h6 class="text-xl font-bold">เพิ่ม Tags</h6>
                    <button type="button" @click="isDialogOpen = false">
                        <span>✖</span>
                    </button>

                </div>
                <div class="p-2">
                    <!-- content -->
                    <h4 class="font-bold">
                        <div class="mb-4 w-96">
                            <form wire:submit.prevent="store">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="tag_name">
                                    เพิ่ม Tag
                                </label>
                                <input wire:model.lazy="tag_name"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="tag_name" type="text" placeholder="Tag Name">
                                @error('tag_name') <small class="text-red-500 mt-2">{{$message}}</small> @enderror
                                <button
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mt-3 rounded focus:outline-none focus:shadow-outline w-full"
                                    type="submit">
                                    <span wire:loading.remove wire:target="store">SAVE</span>
                                    <span wire:loading wire:target="store">
                                        <i class="fas fa-circle-notch fa-spin"></i>
                                    </span>
                                </button>
                            </form>
                        </div>
                    </h4>

                </div>
            </div><!-- /dialog -->
        </div><!-- /overlay -->

        <div class="flex justify-between items-center">
            <h1 class="text-xl font-semibold mb-4">Tag ของอนิเมะ</h1>
            @if ($AllTagsSearch)
            <div class="flex">
                <div class="relative mr-3">
                    <div class="absolute left-0 w-4 mt-3 ml-2">
                        <svg class="svg-icon fill-current text-gray-300" viewBox="0 0 20 20">
                            <path
                                d="M18.125,15.804l-4.038-4.037c0.675-1.079,1.012-2.308,1.01-3.534C15.089,4.62,12.199,1.75,8.584,1.75C4.815,1.75,1.982,4.726,2,8.286c0.021,3.577,2.908,6.549,6.578,6.549c1.241,0,2.417-0.347,3.44-0.985l4.032,4.026c0.167,0.166,0.43,0.166,0.596,0l1.479-1.478C18.292,16.234,18.292,15.968,18.125,15.804 M8.578,13.99c-3.198,0-5.716-2.593-5.733-5.71c-0.017-3.084,2.438-5.686,5.74-5.686c3.197,0,5.625,2.493,5.64,5.624C14.242,11.548,11.621,13.99,8.578,13.99 M16.349,16.981l-3.637-3.635c0.131-0.11,0.721-0.695,0.876-0.884l3.642,3.639L16.349,16.981z">
                            </path>
                        </svg>
                    </div>
                    <input type="text" class="text-white px-4 py-2 pl-8 w-full bg-black rounded-md" wire:model.debounce.300ms="search"
                        placeholder="Search...">
                </div>
                <button @click="isDialogOpen = true"
                    class="px-2 rounded py-2 bg-blue-800 text-white hover:bg-blue-900"><i
                        class="fas fa-plus-circle"></i> ADD</button>
            </div>
            @endif
        </div>

        <div x-data="{ 'isDialogOpen': @entangle('isDialogOpenEdit') }" @keydown.escape="$set('isDialogOpen', false)">
            <div class="overflow-auto" style="background-color: rgba(0,0,0,0.5)" x-show="isDialogOpen"
                :class="{ 'absolute inset-0 z-10 flex items-start justify-center': isDialogOpen }">
                <!-- dialog -->
                <div class="bg-white rounded shadow-2xl m-4 sm:m-8" x-show="isDialogOpen"
                    @click.away="$set('isDialogOpen', false)">
                    <div class="flex justify-between items-center border-b p-3 text-xl">
                        <h6 class="text-xl font-bold">แก้ไข Tags</h6>
                        <button type="button" @click="isDialogOpen = false">
                            <span>✖</span>
                        </button>

                    </div>
                    <div class="p-2">
                        <!-- content -->
                        <h4 class="font-bold">
                            <div class="mb-4 w-96">
                                @if ($tag_name_one)
                                <form wire:submit.prevent="edit({{$tag_name_one->id}})">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="tag_name_edit">
                                        แก้ไข Tag
                                    </label>
                                    <input wire:model.lazy="tag_name_edit"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="tag_name_edit" type="text" placeholder="Tag Name">

                                    @error('tag_name_edit') <small class="text-red-500 mt-2">{{$message}}</small>
                                    @enderror
                                    <button
                                        class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 mt-3 rounded focus:outline-none focus:shadow-outline w-full"
                                        type="submit">
                                        <span wire:loading.remove wire:target="edit">UPDATE</span>
                                        <span wire:loading wire:target="edit">
                                            <i class="fas fa-circle-notch fa-spin"></i>
                                        </span>
                                    </button>
                                </form>
                                @endif
                            </div>
                        </h4>

                    </div>
                </div><!-- /dialog -->
            </div><!-- /overlay -->
            @foreach ($AllTagsSearch as $Tag)
            <div class="mt-1 rounded bg-gray-900 shadow-xl p-4 flex justify-between items-center text-white">

                <h1>หมวดหมู่ : {{$Tag->Tag_Name}}</h1>
                <div>
                    <button class='px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600'
                        x-on:click="$wire.editModal({{$Tag->id}})"><i class="fas fa-eye"></i> EDIT</button>
                    <button class='px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600'
                        wire:click="deleteConfirm({{$Tag->id}})"><i class="fas fa-eye"></i>
                        DELETE</button>
                    <button class='px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600'><i
                            class="fas fa-eye"></i>
                        VIEW</button>
                </div>
            </div>
            

            @endforeach
        </div>

    </div>
</div>

<script>
const Toast = Swal.mixin({
    toast: true,
    position: 'bottom-end',
    showConfirmButton: false,
    timer: 2000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})



window.addEventListener('swal:added', event => {
    Toast.fire({
        icon: event.detail.type,
        title: event.detail.text
    })
});

window.addEventListener('swal:deleted', event => {
    Toast.fire({
        icon: event.detail.type,
        title: event.detail.text
    })
});


window.addEventListener('swal:confirm', event => {
    Swal.fire({
        title: event.detail.title,
        icon: event.detail.type,
        showCancelButton: true,
        confirmButtonText: `Save`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            window.livewire.emit('delete', event.detail.id);
        }
    })
});
</script>