<div>
    {{-- Success is as dangerous as failure. --}}
    <div class="flex flex-wrap justify-center">
        <div
          class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center"
        >
          <div class="relative">
            <img
              alt="..."
              src="https://source.unsplash.com/random/1280x720"
              class="shadow-xl rounded-lg h-auto align-middle absolute  -m-16  -ml-20 lg:-ml-16"
              style="max-width: 150px;background-color:transparent"
            />
          </div>
        </div>
        <div
          class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center"
        >
          <div class="py-6 px-3 mt-32 sm:mt-0">
            @if ($profile->name == 'Abhay Goswami')
            <a href="{{ route('profile.create') }}">
              <button
              class="bg-pink-500 active:bg-pink-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1"
              type="button"
              style="transition: all 0.15s ease 0s;"
            >
              Create
            </button>
            </a>
            @else
              @if ($profile->email == Auth::user()->email)
                <a href="{{ route('profile.edit', $profile->id) }}">
                  <button
                  class="bg-pink-500 active:bg-pink-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1"
                  type="button"
                  style="transition: all 0.15s ease 0s;" >
                  Edit
                </button>
                </a>
              @else
              <a href="#">
                <!--livewire:follow :profile_id="$profile->id"-->
                    <div>
                        <button  wire:click="toggle({{ $profile->id }})"
                            class="bg-pink-500 active:bg-pink-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1"
                            type="button"
                            style="transition: all 0.15s ease 0s;" >
                            {{ $toggle ? 'Unfollow' : 'Follow' }}
                        </button>
                    </div>
              </a>
              @endif
            @endif
          </div>
        </div>
        <div class="w-full lg:w-4/12 px-4 lg:order-1">
          <div class="flex justify-center py-4 lg:pt-4 pt-8">
            <div class="mr-4 p-3 text-center">
              <span
                class="text-xl font-bold block uppercase tracking-wide text-gray-700"
                > <!--livewire:followers :profile_id="$profile->id"-->
                {{ $myfollowers }}
                </span
              ><span class="text-sm text-gray-500">Followers</span>
            </div>
            <div class="mr-4 p-3 text-center">
              <span
                class="text-xl font-bold block uppercase tracking-wide text-gray-700"
                > <livewire:followings :profile_id="$profile->id">
                </span
              ><span class="text-sm text-gray-500">Followings</span>
            </div>
            <div class="lg:mr-4 p-3 text-center">
              <span
                class="text-xl font-bold block uppercase tracking-wide text-gray-700"
                ><livewire:photos-count :profile="$profile"/></span
              ><span class="text-sm text-gray-500">Photos</span>
            </div>
            <div class="lg:mr-4 p-3 text-center">
              <span
                class="text-xl font-bold block uppercase tracking-wide text-gray-700"
                ><livewire:posts-count :profile="$profile"/></span
              ><span class="text-sm text-gray-500">Posts</span>
            </div>
          </div>
        </div>
      </div>
</div>
