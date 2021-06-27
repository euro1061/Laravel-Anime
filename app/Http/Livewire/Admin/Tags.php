<?php

namespace App\Http\Livewire\Admin;
use App\Models\Tag;
use RealRashid\SweetAlert\Facades\Alert;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Tags extends Component
{
    public $tag_name;
    public $tag_name_edit;
    public $tag_name_one;
    public $search = "";
    public $isDialogOpen = false;
    public $isDialogOpenEdit = false;

    protected $listeners = ['delete'];

    public function store(){
        $this->validate([
            'tag_name'=> 'required'
        ]);

        $tag = new Tag;
        $tag->Tag_Name = $this->tag_name;
        $tag->save();

        $this->tag_name = "";
        $this->search = "";
        $this->isDialogOpen = false;

        $this->dispatchBrowserEvent('swal:added', [
            'type'=>'success',
            'title'=>'สำเร็จ!',
            'text' => 'บันทึกข้อมูลสำเร็จ'
        ]);
    }
    
    public function edit($id){
        $this->validate([
            'tag_name_edit'=> 'required'
        ]);

        $tag = Tag::find($id)->update([
            'Tag_Name' => $this->tag_name_edit
        ]);

        $this->isDialogOpenEdit = false;
        $this->search = "";
        $this->dispatchBrowserEvent('swal:added', [
            'type'=>'success',
            'title'=>'สำเร็จ!',
            'text' => 'อัพเดทข้อมูลสำเร็จ'
        ]);
    }

    public function editModal($id){
        $this->tag_name_one = Tag::find($id);
        $this->tag_name_edit = $this->tag_name_one->Tag_Name;
        $this->isDialogOpenEdit = true;
    }

    public function deleteConfirm($id){
        $this->dispatchBrowserEvent('swal:confirm', [
            'type'=>'warning',
            'title'=>'Are you sure?',
            'text' => 'ต้องการลบข้อมูลจริงหรือไม่',
            'id' => $id
        ]);
    }

    public function delete($id){
        $Tag = Tag::find($id)->delete();
        $this->dispatchBrowserEvent('swal:deleted', [
            'type'=>'success',
            'text' => 'ลบข้อมูลสำเร็จ'
        ]);
        $this->search = "";
    }

    public function mount(){

    }

    public function render()
    {
        return view('livewire.admin.tags',[
            'AllTagsSearch' => Tag::where(function($subquery){
                $subquery->where('Tag_Name','like', '%'.$this->search.'%');
            })->paginate(15)
        ])
        ->layout('layouts/admin');
    }
}
