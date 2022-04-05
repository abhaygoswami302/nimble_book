<div>
    <i class="( {{ $count }} == 1) ? far fa-heart : fas fa-heart  p-2 text-red-500"  
    wire:click="increment({{ $photo }})" 
    style="cursor:pointer"></i>
    <small style="font-family: Roboto"> <b>{{ $mycount }}</b> likes</small>    
</div> 
