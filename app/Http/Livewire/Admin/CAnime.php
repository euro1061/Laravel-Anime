<?php

namespace App\Http\Livewire\Admin;
use App\Models\Anime;
use Livewire\Component;

class CAnime extends Component
{
    public $search;
    public function render()
    {
        return view('livewire.admin.c-anime',[
            'Animes' => Anime::where(function($subquery){
                $subquery->where('AnimeName','like', '%'.$this->search.'%');
            })->latest()->paginate(6)
        ])
        ->layout('layouts/admin');
    }
}
