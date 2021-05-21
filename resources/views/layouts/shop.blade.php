<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'SHOPDAV') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:200,400&display=swap" rel="stylesheet">
        <script src="https://use.fontawesome.com/366d2c4396.js"></script>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/shop.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="bg-white text-gray-600 work-sans leading-normal text-base tracking-normal">
        <x-loader />
        <x-notification />

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
              <div class="w-full mx-auto flex sm:flex-nowrap flex-wrap">
                  <div class="flex w-full lg:w-1/2 ">
                      <div class="px-3 md:px-0">
                          <h3 class="font-bold text-gray-900">About</h3>
                          <p class="py-4">
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vel mi ut felis tempus commodo nec id erat. Suspendisse consectetur dapibus velit ut lacinia.
                          </p>
                      </div>
                  </div>
                  <div class="flex w-full lg:w-1/2 sm:text-center lg:justify-end">
                    <div class="px-3 md:px-0">
                        <h3 class="font-bold text-gray-900">Social</h3>
                        <ul class="list-reset items-center py-4 text-2xl">
                            <li>
                                <a class="inline-block no-underline hover:text-black hover:underline py-1" href="#">
                                    <i class="fa fa-instagram" aria-hidden="true"></i>    
                                    <i class="fa fa-facebook-official" aria-hidden="true"></i>    
                                    <i class="fa fa-twitter" aria-hidden="true"></i>    
                                    <i class="fa fa-youtube-play" aria-hidden="true"></i>    
                                    <i class="fa fa-linkedin-square" aria-hidden="true"></i>    
                                </a>
                            </li>
                        </ul>
                    </div>
                  </div>
                  <div class="flex w-full lg:w-1/2 lg:justify-end lg:text-right">
                      <div class="px-3 md:px-0">
                          <h3 class="font-bold text-gray-900">Redes Sociales</h3>
                          <ul class="list-reset items-center py-4 text-2xl">
                            <li>
                                <a class="inline-block no-underline hover:text-black hover:underline py-1" href="#">
                                    <i class="fa fa-instagram" aria-hidden="true"></i>    
                                    <i class="fa fa-facebook-official" aria-hidden="true"></i>    
                                    <i class="fa fa-twitter" aria-hidden="true"></i>    
                                    <i class="fa fa-youtube-play" aria-hidden="true"></i>    
                                    <i class="fa fa-linkedin-square" aria-hidden="true"></i>    
                                </a>
                            </li>
                        </ul>
                      </div>
                  </div>
              </div>
          </div>
          <div class="container flex flex-wrap sm:flex-nowrap justify-between">
            <p>© 2021 {{ config('app.name', 'SHOPDAV') }}</p>
            <div class="text-4xl">
                <i class="fa fa-cc-visa" aria-hidden="true"></i>    
                <i class="fa fa-cc-mastercard" aria-hidden="true"></i>    
                <i class="fa fa-cc-paypal" aria-hidden="true"></i>    
                <i class="fa fa-cc-stripe" aria-hidden="true"></i>    
            </div>
          </div>
        </footer>

        <script src="{{ asset('js/shop.js') }}"></script>
        {{ $scripts ?? '' }}
  </body>
</html>