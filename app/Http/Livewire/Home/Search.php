<?php

namespace App\Http\Livewire\Home;
use App\Models\Anime;
use Livewire\Component;

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
        return view('livewire.home.search');
    }
}
