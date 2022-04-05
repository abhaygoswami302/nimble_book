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
    <section class="relative py-1 bg-gray-300">
      <div class="container ml-80 px-4">
        <div
          class="relative flex flex-col min-w-0 break-words bg-white content-center w-full md:w-6/12 text-center mb-6 shadow-xl rounded-lg -mt-64"
        >
          <div class="px-6 p-10 items-center">
              <h1>Create New Profile</h1>
                <form action="{{ route('profile.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                 @csrf
                  <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="Name">
                      Name
                    </label>
                    <input name="name" class="shadow appearance-none border rounded text-center w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="Name" type="text" placeholder="Name">
                  </div>
                  <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="Email">
                      Email
                    </label>
                    <input name="email" class="shadow appearance-none border rounded text-center w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="text" placeholder="Email">
                  </div>
                  <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="Address">
                      Address
                    </label>
                    <input name="address" class="shadow appearance-none border rounded text-center w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="Address" type="text" placeholder="Address">
                  </div>
                  <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="Designation">
                      Designation
                    </label>
                    <input name="designation" class="shadow appearance-none border rounded text-center w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="Designation" type="text" placeholder="Designation">
                  </div>
                  <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="Education">
                      Education
                    </label>
                    <input name="education" class="shadow appearance-none border rounded text-center w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="Education" type="text" placeholder="Education">
                  </div>
                  <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="Description">
                      Description
                    </label>
                    <input name="description" class="shadow appearance-none border rounded text-center w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="Description" type="text" placeholder="Description">
                  </div>
                  <div class="flex items-center justify-center">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                      Create New Profile
                    </button>
                  </div>
                </form><!-- form -->
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection