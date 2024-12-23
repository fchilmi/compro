<nav class="fixed w-full z-10 top-0 start-0 border-b border-b-white" x-data="{ isOpen: false }"
    style="background-image: url(/img/web-Header-baru.png); background-size: cover; background-repeat: no-repeat; ">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    {{-- @dd($profile) --}}
                    <img class="h-12 w-12" src="{{ url('/img/' . $profile[0]->logoPerusahaan) }}"
                        alt="Great King Surabaya">
                </div>
                <div class="hidden sm:ml-6 sm:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <x-nav-link href='/user/dashboard' :active="request()->is('user/dashboard')">Produk</x-nav-link>
                        <x-nav-link href='/user/profilperusahaan' :active="request()->is('user/profilperusahaan')">Profil Perusahaan</x-nav-link>
                        @auth
                            <x-nav-link> <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                                    class="flex items-center justify-between w-full text-gray-800 hover:bg-gray-700 md:hover:bg-gray-700 md:border-0 md:hover:text-white md:p-0 md:w-auto">Menu
                                    <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg></button></x-nav-link>

                            {{-- <x-nav-link href='/logout2'>Logout</x-nav-link>
                            <x-nav-link href='#'>{{ Auth::user()->name }}</x-nav-link> --}}

                            <!-- Dropdown menu -->
                            <div id="dropdownNavbar"
                                class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-35 dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="doubleDropdownButton">
                                    <li>
                                        <a href="/users"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Data
                                            Users</a>
                                    </li>
                                    <li>
                                        <a href="/user/dataproduk"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Data
                                            Produk</a>
                                    </li>
                                    <li>
                                        <a href="/user/kontak"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Data
                                            Kontak</a>
                                    </li>
                                </ul>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">

                    @auth<!-- Profile dropdown -->
                        <div class="relative ml-3">
                            <div>
                                <button type="button" @click="isOpen = !isOpen"
                                    class="relative flex max-w-xs items-center rounded-full bg-white text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="absolute -inset-1.5"></span>
                                    <span class="sr-only">Open user menu</span>
                                    <img width="50" height="50"
                                        src="https://img.icons8.com/windows/32/user-male-circle.png"
                                        alt="user-male-circle" />
                                </button>
                            </div>

                            <div x-show="isOpen" x-transition:enter="transition ease-out duration-100 transform"
                                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75 transform"
                                x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                                class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                tabindex="-1">
                                <!-- Active: "bg-gray-100", Not Active: "" -->
                                <a href="#" class="block px-4 py-2 text-sm text-black" role="menuitem" tabindex="-1"
                                    id="user-menu-item-0"><b>Admin</b></a>
                                <hr class="">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="block px-4 py-2 text-sm text-black" role="menuitem"
                                        tabindex="-1" id="user-menu-item-2">Sign out</button>
                                </form>
                            </div>
                        </div>
                    @endauth
                </div>
            </div>


            <div class="-mr-2 flex md:hidden">
                <!-- Mobile menu button -->
                <button type="button" @click="isOpen = !isOpen"
                    class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <!-- Menu open: "hidden", Menu closed: "block" -->
                    <svg :class="{ 'hidden': isOpen, 'block': !isOpen }" class="block h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!-- Menu open: "block", Menu closed: "hidden" -->
                    <svg :class="{ 'block': isOpen, 'hidden': !isOpen }" class="hidden h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div x-show="isOpen" class="md:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3 bg-gray-700 opacity-90 z-10">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <x-nav-link href='/user/dashboard' :active="request()->is('user/dashboard')">
                <p class="text-white">Produk</p>
            </x-nav-link>
            <x-nav-link href='/user/profilperusahaan' :active="request()->is('user/profilperusahaan')">
                <p class="text-white">Profil
                    Perusahaan</p>
            </x-nav-link>
            @auth
                <button id="dropdownNavbarLink"
                    data-dropdown-toggle="dropdownNavbar2"data-dropdown-placement="right-start"
                    class="flex items-center justify-between rounded-md px-3 py-2 text-sm font-medium hover:underline text-white hover:bg-gray-700 hover:text-opacity-80 md:hover:bg-transparent md:border-0 md:hover:text-white md:p-0 md:w-auto dark:text-white md:dark:hover:text-white dark:focus:text-white dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Menu
                    <svg class="w-2.5 h-2.5 ms-2.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg></button>
                <!-- Dropdown menu -->
                <div id="dropdownNavbar2"
                    class="z-30 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-35 dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="doubleDropdownButton">
                        <li>
                            <a href="/users"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Data
                                Users</a>
                        </li>
                        <li>
                            <a href="/user/dataproduk"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Data
                                Produk</a>
                        </li>
                        <li>
                            <a href="/user/kontak"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Data
                                Kontak</a>
                        </li>
                    </ul>
                </div>
                <x-nav-link href='#' class="flex items-center px-4">
                    <p class="text-white">{{ Auth::user()->name }}</p>
                    <div class="flex-shrink-0 ml-2">
                        <svg class="w-[32px] h-[32px] text-white dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </x-nav-link>
                <x-nav-link href='/logout2'>
                    <p class="text-white">Log Out</p>
                </x-nav-link>
            @endauth
        </div>
    </div>

</nav>
