<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;

class CardAnime extends Component
{
    public $Anime;

    public function mount($anime){
        $this->Anime = $anime;
    }

    public function render()
    {
        return view('livewire.home.card-anime');
    }
}
