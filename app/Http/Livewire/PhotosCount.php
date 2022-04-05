<?php

namespace App\Http\Livewire;

use App\Models\Photo;
use App\Models\Profile;
use App\Models\User;
use Livewire\Component;

class PhotosCount extends Component
{
    public $profile, $photoCount;

    public function mount()
    {
        $user = User::where('email', '=', $this->profile->email)->first();
        $this->photoCount = Photo::where('user_id', '=', $user->id)->get();
        echo count($this->photoCount);
    }
    public function render()
    {
        return view('livewire.photos-count')->with('photoCount' , $this->photoCount);
    }
}
