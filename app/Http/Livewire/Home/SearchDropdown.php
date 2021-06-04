<?php

namespace App\Http\Livewire\Home;
use App\Models\Anime;
use Livewire\Component;

class SearchDropdown extends Component
{
    public $search;

    public function gotoSearch(){
        return redirect()->route('search', $this->search);
    }

    public function render()
    {
        $searchAnime = [];
        if(strlen($this->search) >= 2){
            $searchAnime = Anime::where(function($subquery){
                $subquery->where('AnimeName','like', '%'.$this->search.'%');
                })->limit(5)->get();
        }
        return view('livewire.home.search-dropdown',[
            'listAnime' => $searchAnime
        ]);
    }
}
