<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <link rel="shortcut icon" href="./assets/img/favicon.ico" />
    <link
      rel="apple-touch-icon"
      sizes="76x76"
      href="./assets/img/apple-icon.png"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    <link
      rel="stylesheet"
      href="{{ asset('css/app.css') }}"
    />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{ asset('js/app.js') }}"></script>
    <title>Home | Nimble Book</title>
    @livewireStyles
  </head>
  <body class="text-gray-800 antialiased">
    @include('partials.login_nav')
    @yield('content')
    @include('partials.footer')
    @livewireScripts
    <script> 
      const button = document.getElementById('buttonmodal')
      const closebutton = document.getElementById('closebutton')
      const modal = document.getElementById('modal')
  
      button.addEventListener('click',()=>modal.classList.add('scale-100'))
      closebutton.addEventListener('click',()=>modal.classList.remove('scale-100'))
  </script>
  </body>
  <script>
    function toggleNavbar(collapseID) {
      document.getElementById(collapseID).classList.toggle("hidden");
      document.getElementById(collapseID).classList.toggle("block");
    }
  </script>
</html>


