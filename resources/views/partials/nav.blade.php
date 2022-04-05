<nav
class="top-0 absolute z-50 w-full flex flex-wrap items-center justify-between px-2 py-3 "
>
<div
  class="container px-4 mx-auto flex flex-wrap items-center justify-between"
>
  <div
    class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start"
  >
    <a
      class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-white"
      href="{{ route('home') }}"
      >Nimble Book</a
    ><button
      class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none"
      type="button"
      onclick="toggleNavbar('example-collapse-navbar')"
    >
      <i class="text-white fas fa-bars"></i>
    </button>
  </div>
  <div
    class="lg:flex flex-grow items-center bg-white lg:bg-transparent lg:shadow-none hidden"
    id="example-collapse-navbar"
  >
    <ul class="flex flex-col lg:flex-row list-none mr-auto">
      <li class="flex items-center">
        <a class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
          href="{{ route('profile.index') }}">
          <i class="lg:text-gray-300 text-gray-500 fas fa-user-alt text-lg leading-lg mr-2" ></i>
          Profiles
        </a>
      </li>
      <li class="flex items-center">
        <a class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
          href="{{ route('post.index') }}">
          <i class="lg:text-gray-300 text-gray-500 fas fa-archive text-lg leading-lg mr-2" ></i>
          Posts
        </a>
      </li>
      <li class="flex items-center">
        <a class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
          href="{{ route('photo.index') }}">
          <i class="lg:text-gray-300 text-gray-500 fas fa-image text-lg leading-lg mr-2" ></i>
          Photos
        </a>
      </li>
    </ul>
    <ul class="flex flex-col lg:flex-row list-none lg:ml-auto">
      <!--li class="flex items-center">
        <a
          class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
          href="#pablo"
          ><i
            class="lg:text-gray-300 text-gray-500 fab fa-facebook text-lg leading-lg "
          ></i
          ><span class="lg:hidden inline-block ml-2">Share</span></a
        >
      </li-->
      <!--li class="flex items-center">
        <a
          class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
          href="#pablo"
          ><i
            class="lg:text-gray-300 text-gray-500 fab fa-github text-lg leading-lg "
          ></i
          ><span class="lg:hidden inline-block ml-2">Star</span></a
        >
      </li-->
      <li class="flex items-center">
        <a
        class="lg:text-white lg:hover:text-purple-300 text-purple-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
        href="{{ route('chat.index') }}"
        ><i
          class="lg:text-purple-400 text-purple-500 fas fa-comment text-lg leading-lg "
        ></i
        ><span class="lg:hidden inline-block ml-2">
          
        </span>
        <span class=" {{ (count($messages_navbar) == 0) ?  ' ' : 'animate-ping absolute inline-flex h-5 w-7' }}  rounded-2 bg-purple-400 opacity-75"></span>
        <!--span class="relative inline-flex rounded-full h-3 w-3 bg-purple-500"></span-->
        <small class="text-purple-400">
          {{ count($messages_navbar) }}  
        </small></a
      >
      </li>
      <li class="flex items-center">
        <a
          class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
          href="{{ route('bookmark.index') }}"
          ><i
            class="lg:text-gray-300 text-gray-500 fas fa-bookmark text-lg leading-lg "
          ></i
          ><span class="lg:hidden inline-block ml-2">Bookmark</span></a
        >
      </li>
      <li class="flex items-center">
        <a
          class="lg:text-white lg:hover:text-purple-300 text-purple-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
          href="{{ route('notifications.index') }}"
          ><i
            class="lg:text-purple-400 text-purple-500 far fa-bell text-lg leading-lg "
          ></i
          ><span class="lg:hidden inline-block ml-2">
            
          </span>
          <span class=" {{ (count($notifications_navbar) == 0) ?  ' ' : 'animate-ping absolute inline-flex h-5 w-7' }}  rounded-2 bg-purple-400 opacity-75"></span>
          <!--span class="relative inline-flex rounded-full h-3 w-3 bg-purple-500"></span-->
          <small class="text-purple-400">
            {{ count($notifications_navbar) }}  
          </small></a
        >

        <span class="flex h-3 w-3">

        </span>
      </li>
      

      <li class="flex items-center">
        @guest
        <a class="no-underline hover:underline p-2 text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
        @if (Route::has('register'))
            <a class="no-underline hover:underline p-2 text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
        @endif
    @else
    <span class="text-white pl-2 pr-2">Hii , {{ Auth::user()->name }}</span>

        <a href="{{ route('logout') }}"
           class="no-underline hover:underline bg-white text-gray-800 active:bg-gray-100 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3"
           onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" style="transition: all 0.15s ease 0s;">{{ __('Logout') }}</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            {{ csrf_field() }}
        </form>
    @endguest
      </li>
    </ul>
  </div>
</div>
</nav>