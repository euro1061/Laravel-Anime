<?php

namespace App\Http\Livewire;
use App\Models\Episode;
use App\Models\Anime;
use Livewire\Component;

class Play extends Component
{
    public $Anime;
    public $Episode;

    public function mount($id, $epid){
        $this->Anime = Anime::find($id, ['id','AnimeName']);
        $this->Episode = Episode::find($epid);
    }

    public function render()
    {
        return view('livewire.play')
            ->layout('layouts/player');
    }
}
