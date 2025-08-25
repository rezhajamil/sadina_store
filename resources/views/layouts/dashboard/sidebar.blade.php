<nav class="mt-10" x-data="{ product: false }">
    <a class="flex items-center px-6 py-2 mt-4 text-gray-100 bg-opacity-25 bg-secondary-800"
        href="{{ URL::to('/dashboard') }}">
        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
        </svg>
        <span class="mx-3">Dashboard</span>
    </a>

    <a class="flex items-center px-6 py-2 mt-4 text-white transition-all cursor-pointer hover:bg-slate-800 hover:bg-opacity-25 hover:text-gray-100"
        x-on:click="product=!product">
        <i class="fa-solid fa-shirt"></i>
        <span class="mx-3 text-white select-none">Produk</span>
        <i class="inline-block ml-auto text-white transition-transform transform fa-solid fa-angle-right"
            :class="{ 'rotate-90': product, 'rotate-0': !product }"></i>
    </a>
    <div class="flex overflow-hidden flex-col mx-6 mt-2 ml-auto w-3/4 bg-opacity-25 rounded-md bg-slate-800"
        x-show="product" x-transition>
        <a href="{{ route('admin.product.index') }}"
            class="text-white whitespace-nowrap border-b transition-all border-b-slate-400 hover:bg-white hover:text-slate-800">
            <span class="inline-block px-2 py-3">Daftar Produk</span>
        </a>
        <a href="{{ route('admin.category.index') }}"
            class="text-white whitespace-nowrap border-b transition-all border-b-slate-400 hover:bg-white hover:text-slate-800">
            <span class="inline-block px-2 py-3">Kategori Produk</span>
        </a>
        <a href="{{ route('admin.color.index') }}"
            class="text-white whitespace-nowrap border-b transition-all border-b-slate-400 hover:bg-white hover:text-slate-800">
            <span class="inline-block px-2 py-3">Warna Produk</span>
        </a>
        <a href="{{ route('admin.size.index') }}"
            class="text-white whitespace-nowrap border-b transition-all border-b-slate-400 hover:bg-white hover:text-slate-800">
            <span class="inline-block px-2 py-3">Ukuran Produk</span>
        </a>
        <a href="{{ route('admin.tag.index') }}"
            class="text-white whitespace-nowrap border-b transition-all border-b-slate-400 hover:bg-white hover:text-slate-800">
            <span class="inline-block px-2 py-3">Tag Produk</span>
        </a>
    </div>
    <a href="{{ route('admin.user.index') }}"
        class="flex items-center px-6 py-2 mt-4 text-white transition-all cursor-pointer hover:bg-slate-800 hover:bg-opacity-25 hover:text-gray-100">
        <i class="fa-solid fa-user"></i>
        <span class="mx-3 text-white select-none">Member</span>
    </a>
    <a href="{{ route('admin.order.index') }}"
        class="flex items-center px-6 py-2 mt-4 text-white transition-all cursor-pointer hover:bg-slate-800 hover:bg-opacity-25 hover:text-gray-100">
        <i class="fa-solid fa-cart-shopping"></i>
        <span class="mx-3 text-white select-none">Pesanan</span>
    </a>
    <a href="{{ route('admin.order.index') }}"
        class="flex items-center px-6 py-2 mt-4 text-white transition-all cursor-pointer hover:bg-slate-800 hover:bg-opacity-25 hover:text-gray-100">
        <i class="fa-solid fa-mobile-screen"></i>
        <span class="mx-3 text-white select-none">Konten</span>
    </a>

    <a href="{{ route('admin.news.index') }}"
        class="flex items-center px-6 py-2 mt-4 text-white transition-all cursor-pointer hover:bg-slate-800 hover:bg-opacity-25 hover:text-gray-100">
        <i class="fa-solid fa-newspaper"></i>
        <span class="mx-3 text-white select-none">Berita</span>
    </a>

    <a href="{{ route('admin.notif.index') }}"
        class="flex items-center px-6 py-2 mt-4 text-white transition-all cursor-pointer hover:bg-slate-800 hover:bg-opacity-25 hover:text-gray-100">
        <i class="fa-solid fa-bell"></i>
        <span class="mx-3 text-white select-none">Notifikasi</span>
    </a>
</nav>
