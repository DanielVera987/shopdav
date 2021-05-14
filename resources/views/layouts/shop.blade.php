<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'SHOPDAV') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:200,400&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/shop.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="bg-white text-gray-600 work-sans leading-normal text-base tracking-normal">

        <!--Nav-->
        <nav id="header" class="w-full z-30 top-0 py-1">
          {{ $nav }}
        </nav>

        <!-- Page Content -->
        <main>
          {{ $slot }}
        </main>

        <footer class="container mx-auto bg-white py-8 border-t border-gray-400">
          <div class="container flex px-3 py-8 ">
              <div class="w-full mx-auto flex flex-wrap">
                  <div class="flex w-full lg:w-1/2 ">
                      <div class="px-3 md:px-0">
                          <h3 class="font-bold text-gray-900">About</h3>
                          <p class="py-4">
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vel mi ut felis tempus commodo nec id erat. Suspendisse consectetur dapibus velit ut lacinia.
                          </p>
                      </div>
                  </div>
                  <div class="flex w-full lg:w-1/2 lg:justify-end lg:text-right">
                      <div class="px-3 md:px-0">
                          <h3 class="font-bold text-gray-900">Social</h3>
                          <ul class="list-reset items-center pt-3">
                              <li>
                                  <a class="inline-block no-underline hover:text-black hover:underline py-1" href="#">Add social links</a>
                              </li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
        </footer>
  </body>
</html>