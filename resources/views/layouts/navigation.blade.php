<nav class="relative flex flex-wrap items-center justify-between w-full py-3 shadow-lg bg-secondary-700 sm:border-b-[6px] border-primary-400 text-neutral-200 lg:flex-wrap lg:justify-start"
    data-te-navbar-ref>
    <div class="flex flex-wrap items-center justify-between w-full px-6 gap-y-2">
        <button
            class="block py-2 bg-transparent border-0 text-neutral-200 hover:no-underline hover:shadow-none focus:no-underline focus:shadow-none focus:outline-none focus:ring-0 lg:hidden"
            type="button" data-te-collapse-init data-te-target="#navbarSupportedContent4"
            aria-controls="navbarSupportedContent4" aria-expanded="false" aria-label="Toggle navigation">
            <span class="[&>svg]:w-7">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-7 w-7">
                    <path fill-rule="evenodd"
                        d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
                        clip-rule="evenodd" />
                </svg>
            </span>
        </button>
        <div class="!visible hidden flex-grow basis-[100%] items-center lg:!flex lg:basis-auto"
            id="navbarSupportedContent4" data-te-collapse-item>
            <a class="pr-2 mr-4 text-xl font-semibold text-white" href="{{ route('home') }}">SADINA STORE</a>
            <!-- Left links -->
            <ul class="flex flex-col pl-0 mr-auto list-style-none lg:flex-row" data-te-navbar-nav-ref>
                <li class="w-full py-2 underline" data-te-nav-item-ref>
                    <a class="text-white disabled:text-black/30 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
                        href="{{ route('browse.index') }}" data-te-nav-link-ref>Cari Busana</a>
                </li>
            </ul>
            <!-- Left links -->
        </div>
        <!-- Collapsible wrapper -->

        <!-- Right elements -->
        <div class="relative flex items-center">
            <!-- Icon -->
            @auth
                <div class="relative" data-te-dropdown-ref>
                    <a class="flex items-center mr-4 text-white hidden-arrow opacity-60 hover:opacity-80 focus:opacity-80"
                        href="#" id="dropdownMenuButton1" role="button" data-te-dropdown-toggle-ref
                        aria-expanded="false">
                        <span class="[&>svg]:w-5">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                <path fill-rule="evenodd"
                                    d="M5.25 9a6.75 6.75 0 0113.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 01-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 11-7.48 0 24.585 24.585 0 01-4.831-1.244.75.75 0 01-.298-1.205A8.217 8.217 0 005.25 9.75V9zm4.502 8.9a2.25 2.25 0 104.496 0 25.057 25.057 0 01-4.496 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                        <span class="absolute -mt-2.5 ml-2 rounded-full bg-red-700 py-0 px-1.5 text-xs text-white">1</span>
                    </a>
                    <ul class="absolute left-auto right-0 z-[1000] float-left m-0 mt-1 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg  [&[data-te-dropdown-show]]:block"
                        aria-labelledby="dropdownMenuButton1" data-te-dropdown-menu-ref>
                        <li>
                            <a class="block w-full px-4 py-2 text-sm font-normal bg-transparent whitespace-nowrap text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 "
                                href="#" data-te-dropdown-item-ref>Action</a>
                        </li>
                        <li>
                            <a class="block w-full px-4 py-2 text-sm font-normal bg-transparent whitespace-nowrap text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 "
                                href="#" data-te-dropdown-item-ref>Another action</a>
                        </li>
                        <li>
                            <a class="block w-full px-4 py-2 text-sm font-normal bg-transparent whitespace-nowrap text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 "
                                href="#" data-te-dropdown-item-ref>Something else here</a>
                        </li>
                    </ul>
                </div>

                {{-- Cart --}}
                <div class="relative" data-te-dropdown-ref>
                    <a class="flex items-center mr-4 text-white hidden-arrow opacity-60 hover:opacity-80 focus:opacity-80"
                        href="#" id="dropdownMenuButton1" role="button" data-te-dropdown-toggle-ref
                        aria-expanded="false">
                        <span class="[&>svg]:w-5">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                <path
                                    d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z" />
                            </svg>
                        </span>
                        <span
                            class="absolute -mt-2.5 ml-2 rounded-full bg-red-700 py-0 px-1.5 text-xs text-white {{ $cart_count ? 'inline' : 'hidden' }}">{{ $cart_count }}</span>
                    </a>
                    <ul class="absolute left-auto right-0 z-[1000] float-left m-0 mt-1 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base drop-shadow-xl shadow-xl  [&[data-te-dropdown-show]]:block"
                        aria-labelledby="dropdownMenuButton1" data-te-dropdown-menu-ref>
                        @if ($cart_count)
                            @foreach ($carts as $item)
                                <li class="border-b border-b-secondary-300">
                                    <a class="" href="{{ route('cart.index') }}" data-te-dropdown-item-ref>
                                        <div class="flex h-48 pr-6">
                                            <div class="p-4 h-fit">
                                                <img class="object-cover object-center w-full h-36"
                                                    src="{{ asset('storage/' . $item->product->images[0]->image_url) }}">
                                            </div>
                                            <div class="flex flex-col">
                                                <div class="flex flex-col px-2 py-4 h-fit text-secondary-800">
                                                    <span class="text-lg font-bold">{{ $item->product->name }}</span>
                                                    <span class="">
                                                        <i class="mr-3 fa-solid fa-palette"></i>{{ $item->color->name }}
                                                    </span>
                                                    <span class="">
                                                        <i
                                                            class="mr-3 fa-solid fa-ruler-combined"></i>{{ $item->size->name }}
                                                    </span>
                                                    <span class="">
                                                        <i class="mr-3 fa-solid fa-bag-shopping"></i>{{ $item->quantity }}
                                                    </span>
                                                </div>
                                                <span class="mt-4 underline text-secondary-400">Lihat di Keranjang</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        @else
                            <li class="p-4">
                                <span class="italic font-medium text-neutral-700">Tidak Ada Barang di Keranjang</span>
                            </li>
                        @endif
                    </ul>
                </div>

                <div class="relative" data-te-dropdown-ref>
                    <a class="flex items-center transition duration-150 ease-in-out hidden-arrow whitespace-nowrap motion-reduce:transition-none"
                        href="#" id="dropdownMenuButton2" role="button" data-te-dropdown-toggle-ref
                        aria-expanded="false">
                        <img src="{{ auth()->user()->avatar }}" class="rounded-full" style="height: 25px; width: 25px"
                            alt="" loading="lazy"
                            onerror="this.onerror=null;this.src='{{ asset('images/avatar.png') }}';" />
                    </a>
                    <ul class="absolute left-auto right-0 z-[1000] float-left m-0 mt-1 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg  [&[data-te-dropdown-show]]:block"
                        aria-labelledby="dropdownMenuButton2" data-te-dropdown-menu-ref>
                        <li>
                            <a class="block w-full px-4 py-2 text-sm font-normal bg-transparent whitespace-nowrap text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 "
                                href="{{ route('profile') }}" data-te-dropdown-item-ref>Edit Profile</a>
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button
                                    class="block w-full px-4 py-2 text-sm font-normal bg-transparent whitespace-nowrap text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 "
                                    data-te-dropdown-item-ref>Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <a href="{{ route('login') }}"
                    class="w-full px-3 py-2 overflow-hidden text-xs font-semibold text-white rounded-md transition-allcursor-pointer hover:bg-secondary-600 sm:font-bold sm:text-sm bg-secondary-400">
                    <i class="mr-2 fa-brands fa-google"></i>
                    SIGN IN</a>
            @endauth
        </div>
        <!-- Right elements -->
    </div>
</nav>
