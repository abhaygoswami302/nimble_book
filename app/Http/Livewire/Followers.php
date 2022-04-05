<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Followers extends Component
{
    public $profile_id;

    public function mount()
    {
        $users = User::all();
        $count = 0;
        foreach ($users as $key => $user) {
            $pivots = $user->profiles()->where('profile_id', '=', $this->profile_id)->get();
            foreach ($pivots as $key => $p) {
                 $count++;
            }
        }
        echo $count;
    }

    public function render()
    {
        return view('livewire.followers');
    }
}
