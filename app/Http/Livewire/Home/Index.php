<?php

namespace App\Http\Livewire\Home;
use Livewire\Component;
use App\Models\Anime;
use App\Models\Menu as MenuDb;
use Livewire\WithPagination;
use Illuminate\Support\Arr;

class Index extends Component
{
    use WithPagination;
    public $Animes = [];
    public $Random;
    public function mount(){
        $this->Animes = Anime::where('Active', 1)->orderBy('updated_at', 'DESC')->get();
        /* dd($this->Animes); */
        /* $this->Random = Arr::random(collect($this->Animes)->toArray()['data']); */
        $this->Random = $this->Animes->Random(1);
    }
    public function render()
    {
        return view('livewire.home.index')->layout('layouts.app', [
            'ListMenu' => MenuDb::orderBy('Position')->get()
        ]);
    }
}
