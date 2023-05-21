<div class="flex items-center justify-center w-full h-full px-4 md:hidden sm:py-8">
    <div class="relative flex items-center justify-center w-full">
        <button aria-label="slide backward"
            class="absolute left-0 z-30 ml-10 cursor-pointer prev focus:outline-none focus:text-black focus:bg-white focus:ring-2 focus:ring-offset-2 focus:ring-white"
            id="prev">
            <svg class="" width="8" height="14" viewBox="0 0 8 14" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M7 1L1 7L7 13" stroke="#aeaeae" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </button>
        <div class="w-full h-full mx-auto overflow-x-hidden overflow-y-hidden">
            <div id="slider"
                class="flex items-center justify-start h-full transition duration-700 ease-out lg:gap-8 md:gap-6 gap-14">
                @foreach ($images as $image)
                    <div class="relative flex flex-shrink-0 w-full sm:w-auto sm:max-h-[500px]">
                        <img src="{{ asset("storage/$image->image_url") }}" alt="{{ $name }}"
                            class="object-cover object-center w-full h-[500px]" />
                        <div class="absolute w-full h-full p-6 bg-gray-800 bg-opacity-30">
                            <h2 class="text-base leading-4 text-white lg:text-xl lg:leading-5 ">
                                {{ $category }}
                            </h2>
                            <div class="flex items-end h-full pb-6">
                                <h3 class="text-xl font-semibold leading-5 text-white lg:text-2xl lg:leading-6 ">
                                    {{ $name }}</h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <button aria-label="slide forward"
            class="absolute right-0 z-30 mr-10 next focus:outline-none focus:text-black focus:bg-white focus:ring-2 focus:ring-offset-2 focus:ring-white"
            id="next">
            <svg class="" width="8" height="14" viewBox="0 0 8 14" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M1 1L7 7L1 13" stroke="#aeaeae" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </button>
    </div>
</div>

<div class="items-center justify-center hidden w-full h-full px-4 md:flex sm:py-8">
    <div class="relative flex items-center justify-center w-full">
        <button aria-label="slide backward"
            class="absolute left-0 z-30 ml-10 cursor-pointer prev focus:outline-none focus:text-black focus:bg-white focus:ring-2 focus:ring-offset-2 focus:ring-white"
            id="prevBig">
            <svg class="" width="8" height="14" viewBox="0 0 8 14" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M7 1L1 7L7 13" stroke="#aeaeae" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </button>
        <div class="w-full h-full mx-auto overflow-x-hidden overflow-y-hidden">
            <div id="sliderBig"
                class="flex items-center justify-start h-full transition duration-700 ease-out lg:gap-8 md:gap-6 gap-14">
                @foreach ($images as $image)
                    <div class="relative flex flex-shrink-0 w-full sm:w-auto sm:max-h-[500px]">
                        <img src="{{ asset("storage/$image->image_url") }}" alt="{{ $name }}"
                            class="object-cover object-center w-full h-[500px]" />
                        <div class="absolute w-full h-full p-6 bg-gray-800 bg-opacity-30">
                            <h2 class="text-base leading-4 text-white lg:text-xl lg:leading-5 ">
                                {{ $category }}
                            </h2>
                            <div class="flex items-end h-full pb-6">
                                <h3 class="text-xl font-semibold leading-5 text-white lg:text-2xl lg:leading-6 ">
                                    {{ $name }}</h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <button aria-label="slide forward"
            class="absolute right-0 z-30 mr-10 next focus:outline-none focus:text-black focus:bg-white focus:ring-2 focus:ring-offset-2 focus:ring-white"
            id="nextBig">
            <svg class="" width="8" height="14" viewBox="0 0 8 14" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M1 1L7 7L1 13" stroke="#aeaeae" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </button>
    </div>
</div>
