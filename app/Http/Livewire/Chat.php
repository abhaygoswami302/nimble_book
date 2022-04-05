<?php

namespace App\Http\Livewire;

use App\Models\Message;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Http\Request;


class Chat extends Component
{
    public $profile, $message,$count = 0, $messageCount = 0;
    public $myMessagesCount = 0,$mymessages = [];

    protected $listeners = ['messageSent' => 'mount', 'messageSent' => 'increment'];

    public function mount()
    {
        $this->mymessages = Message::where(
            [
                ['owner_id', '=', Auth::user()->id ],
                ['profile_id', '=', $this->profile->id ],
            ]
        )->get();

        $this->myMessagesCount = Message::where(
            [
                ['owner_id', '=', Auth::user()->id ],
                ['profile_id', '=', $this->profile->id ],
                ['user_id', '<>', Auth::user()->id],
                ['read_receipt', '=', null]
            ]
        )->get();

        $updateRead = Message::where(
            [
                ['owner_id', '=', Auth::user()->id ],
                ['profile_id', '=', $this->profile->id ],
                ['user_id', '<>', Auth::user()->id]
            ]
        )->get();

        foreach ($updateRead as $key => $read) {
                $read->read_receipt = Carbon::now()->toDateTimeString();
                $read->save();
        }

        $updateRead123 = Message::where(
            [
                ['owner_id', '=', Auth::user()->id ],
                ['profile_id', '=', $this->profile->id ],
                ['user_id', '=', Auth::user()->id]
            ]
        )->get();

        foreach ($updateRead123 as $key => $read123) {
                $read123->read_receipt = Carbon::now()->toDateTimeString();
                $read123->save();
        }

        $this->messageCount = count($this->myMessagesCount);
    }

    public function increment()
    {
        $this->count = $this->profile->id;
        $this->mymessages = Message::where(
            [
                ['owner_id', '=', Auth::user()->id],
                ['profile_id', '=', $this->profile->id ]
            ]
        )->get();

        $this->myMessagesCount = Message::where(
            [
                ['owner_id', '=', Auth::user()->id ],
                ['profile_id', '=', $this->profile->id ],
                ['user_id', '<>', Auth::user()->id],
                ['read_receipt', '=', null]
            ]
        )->get();
      
        $this->messageCount = count($this->myMessagesCount);
        
        return $this->mymessages;
    }

    public function saveMessage(Request $request,$profile_id)
    {
        if (!empty($this->message )) {
            
        $profile = Profile::where('id', '=', $profile_id)->first();

        $user_id = User::where('email', '=', $profile->email)->first();
        $myprofile = Profile::where('email', '=', Auth::user()->email)->first();
       
        $message = new Message();
        $message->user_id = Auth::user()->id;
        $message->profile_id = $myprofile->id;
        $message->owner_id = $user_id->id;
        $message->message = $this->message;
        $message->save();

        $message = new Message();
        $message->user_id = Auth::user()->id;
        $message->profile_id = $profile_id;
        $message->owner_id = Auth::user()->id;
        $message->message = $this->message;
        $message->save();

        $this->message = "";

        /***********************  All INCREMENT METHOD CODE **********************/
        
        $this->mymessages = Message::where(
            [
                ['owner_id', '=', Auth::user()->id],
                ['profile_id', '=', $profile_id ]
            ]
        )->get();
              
        return $this->mymessages;
    }
    }
    
    public function render()
    {
        $mymessages = [];
        return view('livewire.chat', compact('mymessages'));
    }
}
