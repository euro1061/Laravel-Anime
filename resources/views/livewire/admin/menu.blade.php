<div class="flex-auto bg-gray-900">
    <div class="py-6 px-3 bg-indigo-700 text-2xl text-white text-center shadow-2xl">
        จัดการเมนูหน้าเว็บ
    </div>
    <div class="mx-4 mt-5 bg-white p-5 rounded shadow-xl" x-data="{ 'isDialogOpen': @entangle('isDialogOpen') }"
        @keydown.escape="isDialogOpen = false">
        <div class="flex justify-between items-center">
            <h1 class="text-xl font-semibold mb-4">เมนูหน้าเว็บ</h1>
            <button @click="isDialogOpen = true" class="px-2 rounded py-2 bg-blue-800 text-white hover:bg-blue-900"><i
                    class="fas fa-plus-circle"></i> ADD</button>
        </div>

        <div class="overflow-auto" style="background-color: rgba(0,0,0,0.5)" x-show="isDialogOpen"
            :class="{ 'absolute inset-0 z-10 flex items-start justify-center': isDialogOpen }">
            <!-- dialog -->
            <div class="bg-white rounded shadow-2xl m-4 sm:m-8" x-show="isDialogOpen"
                @click.away="$set('isDialogOpen', false)">
                <div class="flex justify-between items-center border-b p-3 text-xl">
                    <h6 class="text-xl font-bold">เพิ่มเมนู</h6>
                    <button type="button" @click="isDialogOpen = false">
                        <span>✖</span>
                    </button>

                </div>
                <div class="p-2">
                    <!-- content -->
                    <h4 class="font-bold">
                        <div class="mb-4 w-96">
                            <form wire:submit.prevent="store">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="MenuName">
                                    ชื่อเมนู
                                </label>
                                <input
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    wire:model.lazy="MenuName"
                                    id="MenuName" type="text" placeholder="ชื่อเมนู">
                                @error('MenuName') <small class="text-red-500 mt-2">{{$message}}</small> @enderror

                                <label class="block mt-3 text-gray-700 text-sm font-bold mb-2" for="MenuLink">
                                    ลิงค์
                                </label>
                                <input
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="MenuLink" wire:model="MenuLink" type="text" placeholder="Link">
                                @error('MenuLink') <small class="text-red-500 mt-2">{{$message}}</small> @enderror

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
        <div wire:sortable="updateOrder">
        @foreach ($Menus as $index => $Menu)
            <div wire:sortable.handle wire:sortable.item="{{ $Menu->id }}" class="cursor-move mt-1 rounded bg-gray-900 shadow-xl p-4 flex justify-between items-center text-white" wire:key="task-{{$index}}">
                <h1 class="">#{{$index+1}} : {{$Menu->MenuName}}</h1>
                <div>
                    <button class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600"
                        x-on:click="$wire.editModal({{$Menu->id}})"><i class="fas fa-eye"></i> EDIT</button>
                    <button class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600"
                        wire:click="deleteConfirm({{$Menu->id}}, {{$Menu->Position}})"><i class="fas fa-eye"></i>
                        DELETE</button>
                </div>
            </div>
        @endforeach
        </div>
        
        

        <div x-data="{ 'isDialogOpen': @entangle('isDialogOpenEdit') }" @keydown.escape="$set('isDialogOpen', false)">
            <div class="overflow-auto" style="background-color: rgba(0,0,0,0.5)" x-show="isDialogOpen"
                :class="{ 'absolute inset-0 z-10 flex items-start justify-center': isDialogOpen }">
                <!-- dialog -->
                @if ($menu_name_one)
                <div class="bg-white rounded shadow-2xl m-4 sm:m-8" x-show="isDialogOpen"
                    @click.away="$set('isDialogOpen', false)">
                    <div class="flex justify-between items-center border-b p-3 text-xl">
                        <h6 class="text-xl font-bold">แก้ไขเมนู</h6>
                        <button type="button" @click="isDialogOpen = false">
                            <span>✖</span>
                        </button>

                    </div>
                    <div class="p-2">
                        <!-- content -->
                        <h4 class="font-bold">
                            <div class="mb-4 w-96">
                                <form wire:submit.prevent="edit({{$menu_name_one->id}})">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="menu_name_edit">
                                        ชื่อเมนู
                                    </label>
                                    <input wire:model.lazy="menu_name_edit"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="menu_name_edit" type="text" placeholder="ชื่อเมนู">

                                    @error('menu_name_edit') <small class="text-red-500 mt-2">{{$message}}</small>
                                    @enderror

                                    <label class="block mt-3 text-gray-700 text-sm font-bold mb-2" for="menu_link_edit">
                                        ลิงค์
                                    </label>
                                    <input wire:model.lazy="menu_link_edit"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="menu_link_edit" type="text" placeholder="Link">

                                    @error('menu_link_edit') <small class="text-red-500 mt-2">{{$message}}</small>
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
                            </div>
                        </h4>

                    </div>
                </div><!-- /dialog -->
                @endif
                
            </div><!-- /overlay -->
        </div>

    </div>
</div>

<script>
const Toast = Swal.mixin({
    toast: true,
    position: 'bottom-end',
    showConfirmButton: false,
    timer: 1000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

window.addEventListener('swal:deleted', event => {
    Toast.fire({
        icon: event.detail.type,
        title: event.detail.text
    })
});

window.addEventListener('swal:added', event => {
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
            window.livewire.emit('delete', event.detail.id, event.detail.position);
        }
    })
});
</script>