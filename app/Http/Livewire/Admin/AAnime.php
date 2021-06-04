<?php

namespace App\Http\Livewire\Admin;
use App\Models\Tag;
use App\Models\Episode;
use App\Models\AnimeTags;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Models\Anime;
use Livewire\Component;
use Intervention\Image\ImageManagerStatic;

class AAnime extends Component
{
    use WithFileUploads;
    public $Tags = "";
    public $CoverImage;
    public $EpisodeAdds = [
        [
            'EpisodeName'=> '',
            'EpisodeLink'=>''
        ]
    ];
    public $Active = 0;
    public $NameAnime;
    public $EpisodeAvailable;
    public $Overview;
    public $PosterImage;

    /* protected $listeners = [
        'fileUploadCover'=> 'handleFileUploadCover',
        'fileUploadPoster'=> 'handleFileUploadPoster',
    ]; */

    public function addEpisode(){
        $this->EpisodeAdds[] = ['EpisodeName'=> '', 'EpisodeLink'=>''];
    }

    public function deleteEpisode($index){
        unset($this->EpisodeAdds[$index]);
        $this->EpisodeAdds = array_values($this->EpisodeAdds);
    }

    /* public function handleFileUploadCover($imageData) {
        $this->CoverImage = $imageData;
    }
    public function handleFileUploadPoster($imageData) {
        $this->PosterImage = $imageData;
    } */

    public function store(){
        $this->validate([
            'NameAnime'=>'required',
            'EpisodeAvailable'=>'required',
            'Tags'=>'required',
            'Overview'=>'required',
            'EpisodeAdds.0.EpisodeName'=>'required',
            'EpisodeAdds.0.EpisodeLink'=>'required',
            'EpisodeAdds.*.EpisodeName'=>'required',
            'EpisodeAdds.*.EpisodeLink'=>'required',
        ],
        [
            'NameAnime.required'=> 'กรุณากรอกชื่ออนิเมะ',
            'EpisodeAvailable.required'=> 'กรุณากรอกจำนวนตอน',
            'Tags.required'=> 'กรุณาเลือกอย่างน้อย 1 Tag',
            'Overview.required'=> 'กรุณาใส่เรื่องย่อ'
        ]);
        
        $Anime = new Anime;
        $Anime->Active = $this->Active;
        $Anime->AnimeName = $this->NameAnime;
        $Anime->EpisodeAvailable = $this->EpisodeAvailable;
        $Anime->Overview = $this->Overview;
        $Anime->CoverImage = $this->CoverImage->store('public');
        $Anime->PosterImage = $this->PosterImage->store('public');
        $Anime->save();
        $lastId = $Anime->id;

        $AllTags = explode(',',$this->Tags);
        foreach($AllTags as $Tag){
            $AnimeTag = new AnimeTags;
            $AnimeTag->TagId = $Tag;
            $AnimeTag->AnimeId = $lastId;
            $AnimeTag->save();
        }

        foreach($this->EpisodeAdds as $Episode){
            $newEpisode = new Episode;
            $newEpisode->AnimeId = $lastId;
            $newEpisode->EpisodeName = $Episode['EpisodeName'];
            $newEpisode->EpisodeLink = $Episode['EpisodeLink'];
            $newEpisode->save();
        }

        return redirect()->route('cAnime');
    }

    /* public function storeImage($image){
        if(!$image){
            return "";
        }
        $img_mime = explode("/",ImageManagerStatic::make($image)->mime())[1];
        $img = ImageManagerStatic::make($image)->encode($img_mime);
        $name = Str::random().'.'.$img_mime;
        Storage::disk('public')->put($name, $img);
        return $name;
    } */

    public function render()
    {
        $TagAll = Tag::all();
        return view('livewire.admin.a-anime',[
            'TagAll'=>$TagAll
        ])
        ->layout('layouts/admin');
    }
}
