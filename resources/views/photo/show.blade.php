@extends('layouts.app')

@section('content')
<main class="profile-page">
    <section class="relative block" style="height: 400px;">
      <div
        class="absolute top-0 w-full h-full bg-center bg-cover"
        style='background-image: url("https://images.unsplash.com/photo-1499336315816-097655dcfbda?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=2710&amp;q=80");'>
        <span id="blackOverlay" class="w-full h-full absolute opacity-50 bg-black" ></span>
      </div>
      <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden" style="height: 70px;">
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
    <section class="relative py-1 bg-gray-300 p-1 pb-20">
        <div class="w-full text-center pb-1 -mt-80 mb-2">
            @include('partials.alert')
        </div>
        <!-- Component Code -->
        <div class="max-w-screen-xl mx-auto -mt-10 sm:p-10 md:p-16">
            <div class="grid grid-cols-2 w-full gap-0 ">
                <img src="{{ asset($photo->image) }}" alt="" class="p-14">
                <div class="bg-white p-0 -ml-14 ">
                  <div class="p-10">
                    <h2 class="text-2xl">{{ $photo->username }}</h2>
                    <p class="text-lg">{{ $photo->caption }} </p>
                  </div>
                  <div class="p-5 border-t-2 border-gray-100">
                    <livewire:counter :photo="$photo" />
                  </div>
                  <div class="p-5 ">
                    <b>Lovepreet :</b> &nbsp; kjkjkljk <br>
                    <b>Diksha :</b> jhjhjkhjkhk <br>
                    <b>Lovepreet :</b> kjkjkljk <br>
                    <b>Diksha :</b> jhjhjkhjkhk <br>
                    <b>Lovepreet :</b> kjkjkljk <br>
                    <b>Diksha :</b> jhjhjkhjkhk <br>
                    <b>Lovepreet :</b> kjkjkljk <br>
                    <b>Diksha :</b> jhjhjkhjkhk <br>
                    <b>Lovepreet :</b> kjkjkljk <br>
                    <b>Diksha :</b> jhjhjkhjkhk <br>
                    <b>Lovepreet :</b> kjkjkljk <br>
                    <b>Diksha :</b> jhjhjkhjkhk <br>

                  </div>
                </div>
            </div>
        </div>
    </section>
  </main>
@endsection
