<form action="{{ route('browse.index') }}" method="GET" id="filterSection"
    class="relative hidden w-full px-4 mt-3 md:py-10 lg:px-20 md:px-6 py-9 bg-primary-200">
    <!-- Cross button Code -->
    <div id="close-filter" class="absolute top-0 right-0 px-4 cursor-pointer md:py-8 lg:px-16 md:px-6 py-9">
        <i class="text-lg text-gray-800 fa-solid fa-x"></i>
    </div>

    <!-- Colors Section -->
    <div>
        <div class="flex items-center space-x-2 text-gray-800">
            <i class="fa-solid fa-palette"></i>
            {{-- <img class="" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/filter1-svg3.svg" alt="colors" /> --}}
            <p class="text-xl font-medium leading-5 lg:text-2xl lg:leading-6">Warna</p>
        </div>
        <div class="grid flex-wrap grid-cols-2 mt-8 md:flex md:space-x-6 gap-y-8 gap-x-3">
            @foreach ($colors as $key => $color)
                {{-- <label for="color{{ $key }}"
                    class="flex items-center justify-start space-x-2 md:justify-center md:items-center">
                    <div class="w-4 h-4 rounded-full shadow" style="background-color: {{ $color->hex }}"></div>
                    <p class="text-base font-normal leading-4 text-gray-600">{{ $color->name }}</p>
                    <input type="checkbox" name="color[]" id="color{{ $key }}"
                        class="hidden border border-gray-500 focus:border-gray-700">
                </label> --}}

                <div class="w-full md:w-fit">
                    <input type="checkbox" name="color[]" id="color{{ $key }}" value="{{ $color->id }}"
                        class="hidden peer"
                        @if (request()->get('color')) {{ in_array($color->id, request()->get('color')) ? 'checked' : '' }} @endif />
                    <label for="color{{ $key }}"
                        class="relative flex items-center justify-between p-2 overflow-hidden text-gray-600 border rounded flex-nowrap border-primary-300 peer-checked:bg-primary-400 peer-checked:text-white">
                        <p class="text-sm leading-none whitespace-nowrap">
                            {{ $color->name }}
                        </p>
                        <div class="w-6 h-6 ml-3 border border-gray-800 rounded-full shadow cursor-pointer"
                            style="background-color: {{ $color->hex }}">
                        </div>
                    </label>
                </div>
            @endforeach

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
            @foreach ($sizes as $key => $size)
                <div class="flex items-center justify-start md:justify-center md:items-center">
                    <input
                        class="w-4 h-4 mr-2 checked:bg-primary-500 focus:ring-primary-500 checked:focus:bg-primary-500"
                        type="checkbox" id="size{{ $key }}" name="size[]" value="{{ $size->id }}"
                        @if (request()->get('size')) {{ in_array($size->id, request()->get('size')) ? 'checked' : '' }} @endif />
                    <div class="inline-block">
                        <div class="flex items-center justify-center space-x-6">
                            <label class="mr-2 text-sm font-normal leading-3 text-gray-600"
                                for="size{{ $key }}">{{ $size->name }}</label>
                        </div>
                    </div>
                </div>
            @endforeach
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
            @foreach ($categories as $key => $category)
                <div class="flex items-center justify-start md:justify-center md:items-center">
                    <input
                        class="w-4 h-4 mr-2 checked:bg-primary-500 focus:ring-primary-500 checked:focus:bg-primary-500"
                        type="checkbox" id="category{{ $key }}" name="category[]" value="{{ $category->id }}"
                        @if (request()->get('category')) {{ in_array($category->id, request()->get('category')) ? 'checked' : '' }} @endif />
                    <div class="inline-block">
                        <div class="flex items-center justify-center space-x-6">
                            <label class="mr-2 text-sm font-normal leading-3 text-gray-600"
                                for="category{{ $key }}">{{ ucwords($category->name) }}</label>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>



    <!-- Apply Filter Button (Large Screen) -->

    <div class="absolute bottom-0 right-0 hidden px-4 md:block md:py-10 lg:px-20 md:px-6 py-9">
        <button type="submit"
            class="px-10 py-4 text-base font-medium leading-4 text-white bg-secondary-500 hover:bg-secondary-700 focus:ring focus:ring-offset-2 focus:ring-secondary-800">Terapkan
            Filter</button>
    </div>

    <!-- Apply Filter Button (Table or lower Screen) -->

    <div class="block w-full mt-10 md:hidden">
        <button type="submit"
            class="w-full px-10 py-4 text-base font-medium leading-4 text-white bg-secondary-500 hover:bg-secondary-700 focus:ring focus:ring-offset-2 focus:ring-secondary-800">Terapkan
            Filter</button>
    </div>
</form>
