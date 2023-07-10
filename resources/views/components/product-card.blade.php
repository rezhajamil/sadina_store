<div class="rounded overflow-hidden shadow-md card pb-2">
    <div class="relative">
        <div class="relative transition-all group">
            <div
                class="absolute top-0 left-0 flex items-center justify-center w-full h-full transition-all opacity-0 bg-gradient-to-t from-gray-800 via-gray-800 to-opacity-30 group-hover:opacity-50">
            </div>
            @foreach ($product->images as $key => $image)
                @php $no_cover = true @endphp
                @if ($image->is_cover)
                    <img class="object-cover w-full h-[450px]" src="{{ asset("storage/$image->image_url") }}"
                        alt="{{ $product->name }}" />
                    @php $no_cover = false @endphp
                @break
            @endif
        @endforeach
        @if ($no_cover)
            <img class="object-cover h-96" src="{{ asset('storage/' . $product->images[0]->image_url) }}"
                alt="{{ $product->name }}" />
        @endif
        <div class="absolute bottom-0 w-full p-8 opacity-0 group-hover:opacity-100">
            <a href="{{ route('browse.show', $product->id) }}"
                class="inline-block w-full py-3 mt-2 text-base font-bold leading-4 text-center text-white transition-all bg-transparent border-2 border-white hover:bg-primary-600">
                Lihat Detail
            </a>
        </div>
    </div>
    <p class="mt-4 px-3 text-xl font-bold leading-5 text-gray-800 md:mt-6">
        {{ $product->name }}
    </p>
    <p class="mt-4 px-3 text-lg font-semibold leading-5 text-gray-800">
        <span class="text-base font-light text-gray-600 price"
            price="{{ $product->price }}">Rp</span>{{ number_format($product->price, 0, ',', '.') }}
    </p>
    <div class="flex px-3 mt-2 text-base font-light text-gray-600 gap-x-6">
        <span><i class="mr-2 fa-solid fa-palette"></i> {{ count($product->colors) }}</span>
        <span><i class="mr-2 fa-solid fa-ruler-combined"></i> {{ count($product->sizes) }}</span>
    </div>
</div>
</div>
