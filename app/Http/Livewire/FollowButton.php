<?php

namespace App\Http\Livewire;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FollowButton extends Component
{
    public $profile_id , $followers;
    public $profile;
    public $toggle = 0;
 
    public function mount()
    {
        $users = User::all();
        $count = 0;
        foreach ($users as $key => $user) {
            $pivots = $user->profiles()->where('user_id', '=', '6')->get();
            foreach ($pivots as $key => $p) {
                 if($p->id == $this->profile_id){
                     return $this->toggle = 1;
                 }else{
                    return $this->toggle = 1;
                 }
            }
        }
    }

    public function toggle($id)
    {
        if($this->toggle == 0){
            auth()->user()->Profiles()->attach(Profile::where('id', '=', $id)->first());

            return $this->toggle  = 1;
        }else{
            auth()->user()->Profiles()->detach(Profile::where('id', '=', $id)->first());
            return  $this->toggle = 0;
        }
    }

 
    public function render()
    {
        /* ------------------------- For Followers ------------------------------- */
         $myfollowers = 0;
         $users = User::all();   
        foreach ($users as $key => $user) {
            $pivots = $user->profiles()->where('profile_id', '=', $this->profile->id)->get();
            foreach ($pivots as $key => $p) {
                 ++$myfollowers;
            }
        }

        

        return view('livewire.follow-button', compact('myfollowers'));
    }
}
