<?php

namespace App\Http\Livewire\Admin;
use App\Models\Menu as MenuDb;
use Livewire\Component;

class Menu extends Component
{
    public $isDialogOpen = false;
    public $isDialogOpenEdit = false;
    public $menu_name_one;
    public $menu_name_edit;
    public $menu_link_edit;
    public $MenuName;
    public $MenuLink;

    protected $listeners = ['delete'];

    public function delete($id, $position){
        MenuDb::where('Position', '>', $position)->update(
            ['Position' => \DB::raw('Position - 1')]
        );
        MenuDb::find($id)->delete();
        $this->dispatchBrowserEvent('swal:deleted', [
            'type'=>'success',
            'text' => 'ลบข้อมูลสำเร็จ'
        ]);
    }

    public function editModal($id){
        $this->menu_name_one = MenuDb::find($id);
        $this->menu_name_edit = $this->menu_name_one->MenuName;
        $this->menu_link_edit = $this->menu_name_one->MenuLink;
        $this->isDialogOpenEdit = true;
    }

    public function edit($id){
        $this->validate([
            'menu_name_edit'=> 'required',
            'menu_link_edit'=> 'required'
        ]);

        $Menu = MenuDb::find($id)->update([
            'MenuName' => $this->menu_name_edit,
            'MenuLink' => $this->menu_link_edit,
        ]);

        $this->isDialogOpenEdit = false;
        $this->clearField();

        $this->dispatchBrowserEvent('swal:added', [
            'type'=>'success',
            'title'=>'สำเร็จ!',
            'text' => 'อัพเดทข้อมูลสำเร็จ'
        ]);
    }

    public function deleteConfirm($id, $position){
        $this->dispatchBrowserEvent('swal:confirm', [
            'type'=>'warning',
            'title'=>'Are you sure?',
            'text' => 'ต้องการลบข้อมูลจริงหรือไม่',
            'id' => $id,
            'position' => $position,
        ]);
    }

    public function store(){
        $this->validate(
            [
                'MenuName'=> 'required',
                'MenuLink'=> 'required',
            ]
        );

        $countMenu = MenuDb::all()->max('Position')+1;

        $newMenu = new MenuDb;
        $newMenu->MenuName = $this->MenuName;
        $newMenu->MenuLink = $this->MenuLink;
        $newMenu->Position = $countMenu;
        $newMenu->save();
        $this->isDialogOpen = false;
        $this->clearField();

        $this->dispatchBrowserEvent('swal:added', [
            'type'=>'success',
            'title'=>'สำเร็จ!',
            'text' => 'บันทึกข้อมูลสำเร็จ'
        ]);
    }

    public function clearField(){
        $this->MenuName = "";
        $this->MenuLink = "";
    }

    public function updateOrder($list){
        foreach($list as $item){
            MenuDb::find($item['value'])->update(['Position' => $item['order']]);
        }
        return redirect()->route('menu');
    }

    public function render()
    {
        return view('livewire.admin.menu',
        [
            'Menus'=> MenuDb::orderBy('Position')->get()
        ])
        ->layout('layouts/admin');;
    }
}
