<?php

namespace App\Http\Livewire\Anime;
use App\Models\Anime;
use App\Models\AnimeTags;
use App\Models\Menu as MenuDb;
use App\Models\Episode;
use Livewire\Component;

class Index extends Component
{
    public $Anime;
    public $search;
    public $AnimeTags;
    public $Episodes;

    public function mount($id){
        $this->Anime = Anime::find($id);
        $this->Episodes = Episode::where('AnimeId', $id)->get();
        $this->AnimeTags = AnimeTags::where('AnimeId', $id)->get();
        $this->Anime = collect($this->Anime)->merge([
            'PosterImage'=> 'storage/'.$this->Anime->PosterImage,
            'CoverImage'=> 'storage/'.$this->Anime->CoverImage
        ]);
    }

    public function gotoSearch(){
        return redirect()->route('search', $this->search);
    }

    public function render()
    {
        return view('livewire.anime.index')->layout('layouts.app', [
            'ListMenu' => MenuDb::orderBy('Position')->get()
        ]);
    }
}
