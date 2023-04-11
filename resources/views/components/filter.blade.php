<div id="filterSection" class="relative hidden w-full px-4 mt-3 md:py-10 lg:px-20 md:px-6 py-9 bg-primary-200">
    <!-- Cross button Code -->
    <div id="close-filter" class="absolute top-0 right-0 px-4 cursor-pointer md:py-8 lg:px-16 md:px-6 py-9">
        <i class="text-lg text-gray-800 fa-solid fa-x"></i>
    </div>

    <!-- Colors Section -->
    <div>
        <div class="flex items-center space-x-2 text-gray-800">
            <i class="fa-solid fa-palette"></i>
            {{-- <img class="" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/filter1-svg3.svg" alt="colors" /> --}}
            <p class="text-xl font-medium leading-5 lg:text-2xl lg:leading-6">Colors</p>
        </div>
        <div class="grid flex-wrap grid-cols-3 mt-8 md:flex md:space-x-6 gap-y-8">
            <div class="flex items-center justify-start space-x-2 md:justify-center md:items-center">
                <div class="w-4 h-4 bg-white rounded-full shadow"></div>
                <p class="text-base font-normal leading-4 text-gray-600">White</p>
            </div>
            <div class="flex items-center justify-center space-x-2">
                <div class="w-4 h-4 bg-blue-600 rounded-full shadow"></div>
                <p class="text-base font-normal leading-4 text-gray-600">Blue</p>
            </div>
            <div class="flex items-center justify-end space-x-2 md:justify-center md:items-center">
                <div class="w-4 h-4 bg-red-600 rounded-full shadow"></div>
                <p class="text-base font-normal leading-4 text-gray-600">Red</p>
            </div>
            <div class="flex items-center justify-start space-x-2 md:justify-center md:items-center">
                <div class="w-4 h-4 bg-indigo-600 rounded-full shadow"></div>
                <p class="text-base font-normal leading-4 text-gray-600">Indigo</p>
            </div>
            <div class="flex items-center justify-center space-x-2">
                <div class="w-4 h-4 bg-black rounded-full shadow"></div>
                <p class="text-base font-normal leading-4 text-gray-600">Black</p>
            </div>
            <div class="flex items-center justify-end space-x-2 md:justify-center md:items-center">
                <div class="w-4 h-4 bg-purple-600 rounded-full shadow"></div>
                <p class="text-base font-normal leading-4 text-gray-600">Purple</p>
            </div>
            <div class="flex items-center justify-start space-x-2 md:justify-center md:items-center">
                <div class="w-4 h-4 bg-gray-600 rounded-full shadow"></div>
                <p class="text-base font-normal leading-4 text-gray-600">Grey</p>
            </div>
        </div>
    </div>

    <hr class="w-full my-8 bg-gray-200 lg:w-6/12 md:my-10" />

    <!-- Category Section -->
    <div>
        <div class="flex items-center space-x-2 text-gray-800">
            <i class="fa-solid fa-shirt"></i>
            <p class="text-xl font-medium leading-5 lg:text-2xl lg:leading-6 ">Category</p>
        </div>
        <div class="grid flex-wrap grid-cols-3 mt-8 md:flex md:space-x-6 gap-y-8">
            <div class="flex items-center justify-start space-x-2 md:justify-center md:items-center">
                <input class="w-4 h-4 mr-2" type="checkbox" id="Leather" name="Leather" value="Leather" />
                <div class="inline-block">
                    <div class="flex items-center justify-center space-x-6">
                        <label class="mr-2 text-sm font-normal leading-3 text-gray-600" for="Leather">Leather</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr class="w-full my-8 bg-gray-200 lg:w-6/12 md:my-10" />

    <!-- Material Section -->
    <div>
        <div class="flex items-center space-x-2 text-gray-800">
            <i class="fa-solid fa-feather"></i>
            <p class="text-xl font-medium leading-5 lg:text-2xl lg:leading-6 ">Material</p>
        </div>
        <div class="grid flex-wrap grid-cols-3 mt-8 md:flex md:space-x-6 gap-y-8">
            <div class="flex items-center justify-start space-x-2 md:justify-center md:items-center">
                <input class="w-4 h-4 mr-2" type="checkbox" id="Leather" name="Leather" value="Leather" />
                <div class="inline-block">
                    <div class="flex items-center justify-center space-x-6">
                        <label class="mr-2 text-sm font-normal leading-3 text-gray-600" for="Leather">Leather</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr class="w-full my-8 bg-gray-200 lg:w-6/12 md:my-10" />

    <!-- Size Section -->
    <div>
        <div class="flex items-center space-x-2 text-gray-800">
            <i class="fa-solid fa-ruler"></i>
            <p class="text-xl font-medium leading-5 lg:text-2xl lg:leading-6 ">Size</p>
        </div>
        <div class="grid flex-wrap grid-cols-3 mt-8 md:flex md:space-x-6 gap-y-8">
            <div class="flex items-center justify-start md:justify-center md:items-center">
                <input class="w-4 h-4 mr-2" type="checkbox" id="Large" name="Large" value="Large" />
                <div class="inline-block">
                    <div class="flex items-center justify-center space-x-6">
                        <label class="mr-2 text-sm font-normal leading-3 text-gray-600" for="Large">Large</label>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-center">
                <input class="w-4 h-4 mr-2" type="checkbox" id="Medium" name="Medium" value="Medium" />
                <div class="inline-block">
                    <div class="flex items-center justify-center space-x-6">
                        <label class="mr-2 text-sm font-normal leading-3 text-gray-600" for="Medium">Medium</label>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-end md:justify-center md:items-center">
                <input class="w-4 h-4 mr-2" type="checkbox" id="Small" name="Small" value="Small" />
                <div class="inline-block">
                    <div class="flex items-center justify-center space-x-6">
                        <label class="mr-2 text-sm font-normal leading-3 text-gray-600" for="Small">Small</label>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-start md:justify-center md:items-center">
                <input class="w-4 h-4 mr-2" type="checkbox" id="Mini" name="Mini" value="Mini" />
                <div class="inline-block">
                    <div class="flex items-center justify-center space-x-6">
                        <label class="mr-2 text-sm font-normal leading-3 text-gray-600" for="Mini">Mini</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Apply Filter Button (Large Screen) -->

    <div class="absolute bottom-0 right-0 hidden px-4 md:block md:py-10 lg:px-20 md:px-6 py-9">
        <button onclick="applyFilters()"
            class="px-10 py-4 text-base font-medium leading-4 text-white bg-secondary-500 hover:bg-secondary-700 focus:ring focus:ring-offset-2 focus:ring-secondary-800">Terapkan
            Filter</button>
    </div>

    <!-- Apply Filter Button (Table or lower Screen) -->

    <div class="block w-full mt-10 md:hidden">
        <button onclick="applyFilters()"
            class="w-full px-10 py-4 text-base font-medium leading-4 text-white bg-secondary-500 hover:bg-secondary-700 focus:ring focus:ring-offset-2 focus:ring-secondary-800">Terapkan
            Filter</button>
    </div>
</div>
