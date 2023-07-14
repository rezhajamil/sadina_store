<header class="flex items-center justify-between px-6 py-4 bg-white border-b-4 border-primary-600">
    <div class="flex items-center">
        <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </button>

        <div class="relative mx-4 lg:mx-0">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
            </span>
        </div>
    </div>

    <div class="flex items-center">
        <div x-data="{ notificationOpen: false }" class="relative">
            <button @click="notificationOpen = ! notificationOpen"
                class="relative flex mx-4 text-gray-600 focus:outline-none">
                {{-- <div
                    class="absolute top-0 right-0 flex items-center justify-center w-3 h-3 p-2 bg-red-600 rounded-full aspect-square">
                    <span class="text-white text-">1</span>
                </div> --}}
                <span
                    class="absolute -mt-1 ml-2 rounded-full bg-red-700 py-0 px-1.5 text-xs text-white {{ $notif_count ? 'inline' : 'hidden' }}">{{ $notif_count }}</span>
                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M15 17H20L18.5951 15.5951C18.2141 15.2141 18 14.6973 18 14.1585V11C18 8.38757 16.3304 6.16509 14 5.34142V5C14 3.89543 13.1046 3 12 3C10.8954 3 10 3.89543 10 5V5.34142C7.66962 6.16509 6 8.38757 6 11V14.1585C6 14.6973 5.78595 15.2141 5.40493 15.5951L4 17H9M15 17V18C15 19.6569 13.6569 21 12 21C10.3431 21 9 19.6569 9 18V17M15 17H9"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>

            <div x-cloak x-show="notificationOpen" @click="notificationOpen = false"
                class="fixed inset-0 z-10 w-full h-full"></div>

            <div x-cloak x-show="notificationOpen"
                class="absolute right-0 z-10 mt-2 overflow-hidden bg-white rounded-lg shadow-xl w-80"
                style="width:20rem; display: hidden">
                @if (count($notif))
                    @foreach ($notif as $item)
                        <a href="{{ route('admin.order.show', $item->order_id) }}?notif={{ $item->id }}"
                            class="flex items-center px-4 py-3 -mx-2 text-gray-600 {{ $item->is_read ? 'bg-white' : 'bg-gray-300 ' }} hover:text-white hover:bg-secondary-600">
                            <img class="object-cover w-8 h-8 mx-1 rounded-full" src="{{ $item->user->avatar }}"
                                alt="avatar" onerror="this.onerror=null;this.src='{{ asset('images/avatar.png') }}';">
                            <p class="mx-2 text-sm">
                                <span class="font-semibold" href="#">{{ $item->message }}</span>
                                <span class="block">
                                    {{ date('d-m-Y', strtotime($item->created_at)) }}
                                </span>
                            </p>
                        </a>
                    @endforeach
                    <a href="{{ route('admin.order.index') }}"
                        class="flex items-center justify-center px-4 py-3 -mx-2 text-gray-600 group hover:text-white hover:bg-secondary-600">
                        <p class="mx-2 text-sm">
                            <span class="font-semibold underline text-secondary-600 group-hover:text-white"
                                href="#">Lihat Semua
                                Notifikasi</span>
                        </p>
                    </a>
                @else
                    <span class="w-full px-4 py-3 text-center text-gray-500">Tidak Ada Notifikasi</span>
                @endif
            </div>
        </div>

        <div x-data="{ dropdownOpen: false }" class="relative">
            <button @click="dropdownOpen = ! dropdownOpen"
                class="relative block w-8 h-8 overflow-hidden rounded-full shadow focus:outline-none">
                <img class="object-cover w-full h-full" src="{{ asset('images/avatar.png') }}" alt="Your avatar">
            </button>

            <div x-cloak x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 z-10 w-full h-full">
            </div>

            <div x-cloak x-show="dropdownOpen"
                class="absolute right-0 z-10 w-48 mt-2 overflow-hidden bg-white rounded-md shadow-xl">
                <a href="{{ route('admin.user.edit_password') }}"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-secondary-600 hover:text-white">Ganti
                    Password</a>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit"
                        class="block w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-secondary-600 hover:text-white">Logout</button>
                </form>
            </div>
        </div>
    </div>
</header>
