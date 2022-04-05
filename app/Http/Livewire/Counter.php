<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;
use Illuminate\Http\Request;

class Counter extends Component
{
    public $count = 0 , $comment_count = 0, $photo;
 
    public function increment()
    {
        $this->count++;
    }

    public function comment()
    {
        $this->comment_count++;
    }

   /* public function submit(Request $request, $id)
    {
        Comment::create(array_merge($request->except('user_id'), ['user_id' => $id]));
    }*/
 
    public function render()
    {
        $comments = Comment::orderBy('created_at', 'DESC')->get();
        
        return view('livewire.counter', compact('comments'));
    }
}
