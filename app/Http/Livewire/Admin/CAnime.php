<?php

namespace App\Http\Livewire\Admin;
use App\Models\Anime;
use App\Models\AnimeTags;
use Livewire\Component;

class CAnime extends Component
{
    public $search;
    public function render()
    {
        $listAnime = Anime::where(function($subquery){
            $subquery->where('AnimeName','like', '%'.$this->search.'%');
        })->latest()->paginate(6);
        /* dd($listAnime[0]->AnimeTags[1]->Tag->Tag_Name); */
        return view('livewire.admin.c-anime',[
            'Animes' => $listAnime
        ])
        ->layout('layouts/admin');
    }
}
