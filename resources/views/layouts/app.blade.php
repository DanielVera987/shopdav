<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'SHOPDAV') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:200,400&display=swap" rel="stylesheet">
        <script src="https://use.fontawesome.com/366d2c4396.js"></script>
        
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/shop.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/shop.js') }}" defer></script>
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.css" />
    </head>
    <body class="antialiased text-gray-900 bg-white">
        <x-loader />
        
        <div class="min-h-screen bg-gray-100">
            <!-- Page Content -->
            
            <main>
                    <div
                        class="flex h-screen overflow-y-hidden bg-white"
                        x-data="setup()"
                        x-init="">
                    {{ $slot }}
                </div>
            </main>

        </div>

        {{ $scripts ?? '' }}

        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.bundle.min.js"></script>
          <script>
          const setup = () => {
              return {
              loading: false,
              isSidebarOpen: false,
              toggleSidbarMenu() {
                  this.isSidebarOpen = !this.isSidebarOpen
              },
              isSettingsPanelOpen: false,
              isSearchBoxOpen: false,
              }
          }
          </script>
    </body>
</html>
