<?php

namespace App\Http\Livewire\Admin;
use App\Models\Tag;
use App\Models\Anime;
use App\Models\Episode;
use App\Models\AnimeTags;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class UAnime extends Component
{
    public $Anime;
    public $Tags = "";
    public $EpisodeAdds = [

    ];
    public $Active = 0;
    public $NameAnime;
    public $EpisodeAvailable;
    public $Overview;
    public $CoverImage;
    public $CoverImageOld;
    public $PosterImage;
    public $PosterImageOld;
    public $TagAll;
    public $AnimeTags;

    protected $listeners = [
        'fileUploadCover'=> 'handleFileUploadCover',
        'fileUploadPoster'=> 'handleFileUploadPoster',
    ];

    public function handleFileUploadCover($imageData) {
        $this->CoverImage = $imageData;
    }
    public function handleFileUploadPoster($imageData) {
        $this->PosterImage = $imageData;
    }

    public function storeImage($image){
        if(!$image){
            return "";
        }
        $img_mime = explode("/",ImageManagerStatic::make($image)->mime())[1];
        $img = ImageManagerStatic::make($image)->encode($img_mime);
        $name = Str::random().'.'.$img_mime;
        Storage::disk('public')->put($name, $img);
        return $name;
    }

    public function update($id){
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

        $CoverNameImage = "";
        if($this->CoverImage){
            $CoverNameImage = $this->storeImage($this->CoverImage);
            Storage::disk('public')->delete($this->CoverImageOld);
        }else{
            $CoverNameImage = $this->CoverImageOld;
        }

        $PosterNameImage = "";
        if($this->PosterImage){
            $PosterNameImage = $this->storeImage($this->PosterImage);
            Storage::disk('public')->delete($this->PosterImageOld);
        }else{
            $PosterNameImage = $this->PosterImageOld;
        }

        $Anime = Anime::updateOrCreate(
            [
                'id' => $id
            ],[
                'AnimeName' => $this->NameAnime,
                'Active' => $this->Active,
                'EpisodeAvailable' => $this->EpisodeAvailable,
                'Overview' => $this->Overview,
                'CoverImage' => $CoverNameImage,
                'PosterImage' => $PosterNameImage,
            ]
        );

        $deleteTags = AnimeTags::where('AnimeId', $id)->delete();
        $AllTags = explode(',',$this->Tags);
        foreach($AllTags as $Tag){
            $AnimeTag = new AnimeTags;
            $AnimeTag->TagId = $Tag;
            $AnimeTag->AnimeId = $id;
            $AnimeTag->save();
        }

        foreach($this->EpisodeAdds as $Episode){
            $newEpisodeOrUpdate = Episode::updateOrCreate(
                ['id'=> $Episode['id']],
                [
                    'EpisodeName'=>$Episode['EpisodeName'],
                    'EpisodeLink'=>$Episode['EpisodeLink'],
                    'AnimeId'=>$id,
                ]
            );
        }
        $this->dispatchBrowserEvent('swal:updated', [
            'type'=>'success',
            'title'=>'สำเร็จ!!',
            'text' => 'อัพเดทข้อมูลสำเร็จ'
        ]);
    }

    public function addEpisode(){
        $this->EpisodeAdds[] = ['id'=> '','EpisodeName'=> '', 'EpisodeLink'=>''];
    }

    public function deleteEpisode($index, $id){
        unset($this->EpisodeAdds[$index]);
        $this->EpisodeAdds = array_values($this->EpisodeAdds);
        Episode::find($id)->delete();

    }

    public function mount($id){
        $this->Anime = Anime::find($id);
        $this->NameAnime = $this->Anime->AnimeName;
        $this->Active = $this->Anime->Active;
        $this->Overview = $this->Anime->Overview;
        $this->EpisodeAvailable = $this->Anime->EpisodeAvailable;
        $this->CoverImageOld = $this->Anime->CoverImage;
        $this->PosterImageOld = $this->Anime->PosterImage;
        $this->EpisodeAdds = Episode::where('AnimeId', $id)->get()->toArray();
        $this->TagAll = Tag::all();
        $this->AnimeTags = collect(AnimeTags::where('AnimeId', $id)->get())->pluck('TagId')->toArray();
    }

    public function render()
    {
        
        return view('livewire.admin.u-anime')
        ->layout('layouts/admin');
    }
}
