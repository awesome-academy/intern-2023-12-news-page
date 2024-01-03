<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 nav-main">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('landingPage') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600"/>
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex nav-content">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    <x-nav-link :href="route('posts.index')" :active="request()->routeIs('posts.index')">
                        {{ __('Posts') }}
                    </x-nav-link>

                    <x-nav-link :href="route('follows.index')" :active="request()->routeIs('follows.index')">
                        {{ __('Follows') }}
                    </x-nav-link>

                    @if (Auth::user()->role->slug === 'moderator')
                        <x-nav-link :href="route('manager.post.index')"
                            :active="request()->routeIs('manager.post.index')">
                            {{ __('Handle') . ' ' . __('Posts') }}
                        </x-nav-link>

                        <x-nav-link :href="route('reports.index')" :active="request()->routeIs('reports.index')">
                            {{ __('Reports') }}
                        </x-nav-link>
                    @endif

                    @if (Auth::user()->role->slug === 'admin' || Auth::user()->role->slug === 'moderator')
                        <x-nav-link :href="route('manager.users.index')"
                            :active="request()->routeIs('manager.users.index')">
                            {{ __('Users') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <div class="flex">
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700
                                hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300
                                transition duration-150 ease-in-out">
                                <div>{{ __('Language') }}</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"/>
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('locale', ['lang' => 'en'])">
                                {{ __('English') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('locale', ['lang' => 'vi'])">
                                {{ __('Vietnamese') }}
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                </div>

                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700
                                hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300
                                transition duration-150 ease-in-out">
                                <div class="flex items-center">
                                    <div style="width: 40px; height: 40px; margin-right: 10px;">
                                        <img style="border-radius: 50%;"
                                            src="{{ asset(!empty(Auth::user()->avatar) ? Auth::user()->avatar : 'images/avatar_default.png') }}"
                                            title="Avatar của {{Auth::user()->name}}" class="w-100 h-100">
                                    </div>
                                    <div>
                                        <span style="color: #000">{{ Auth::user()->name }}</span>
                                        <span
                                            class="tag tag-{{Auth::user()->role->slug}}">{{Auth::user()->role->name}}</span>
                                    </div>
                                </div>
                                <div class="ml-1" style="color: #000">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"/>
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-responsive-nav-link :href="route('profile')">
                                {{ __('Profile') }}
                            </x-responsive-nav-link>
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md
                    text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100
                    focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('posts.index')" :active="request()->routeIs('posts.index')">
                {{ __('Posts') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('follows.index')" :active="request()->routeIs('follows.index')">
                {{ __('Follows') }}
            </x-responsive-nav-link>

            @if (Auth::user()->role->slug === 'moderator')
                <x-responsive-nav-link :href="route('manager.post.index')"
                    :active="request()->routeIs('manager.post.index')">
                    {{ __('Handle') . ' ' . __('Posts') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('reports.index')" :active="request()->routeIs('reports.index')">
                    {{ __('Reports') }}
                </x-responsive-nav-link>
            @endif

            @if (Auth::user()->role->slug === 'admin' || Auth::user()->role->slug === 'moderator')
                <x-responsive-nav-link :href="route('manager.users.index')"
                    :active="request()->routeIs('manager.users.index')">
                    {{ __('Users') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4 flex items-center">
                <div style="width: 50px; height: 50px; margin-right: 10px">
                    <img style="border-radius: 50%;"
                        src="{{asset(!empty(Auth::user()->avatar) ? Auth::user()->avatar : 'images/avatar_default.png')}}"
                        title="Avatar của {{Auth::user()->name}}" class="w-100 h-100">
                </div>
                <div>
                    <div class="font-medium text-base text-gray-800 flex items-center">
                        {{ Auth::user()->name }}
                    </div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" style="margin-bottom: 0;">
                    @csrf
                    <x-dropdown-link onclick="event.preventDefault();this.closest('form').submit();"
                        :href="route('logout')">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </div>
        </div>
    </div>
</nav>
