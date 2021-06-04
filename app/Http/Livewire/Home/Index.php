<?php

namespace App\Http\Livewire\Home;
use Livewire\Component;
use App\Models\Anime;

class Index extends Component
{
    public $Animes;
    public $Random;
    public function mount(){
        $this->Animes = Anime::where('Active', 1)->get();
        $this->Random = $this->Animes->random(1);
    }
    public function render()
    {
        return view('livewire.home.index');
    }
}
