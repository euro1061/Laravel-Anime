<?php

namespace App\Http\Livewire\Home;
use App\Models\Anime;
use Livewire\Component;
use App\Models\Menu as MenuDb;

class Search extends Component
{
    public $search;
    public $listAnime = [];
    public function mount($text){
        $this->search = $text;

        $this->listAnime = Anime::where(function($subquery){
            $subquery->where('AnimeName','like', '%'.$this->search.'%');
            })->get();
    }

    public function render()
    {
        return view('livewire.home.search')->layout('layouts.app', [
            'ListMenu' => MenuDb::orderBy('Position')->get()
        ]);
    }
}
