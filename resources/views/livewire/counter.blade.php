<div>
    <div class="flex justify-around">
        <i class="fas fa-comment p-2" wire:click="increment" style="cursor: pointer;"></i>
    <livewire:bookmark :photo="$photo" />
    </div>
    @if ($count > 0)
    <div>
        <form action="{{ route('comment.store') }}"  method="post">
            @csrf
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <input type="text" name="comment" class="shadow appearance-none my-2  border border-gray-500 rounded text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">
            <input type="submit" value="Add Comment" class="bg-opacity-0 hover:bg-opacity-6 text-gray-500  py-1 px-2 rounded focus:outline-none focus:shadow-outline">
        </form>
    </div>
    @endif

    @if ($comment_count > 0)

    <div class="row-end-1 col-end-7 w-full p-6" >
       <div class="w-full">
        @foreach ($comments as $comment)
           <b>Diksha :</b> {{ $comment->comment }} <br>
        @endforeach
       </div>
    </div>
           
    @endif
 
</div>

