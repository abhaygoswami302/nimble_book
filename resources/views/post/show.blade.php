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
        <div class="w-full text-center pb-1 -mt-60 mb-2">
            @include('partials.alert')

            <h1 class="font-bold text-3xl md:text-4xl lg:text-5xl font-heading text-white pb-2">
                View All Posts
            </h1>
        </div>
        <!-- Component Code -->
        <div class="max-w-screen-xl mx-auto -mt-10 sm:p-10 md:p-16">
        <div class="grid grid-cols-1 w-full gap-4">
            <div class="rounded overflow-hidden shadow-lg">
                <a href="#"><div class="relative">
                    <img class="w-full" src="{{ asset($post->image) }}" alt="Sunset in the mountains">
                <div class="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-gray-900 opacity-25"></div>
                    <!--a href="#!"><div class="absolute bottom-0 left-0 bg-indigo-600 px-4 py-2 text-white text-sm hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out">
                    Photos
                    </div></a-->
                    <a href="{{ route('post.index') }}"><div class="text-sm absolute top-0 right-0 bg-indigo-600 px-4 text-white rounded-full h-16 w-16 flex flex-col items-center justify-center mt-3 mr-3 hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out">
                    <span class="font-bold">
                        <i class="fas fa-arrow-left"></i>
                    </span>
                    <small>GoBack</small>
                    </div></a>
                    </div></a>
                <div class="px-6 py-4">
                    <span class="font-semibold text-lg inline-block hover:text-indigo-600 transition duration-500 ease-in-out">
                        {{ $post->name }}
                    </span>
                    <p class="text-gray-500 text-sm">
                        {{ $post->description }}
                    </p>
                </div>
                <div class="px-6 py-4 flex flex-row items-center">
                    <span href="#" class="py-1 text-sm font-regular text-gray-900 mr-1 flex flex-row items-center">
                    <svg height="13px" width="13px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                <g>
                    <g>
                        <path d="M256,0C114.837,0,0,114.837,0,256s114.837,256,256,256s256-114.837,256-256S397.163,0,256,0z M277.333,256
                            c0,11.797-9.536,21.333-21.333,21.333h-85.333c-11.797,0-21.333-9.536-21.333-21.333s9.536-21.333,21.333-21.333h64v-128
                            c0-11.797,9.536-21.333,21.333-21.333s21.333,9.536,21.333,21.333V256z"/>
                    </g>
                </g>
                </svg>
                    <span class="ml-1">{{ $post->updated_at->diffForHumans() }}</span></span>
                </div>
                <!-- Comment Section -->
                <div class="px-6 py-4">
                    <span class="font-semibold text-lg inline-block hover:text-indigo-600 transition duration-500 ease-in-out">
                        Comments
                    </span>
                    <form action="{{ route('postcomment.store') }}" method="POST">
                        <div class="grid grid-cols-2 gap-4">
                            @csrf
                            <div>
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <input type="text" class="w-full p-1 mt-2 mb-2 border-radius-lg " name="comment" placeholder="Enter Your Comment">
                            </div>
                            <div>
                                <button class="mt-1 mb-1 button p-1 border border-black">Add Post Comment</button>
                            </div>
                        </div>
                    </form>
                    <div>
                    </div>
                    <p class="text-gray-600 p-2 mb-1">
                        @foreach ($comments as $comment)
                            <p class="p-1">
                                <b>{{ $comment->username }}</b> : {{ $comment->comment }} 
                            </p>
                        @endforeach
                    </p>
                </div>
            </div>

    </div>
    </div>
    </section>
  </main>
@endsection
