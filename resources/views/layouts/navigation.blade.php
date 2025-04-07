<nav x-data="{ open: false }" class="bg-white from-emerald-500 to-blue-600 shadow-xl border-b-4 border-amber-400">
    <!-- Contenu principal de la navbar -->
    <div class=" max-w-7xl px-4 sm:px-6 lg:px-8 ">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('people.index') }}" class="text-white hover:opacity-75 transition duration-150">
                        <x-application-logo class="block h-10 w-auto fill-current text-white" />
                    </a>
                </div>

                <!-- Liens de navigation principaux -->
                <div class="hidden md:ml-10 md:flex md:space-x-6">
                    <x-nav-link :href="route('people.index')" :active="request()->routeIs('people.index')"
                        class="text-white bg-blue-500 hover:bg-amber-500 px-3 py-2 rounded-md text-sm font-medium transition duration-150"
                        :activeClasses="'bg-amber-500 text-white font-bold'">
                        {{ __('Accueil') }}
                    </x-nav-link>

                    <!-- Vous pouvez ajouter d'autres liens ici -->
                </div>
            </div>

            <!-- Menu utilisateur -->
            <div class="hidden md:flex md:items-center">
                @auth
                    <x-nav-link :href="route('profile.edit')" class="block px-4 py-2 text-sm text-gray-200 hover:bg-slate-700">
                            {{ __('Profile') }}
                        </x-nav-link>

                        <!-- Déconnexion -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-nav-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                    class="block px-4 py-2 text-sm text-gray-200 hover:bg-slate-700">
                                {{ __('Log Out') }}
                            </x-nav-link>
                        </form>
                    </div>
                </div>
                @else
                <a href="{{ route('login') }}" class="bg-blue-500 text-white hover:text-amber-300 px-3 py-2 rounded-md text-sm font-medium">
                    {{ __('Login') }}
                </a>
                <a href="{{ route('register') }}" class="bg-blue-500 ml-4 text-white bg-amber-500 hover:bg-amber-600 px-4 py-2 rounded-md text-sm font-medium shadow-md">
                    {{ __('Register') }}
                </a>
                @endauth
            </div>

            <!-- Bouton hamburger pour mobile -->
            <div class="flex items-center md:hidden">
                <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:bg-amber-500 focus:outline-none transition duration-150">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Menu mobile -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden md:hidden">
        <div class="pt-2 pb-3 space-y-1 bg-blue-600">
            <x-responsive-nav-link :href="route('people.index')" :active="request()->routeIs('people.index')"
                class="block px-3 py-2 text-base font-medium text-white hover:bg-amber-500">
                {{ __('Accueil') }}
            </x-responsive-nav-link>

            <!-- Vous pouvez ajouter d'autres liens ici -->
        </div>

        <!-- Options du menu mobile -->
        <div class="pt-4 pb-3 border-t border-blue-700 bg-blue-600">
            @auth
            <div class="flex items-center px-4">
                <div class="flex-shrink-0">
                    <svg class="h-10 w-10 fill-current text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M12 12a5 5 0 1 1 0-10 5 5 0 0 1 0 10zm0 2a10 10 0 0 0-10 10h20a10 10 0 0 0-10-10z" />
                    </svg>
                </div>
                <div class="ml-3">
                    <div class="text-base font-medium text-white">{{ Auth::user()->name }}</div>
                    <div class="text-sm font-medium text-blue-200">{{ Auth::user()->email }}</div>
                </div>
            </div>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="block px-4 py-2 text-base font-medium text-white hover:bg-amber-500">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();"
                            class="block px-4 py-2 text-base font-medium text-white hover:bg-amber-500">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
            @else
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('login')" class="block bg-blue-500 px-4 py-2 text-base font-medium text-white hover:bg-amber-500">
                    {{ __('Login') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('register')" class="block bg-blue-500 px-4 py-2 text-base font-medium text-white hover:bg-amber-500">
                    {{ __('Register') }}
                </x-responsive-nav-link>
            </div>
            @endauth
        </div>
    </div>
</nav>
