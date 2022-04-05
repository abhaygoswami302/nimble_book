<div class="grid grid-rows-3 grid-flow-col gap-4 p-2 border">
    {{-- The whole world belongs to you. --}}
    <div class="row-span-3 bg-purple-200 p-2">
        <p class="border-b-4 border-white p-2">{{ $profile->name }}</p>
    </div>
    <!-- Messages -->
    <div class="row-span-2 col-span-2 border-l pl-4">
        <div class="grid grid-cols-6 py-0 my-0 gap-4">
            <div class="col-start-1 col-span-7 bg-purple-200 p-3 "><b>{{ $profile->name }}s</b> Messages </div>
           
            @foreach ($mymessages as $message)
                @if ($message->user_id == Auth::user()->id)
                <div class="col-start-3 col-end-7 bg-purple-200 p-2 rounded-lg">{{ $message->message }}</div>               
                @else
                <div class="col-start-1 col-span-4 bg-purple-200 p-2 rounded-lg" >{{ $message->message }}</div>
                @endif
            @endforeach

            <div class="col-start-1 col-end-7  p-2 rounded-lg">
                <form action="{{ route('message.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="profile_id" value="{{ $profile->id }}">
                    <input type="text" name="message" class="w-4/5 rounded-lg p-1 border bg-pruple-200 text-purple text-xl border-purple-2">
                    <button class="p-1">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</div>
