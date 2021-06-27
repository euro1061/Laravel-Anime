<?php

namespace App\Http\Livewire\Home;
use App\Models\AnimeTags;
use Livewire\Component;
use App\Models\Menu as MenuDb;

class Tag extends Component
{
    public $TagName;
    public $TagId;

    public function mount($id){
        $this->TagId = $id;
    }

    public function render()
    {
        $listAnime = AnimeTags::where('TagId', $this->TagId)->paginate(18);
        $this->TagName = $listAnime[0]->Tag->Tag_Name;
        return view('livewire.home.tag',[
            'listAnime'=>$listAnime
        ])->layout('layouts.app', [
            'ListMenu' => MenuDb::orderBy('Position')->get()
        ]);
    }
}
