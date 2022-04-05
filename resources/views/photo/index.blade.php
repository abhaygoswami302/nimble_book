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
    <section class="relative py-1 bg-gray-300 p-20 pb-20 ">
        <div class="w-full text-center pb-1 -mt-60 mb-2  shadow-2xl" >
            <h1 class="font-bold text-3xl md:text-4xl  shadow-2xl lg:text-5xl font-heading text-white pb-2">
                Gallery
            </h1>
        </div>
        <div class="container mx-auto">
            <div class="grid-cols-3 p-4 space-y-3 lg:space-y-0 lg:grid lg:gap-5 lg:grid-rows-5" style="border:1px solid #5a5677;">
              @foreach ($photos as $photo)
                    <div class="w-full rounded text-center bg-transparent p-2" style="border:0.5px solid #5a5677;">
                    <a href="{{ route('photo.show', $photo->id) }}">
                      <img class="border border-gray-300" style="height: 300px;width:100%" src="{{ asset($photo->image) }}"
                        alt="image">
                    </a>
                    <div class="w-full flex justify-between py-1">
                      @if ($photo->username == 'Taranjit Singh')
                          <div class="p-1">
                            <i class="fas fa-thumbs-down"></i>
                          </div>
                      @else
                      <livewire:like  :photo="$photo->id" />       
                      @endif                        
                        <livewire:counter :photo="$photo" />
                    </div>
                    <div class="w-full flex px-2" style="font-family: roboto">
                      <div><b>{{ $photo->username }} : </b> </div>
                      <div> &nbsp;{{ $photo->caption }} </div>
                  </div> 
                    <!--
                    @foreach ($comments as $key => $comment)
                        @if ($key == 0 || $key == 1)
                            <div class="w-full flex justify-between">
                                <div>Lovepreet :</div>
                                <div>{{ $comment->comment }}</div>
                            </div>  
                        @endif 
                    @endforeach
                    -->
                    </div>
              @endforeach

            </div>
        </div>
    </section>
  </main>
@endsection