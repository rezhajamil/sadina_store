<!-- ====== Footer Section Start -->
<footer class="relative z-10 px-6 pt-12 pb-10 mt-10 bg-white border-t-2 border-primary-600">
    <div class="container mx-auto">
        <div class="flex flex-wrap -mx-4">
            <div class="w-full px-4 sm:w-2/3 lg:w-3/12">
                <div class="w-full mb-10">
                    <a href="{{ route('home') }}" class="mb-6 inline-block max-w-[160px]">
                        <img src="{{ asset('images/logo.png') }}" alt="logo" class="max-w-full" />
                    </a>
                    <p class="text-base mb-7 text-body-color">
                        Jl. Bunga Pariama, Puri Adam Malik B22/23 - Ladang Bambu Medan Tuntungan, Kota Medan
                    <p class="flex items-center mt-2 text-sm font-medium text-dark">
                        <i class="mr-3 fa-solid fa-envelope-open-text text-primary-600"></i>
                        <span>divacoints2005@gmail.com</span>
                    </p>
                </div>
            </div>
            <div class="w-full px-4 sm:w-1/2 lg:w-2/12">
                <div class="w-full mb-10">
                    <h4 class="text-lg font-semibold mb-9 text-dark">Section</h4>
                    <ul>
                        <li>
                            <a href="{{ route('home') }}#banner"
                                class="inline-block mb-2 text-base leading-loose text-body-color hover:text-primary-600">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('home') }}#background"
                                class="inline-block mb-2 text-base leading-loose text-body-color hover:text-primary-600">
                                Cerita Kami
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('home') }}#profile"
                                class="inline-block mb-2 text-base leading-loose text-body-color hover:text-primary-600">
                                Profil
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="w-full px-4 sm:w-1/2 lg:w-3/12">
                <div class="w-full mb-10">
                    <h4 class="text-lg font-semibold mb-9 text-dark">Ikuti Kami</h4>
                    <div class="flex items-center mb-6">
                        
                        <a href="https://wa.me/+6285357260666" target="_blank"
                            class="mr-3 flex h-8 w-8 items-center justify-center rounded-full border border-[#E5E5E5] text-dark hover:border-primary-600 hover:bg-primary-600 hover:text-white sm:mr-4 lg:mr-3 xl:mr-4">
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>
                     
                        <a href="https://www.instagram.com/sadinafashiondesign" target="_blank"
                            class="mr-3 flex h-8 w-8 items-center justify-center rounded-full border border-[#E5E5E5] text-dark hover:border-primary-600 hover:bg-primary-600 hover:text-white sm:mr-4 lg:mr-3 xl:mr-4">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="https://www.tiktok.com/@sadinafashiondesign?_t=8lmbSK7Co4n&_r=1" target="_blank"
                            class="mr-3 flex h-8 w-8 items-center justify-center rounded-full border border-[#E5E5E5] text-dark hover:border-primary-600 hover:bg-primary-600 hover:text-white sm:mr-4 lg:mr-3 xl:mr-4">
                            <i class="fa-brands fa-tiktok"></i>
                        </a>
                        <a href="https://www.google.com/maps/dir//Jl+Bunga+Pariama+Komplek+Puri+Adam+malik+Blok+B+22%2F23,+Baru+Ladang+Bambu,+Medan+Tuntutungan,+Kota+Medan,+Sumatera+Utara+20138/@3.4970115,98.5143358,12z/data=!4m8!4m7!1m0!1m5!1m1!1s0x303125a651d7643f:0x6c8d1f5c3077e7f0!2m2!1d98.5967378!2d3.4970151?hl=en-GB&entry=ttu" target="_blank"
                            class="mr-3 flex h-8 w-8 items-center justify-center rounded-full border border-[#E5E5E5] text-dark hover:border-primary-600 hover:bg-primary-600 hover:text-white sm:mr-4 lg:mr-3 xl:mr-4">
                            <i class="fa-solid fa-location-dot"></i>
                        </a>
                        
                        
                        
                        {{-- <a href="https://www.youtube.com/@alazharcentresumut1872" target="_blank"
                            class="mr-3 flex h-8 w-8 items-center justify-center rounded-full border border-[#E5E5E5] text-dark hover:border-primary-600 hover:bg-primary-600 hover:text-white sm:mr-4 lg:mr-3 xl:mr-4">
                            <svg width="16" height="12" viewBox="0 0 16 12" class="fill-current">
                                <path
                                    d="M15.6645 1.88018C15.4839 1.13364 14.9419 0.552995 14.2452 0.359447C13.0065 6.59222e-08 8 0 8 0C8 0 2.99355 6.59222e-08 1.75484 0.359447C1.05806 0.552995 0.516129 1.13364 0.335484 1.88018C0 3.23502 0 6 0 6C0 6 0 8.79263 0.335484 10.1198C0.516129 10.8664 1.05806 11.447 1.75484 11.6406C2.99355 12 8 12 8 12C8 12 13.0065 12 14.2452 11.6406C14.9419 11.447 15.4839 10.8664 15.6645 10.1198C16 8.79263 16 6 16 6C16 6 16 3.23502 15.6645 1.88018ZM6.4 8.57143V3.42857L10.5548 6L6.4 8.57143Z" />
                            </svg>
                        </a> --}}
                    </div>
                    <p class="text-base text-body-color">&copy; {{ date('Y') }} My Sadina</p>
                </div>
            </div>
        </div>
    </div>

    <div>
        <span class="absolute left-0 bottom-0 z-[-1]">
            <svg width="217" height="229" viewBox="0 0 217 229" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M-64 140.5C-64 62.904 -1.096 1.90666e-05 76.5 1.22829e-05C154.096 5.49924e-06 217 62.904 217 140.5C217 218.096 154.096 281 76.5 281C-1.09598 281 -64 218.096 -64 140.5Z"
                    fill="url(#paint0_linear_1179_5)" />
                <defs>
                    <linearGradient id="paint0_linear_1179_5" x1="76.5" y1="281" x2="76.5"
                        y2="1.22829e-05" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#062035" stop-opacity="0.3" />
                        <stop offset="1" stop-color="#356298" stop-opacity="0" />
                    </linearGradient>
                </defs>
            </svg>
        </span>
        <span class="absolute top-10 right-10 z-[-1]">
            <svg width="75" height="75" viewBox="0 0 75 75" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M37.5 -1.63918e-06C58.2107 -2.54447e-06 75 16.7893 75 37.5C75 58.2107 58.2107 75 37.5 75C16.7893 75 -7.33885e-07 58.2107 -1.63918e-06 37.5C-2.54447e-06 16.7893 16.7893 -7.33885e-07 37.5 -1.63918e-06Z"
                    fill="url(#paint0_linear_1179_4)" />
                <defs>
                    <linearGradient id="paint0_linear_1179_4" x1="-1.63917e-06" y1="37.5" x2="75"
                        y2="37.5" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#A7706E" stop-opacity="0.31" />
                        <stop offset="1" stop-color="#C4C4C4" stop-opacity="0" />
                    </linearGradient>
                </defs>
            </svg>
        </span>
    </div>
</footer>
<!-- ====== Footer Section End -->
