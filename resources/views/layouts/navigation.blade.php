<nav x-data="{ open: false }" class="bg-[#2c2c2c] border-b border-gray-100 ">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex ">
                <!-- Logo -->
                <div class="shrink-0 flex items-center row">
                    <a href="{{ route('products.index') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-[#ffffff]" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="space-x-8 sm:-my-px sm:ml-10 sm:flex ">
                    <x-nav-link :href="route('products.index')" :active="request()->routeIs('products')" class="text-[#ffffff] mr-2">{{ __('Shop') }}</x-nav-link>
                </div>
                <div class="space-x-8 sm:-my-px sm:ml-10 sm:flex ">
                    @auth
                        @if (auth()->user()->role === 'admin')
                            <x-nav-link :href="route('products.create')" :active="request()->routeIs('products')" class="text-[#ffffff]">{{ __('Admin Produits') }}</x-nav-link>
                        @endif
        
                </div>
                <div class="space-x-8 sm:-my-px sm:ml-10 sm:flex">
                   
                    <x-nav-link :href="route('profile.edit')" :active="request()->routeIs('products')" class="text-[#ffffff]">{{ __('Informations Compte') }}</x-nav-link>
                </div>
           
                <div class="space-x-8 sm:-my-px sm:ml-10">
                    <navbar-cart></navbar-cart>
                </div>
                @endauth

                
                        @guest
                        <div class="space-x-8 sm:-my-px sm:ml-10 sm:flex ">
                            <x-nav-link :href="route('login')" :active="request()->routeIs('login')" class="text-[#ffffff]">{{ __('Se connecter') }}</x-nav-link>
                        </div>
                        <div class="space-x-8 sm:-my-px sm:ml-10 sm:flex ">
                            <x-nav-link :href="route('register')" :active="request()->routeIs('register')" class="text-[#ffffff]">{{ __('Inscription') }}</x-nav-link>
                        </div>
                        @endguest
                </div>
            </div>
        </div>
    </div>
</nav>
