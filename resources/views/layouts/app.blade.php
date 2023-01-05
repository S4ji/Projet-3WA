<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100&family=Nunito:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

        


        
        
    </head>
    <div id="app">
        <body>
            <div>
                @include('layouts.navigation')

                <!-- Page Heading -->
                @if (isset($header))
                    <header class="bg-white shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4">
                            {{ $header }}
                        </div>
                    </header>
                @endif

                <!-- Page Content -->
                <main class="container mx-auto px-4">
                    {{ $slot }}
                </main>
            </div>

            <footer>
                <div>
                <a href="{{ route('products.index') }}">
                        <x-application-logo class="w-auto fill-current text-[#ffffff]" />
                </a>
                  <p>Copyright 2022. Tout droits reservés.</p>
                </div>
                <div>
                  <a href="{{ route('cgv.index') }}">Conditions de Vente</a>
                  <a href="">Politique de Confidentialité</a>
                </div>
                @auth
                    
                <div>
                  <form class="formheader" method="POST" action="{{ route('logout') }}">
                    @csrf
                        <a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();"> {{ __('Log Out') }}</a>
                </form>
                </div>
                @endauth

              </footer>
        </body>
    </div>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="{{ asset('js/require.js')}}"></script>
        <script src="{{asset('js/requirejs-config.js')}}"></script>

</html>
