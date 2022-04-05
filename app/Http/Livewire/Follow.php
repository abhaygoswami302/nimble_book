<?php

namespace App\Http\Livewire;

use App\Models\Profile;
use App\Models\profile_user;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Follow extends Component 
{
    public $profile_id;
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
        return view('livewire.follow');
    }
}
