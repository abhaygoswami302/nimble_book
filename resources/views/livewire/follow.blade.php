<div>
    <button  wire:click="toggle({{ $profile_id }})"
        class="bg-pink-500 active:bg-pink-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1"
        type="button"
        style="transition: all 0.15s ease 0s;" >
        {{ $toggle ? 'Unfollow' : 'Follow' }}
    </button>
</div>
