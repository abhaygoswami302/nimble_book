<?php

namespace App\Http\Livewire;

use App\Models\Bookmark as ModelsBookmark;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Bookmark extends Component
{
    public $photo , $toggle = 0, $flag = 0;

    public function mount($photo)
    {
        $check = ModelsBookmark::where([
            ['user_id', '=', Auth::user()->id],
            ['photo_owner_id', '=', $photo['id']]
        ])->get();
        if($check){
            foreach ($check as $key => $c1) {
                return $this->flag++;
            }
        }
    }

    public function bookmark($photo)
    {
            $check = ModelsBookmark::where([
                ['user_id', '=', Auth::user()->id],
                ['photo_owner_id', '=', $photo['id']]
            ])->first();
            if ($check) {
                $bookmark2 = ModelsBookmark::where('id', '=', $check->id)->first();
                $bookmark2->delete();
                return $this->flag = 0;
            }else{
                $bookmark = new ModelsBookmark();
                $bookmark->user_id = Auth::user()->id;
                $bookmark->username = Auth::user()->name;
                $bookmark->photo_owner_id = $photo['id'];
                $bookmark->owner_name = $photo['username'];
                $bookmark->image = $photo['image'];
                $bookmark->count = '1';
                $bookmark->save();
                return $this->flag++;
            }
       
    }

    public function render()
    {
        return view('livewire.bookmark');
    }
}
