<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\User;
use Livewire\Component;

class PostsCount extends Component
{
    public $profile, $postCount;

    public function mount()
    {
        $user = User::where('email', '=', $this->profile->email)->first();
        $this->postCount = Post::where('user_id', '=', $user->id)->get();
        echo count($this->postCount);
    }
    public function render()
    {
        return view('livewire.posts-count')->with('postCount' , $this->postCount);
    }
}
