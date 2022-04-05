<?php

namespace App\Http\Livewire;

use App\Models\Like as ModelsLike;
use App\Models\Notification;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Like extends Component
{
    public $count = 0 , $photo, $mycount = 0;
 
    public function mount()
    {
        $photo12345 = Photo::where('id', '=', $this->photo)->first();
        $like12345 = ModelsLike::where('photo_id', '=', $photo12345->id)->get();
        if (empty($like12345)) {
           
        }else{
            foreach ($like12345 as $key => $value) {
                $this->mycount++;
            }
            return $this->mycount;
        }
    }

    public function increment($photo)
    {
            $check = ModelsLike::where([
                ['photo_id', '=', $photo],
                ['user_id', '=', Auth::user()->id]
            ])->first();

            if ($check) {
                $photo = Photo::where('id', '=', $photo)->first();

                $flag2 = $photo->users()->detach(Auth::user()->id);
               
               return $this->mycount--;
            }else{

                $photo = Photo::where('id', '=', $photo)->first();
                $photo->users()->attach(Auth::user()->id);
                $like123 = ModelsLike::where([
                    ['photo_id', '=', $photo->id],
                    ['user_id', '=', Auth::user()->id]
                ])->first();
               
                $like123->photo_owner_id = $photo->user_id;
                $like123->username = $photo->username;
                $like123->save();
    
                $this->mycount++;
                
                $user = User::where('id', '=', $photo->user_id)->first();
                $notification = new Notification();
                $notification->user_id = $user->id;
                $notification->message = ucfirst(Auth::user()->name) . " liked your photo.";
                $notification->photo_id = $photo->id;
                $notification->save();
                
               return $this->mycount;
            }
    }
 
    public function render()
    {
        return view('livewire.like');
    }
}
