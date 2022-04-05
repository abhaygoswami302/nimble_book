<div>
    <div class="flex bg-white gap-2 p-0 bg-purple-100">
        <div class="flex-none w-1/4 h-10 p-2 bg-purple-400" wire:click="increment">
            {{ $profile->name }}
            @if($messageCount > 0)
                <span class="animate-ping h-10 w-10 rounded-full bg-purple-400 opacity-75">
                     {{ $messageCount }}
               </span>
            @endif
        </div>
        @if (($profile->name <> $count))
        <div class="flex-grow w-3/4 p-4 h-auto bg-purple-200">
            <div class="grid grid-cols-6 gap-4"  wire:poll="increment">

                @foreach ($mymessages as $message)
                @if ($message->user_id == Auth::user()->id)
                <div class="col-start-3 col-end-7 p-2 bg-purple-400">
                    {{ $message->message }}
                    <span class="fas fa-check"></span> 
                    {{ \Carbon\Carbon::parse($message->read_receipt)->diffForHumans() }}
                </div>               
                @else
                <div class="col-start-1 col-span-4 p-2 bg-purple-400">
                    {{ $message->message }} 
                    <span class="fas fa-check-double"></span> 
                    {{ \Carbon\Carbon::parse($message->read_receipt)->diffForHumans() }}
                </div>
                @endif
                @endforeach
                
                <div class="col-start-1 col-end-7  py-2 rounded-lg">
                <form wire:submit.prevent="saveMessage({{ $profile->id }})" method="POST">
                    @csrf
                    <input type="hidden" name="profile_id" value="{{ $profile->id }}">
                    <input type="text" wire:model="message" name="message" class="w-4/5 rounded-lg p-1 border bg-pruple-200 text-purple text-xl border-purple-2">
                    <button class="p-1" type="submit"  wire:click="$emitUp('messageSent')">Send Message</button>
                </form>
                </div>
            </div>
        </div>
        @endif
      </div>
</div>
