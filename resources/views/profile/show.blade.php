@extends('layouts.app')

@section('content')
<main class="profile-page">
    <section class="relative block" style="height: 500px;">
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
    <section class="relative py-16 bg-gray-300">
      <div class="container mx-auto px-4">
                
       
        <div
          class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64"
        >
          <div class="px-6">
            
            <livewire:follow-button :profile="$profile" />
      
            <div class="text-center mt-12">
              @if(Session::has('success'))
            <div class="bg-green-100 border border-green-400 text-center text-green-700 px-4 py-3 rounded relative" role="alert">
              <strong class="font-bold">Hii! {{ $profile->name }} </strong>
              <span class="block sm:inline">{{ Session::get('success')}}</span>
              <a href="{{ route('profile.show', $profile->id) }}">
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                  <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
              </a>
            </div>
            <br>
    
            @endif
              <h3
                class=" animate-bounce  text-4xl font-semibold leading-normal mb-2 text-gray-800 mb-2"
              >
              <!--i
                  class="fas fa-smoking mr-2 text-lg text-gray-500"
                ></i-->
               {{$profile->name}}
              </h3>
              <div
                class="text-sm leading-normal mt-0 mb-2 text-gray-500 font-bold uppercase"
              >
                <i
                  class="fas fa-map-marker-alt mr-2 text-lg text-gray-500"
                ></i>
                {{ $profile->address }}
              </div>
              <div class="mb-2 text-gray-700 mt-10">
                <i class="fas fa-briefcase mr-2 text-lg text-gray-500"></i
                >{{ $profile->designation }}
              </div>
              <div class="mb-2 text-gray-700">
                <i class="fas fa-university mr-2 text-lg text-gray-500"></i
                >{{ $profile->education }}
              </div>
            </div>
            
            <div class="mt-10 py-2 text-center">
              <div class="flex flex-wrap justify-center">
                <div class="w-full lg:w-9/12 px-4">
                  <p class="mb-4 text-lg leading-relaxed text-gray-800">
                    {{ $profile->description }}
                  </p>
                  <!--a href="#pablo" class="font-normal text-pink-500"
                    >Show more</a
                  -->
                </div>
              </div>
            </div>

            <div class="mt-10 py-10 border-t border-gray-300 text-center">
                <div class="flex flex-wrap -mx-4">
                  @foreach ($photos as $photo)
                  <div class="md:w-1/3 px-4 mb-8">
                    <img class="rounded shadow-md"
                     src="{{ asset($photo->image) }}" alt="" style="width: 100%;height:300px">
                  </div>                      
                  @endforeach
                </div>
            </div>

            <div class="mt-10 py-10 border-t border-gray-300">
              <div class="flex flex-wrap -mx-4">
                @foreach ($posts as $post)
                <div class="md:w-1/3 px-2 mb-8 ">
                  <img class="rounded p-2 bg-gray-100"
                   src="{{ asset($post->image) }}" alt="" style="width: 100%;height:300px">
                   <div class="shadow-2xl p-2 bg-gray-100">
                    <span class="text-2xl py-2">{{ $post->name }}</span>
                    <p class="text-lg py-2">{{  \Illuminate\Support\Str::limit($post->description , $limit = 50, $end = '...') }}</p>
                   </div>
                </div>                      
                @endforeach
              </div>
          </div>

          </div>
        </div>
      </div>
    </section>
  </main>
@endsection