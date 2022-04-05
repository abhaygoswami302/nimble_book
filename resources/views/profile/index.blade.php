@extends('layouts.app')

@section('content')
<main>
    <div
      class="relative pt-16 pb-32 flex content-center items-center justify-center"
      style="min-height: 75vh;"
    >
      <div
        class="absolute top-0 w-full h-full bg-center bg-cover"
        style='background-image: url("https://images.unsplash.com/photo-1557804506-669a67965ba0?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=1267&amp;q=80");'
      >
        <span
          id="blackOverlay"
          class="w-full h-full absolute opacity-75 bg-black"
        ></span>
      </div>
      <div class="container relative mx-auto">
        <div class="items-center flex flex-wrap">
          <div class="w-full lg:w-6/12 px-4 ml-auto mr-auto text-center">
            <div class="pr-12">
              <h1 class="text-white font-semibold text-5xl">
                Nimble Technocrats
              </h1>
              <p class="mt-4 text-lg text-gray-300">
               View All Profiles
              </p>
            </div>
          </div>
        </div>
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
    </div>
    <section class="pb-20 bg-gray-300 -mt-24">
      <div class="container mx-auto px-4">
        
        @include('partials.alert')
        <!----------------------------- First Row ------------------------------->

        <div class="flex flex-wrap">
          @foreach ($profiles as $key => $profile)
          @if ($key == 0 || $key == 3 || $key == 6 || $key == 9 || $key == 12 || $key == 15 || $key == 18 || $key == 21 || $key == 24 )
          <div class="lg:pt-12 pt-6 w-full md:w-4/12 px-4 text-center">
            <div
              class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg"
            >
              <div class="px-4 py-5 flex-auto">
                <a href="{{ route('profile.show', $profile->id ) }}">
                    <div
                    class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-red-400"
                    >
                        <i class="fas fa-user-alt"></i>
                    </div>
                </a>
                <a href="{{ route('profile.show', $profile->id) }}">
                  <h6 class="text-xl font-semibold">{{ $profile->name }}</h6>
                </a>
                <p class="mt-2 mb-4 text-gray-600">
                    {{ $profile->description }}
                </p>
              </div>
            </div>
          </div>
          @endif
          @if ($key == 1 || $key == 4 || $key == 7 || $key == 10 || $key == 13 || $key == 16 || $key == 19 || $key == 22 || $key == 25 )
          <div class="w-full md:w-4/12 px-4 text-center">
            <div
              class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg"
            >
              <div class="px-4 py-5 flex-auto">
                <a href="{{ route('profile.show', $profile->id ) }}">
                    <div
                    class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-blue-400"
                    >
                    <i class="fas fa-user-alt"></i>
                    </div>
                </a>
                <a href="{{ route('profile.show', $profile->id) }}">
                  <h6 class="text-xl font-semibold">{{ $profile->name }}</h6>
                </a>                
                <p class="mt-2 mb-4 text-gray-600">
                  {{ $profile->description }}
                </p>
              </div>
            </div>
          </div>
          @endif
          @if ($key == 2 || $key == 5 || $key == 8 || $key == 11 || $key == 14 || $key == 17 || $key ==  20 || $key == 23 || $key == 26)
          <div class="pt-6 w-full md:w-4/12 px-4 text-center">
            <div
              class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg"
            >
              <div class="px-4 py-5 flex-auto">
                <a href="{{ route('profile.show', $profile->id) }}">
                    <div
                    class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-green-400"
                    >
                    <i class="fas fa-user-alt"></i>
                    </div>
                </a>
                <a href="{{ route('profile.show', $profile->id) }}">
                  <h6 class="text-xl font-semibold">{{ $profile->name }}</h6>
                </a>              
                <p class="mt-2 mb-4 text-gray-600">
                  {{ $profile->description }}
                </p>
              </div>
            </div>
          </div>
          @endif
        @endforeach

        </div>
    </div>
    </section>
  </main>
@endsection