<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Followings extends Component
{
    public $profile_id;

    public function render()
    {
        /* ------------------------- For Followings ------------------------------- */
        $user_id = User::where('id', '=', Auth::user()->id)->first();
        $users123 = User::all();
        $followings = 0;
        foreach ($users123 as $key => $user123) {
            $pivots123 = $user123->profiles()->where('user_id', '=', $user_id->id)->get();
            foreach ($pivots123 as $key => $p) {
                $followings++;
            }
        }
        return view('livewire.followings', compact('followings'));
    }
}
