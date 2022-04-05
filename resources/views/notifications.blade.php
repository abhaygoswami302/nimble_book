@extends('layouts.app')

@section('content')
<main class="profile-page">
    <section class="relative block" style="height: 400px;">
      <div
        class="absolute top-0 w-full h-full bg-center bg-cover"
        style='background-image: url("https://images.unsplash.com/photo-1499336315816-097655dcfbda?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=2710&amp;q=80");'
      >
        <span
          id="blackOverlay"
          class="w-full h-full absolute opacity-50 bg-black"
        ></span>
      </div>
      <div
        class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden"
        style="height: 70px;"
      >
        <svg
          class="absolute bottom-0 overflow-hidden"
          xmlns="http://www.w3.org/2000/svg"
          preserveAspectRatio="none"
          version="1.1"
          viewBox="0 0 2560 100"
          x="0"
          y="0"
        >
          <polygon
            class="text-gray-300 fill-current"
            points="2560 0 2560 100 0 100"
          ></polygon>
        </svg>
      </div>
    </section>
    <section class="relative py-15 bg-gray-300">
      <div class="container ml-60 px-4">
       
        <div
          class="relative flex flex-col min-w-0 break-words bg-white  w-full md:w-4/5 mb-40 shadow-xl rounded-lg -mt-64"
        >
        <div class="bg-purple-300 w-60 h-10">
          <div class="mix-blend-multiply text-center bg-transparent w-full h-5 p-2">
            All Notifications
          </div>
        </div>
          <div class="px-6 p-10">
              @foreach ($notifications as $notification)    
                     
                    <div class="flex flex-wrap justify-around bg-purple-200 p-2 mb-2">
                      <div class="text-left">{{ $notification->message }} </div>
                      @if ($notification->post_id <> null)
                      <div><a class="animate-pulse w-20 h-20"
                         href="{{ route('post.show', $notification->post_id) }}">View Post</a></div>
                      @endif
                      @if ($notification->photo_id <> null)
                      <div><a class="animate-pulse w-20 h-20"
                         href="{{ route('photo.show', $notification->photo_id) }}">View Photo</a></div>
                      @endif
                      <div class="font-semibold text-right">{{ $notification->updated_at->diffForHumans() }}</div>
                      <div class="font-semibold text-right">
                        <form action="{{ route('notifications.destroy', $notification->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit">
                            <i class="fas fa-trash"></i>
                          </button>
                        </form>
                      </div>
                    </div>

              @endforeach            
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection