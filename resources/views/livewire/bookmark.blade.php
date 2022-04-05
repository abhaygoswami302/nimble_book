<div>
    {{-- Be like water. --}}
    @if ($flag == 0)
    <i class="far fa-bookmark p-2" style="cursor: pointer;" wire:click="bookmark({{ $photo }})" ></i>
    @else
    <i class="fas fa-bookmark p-2" style="cursor: pointer;" wire:click="bookmark({{ $photo }})" ></i>
    @endif
</div>
