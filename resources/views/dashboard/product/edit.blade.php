@extends('layouts.dashboard.app')
@section('body')
    <div class="w-full sm:mx-4">
        <div class="flex flex-col">
            <div class="mt-4">
                <h4 class="text-xl font-bold text-gray-600 align-baseline">Edit Data {{ $product->name }}</h4>

                <form class="grid grid-cols-1 gap-4 sm:grid-cols-2" action="{{ route('admin.product.update', $product->id) }}"
                    method="POST" class="" enctype="multipart/form-data">
                    <div
                        class="w-full px-2 py-4 mt-4 overflow-auto bg-white rounded-md shadow sm:px-6 col-span-full sm:col-span-1 sm:mx-0">
                        <div>
                            @method('put')
                            @csrf
                            <div class="grid grid-cols-1 gap-6 mt-4">
                                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                    <div class="flex flex-col">
                                        <label class="block font-bold text-gray-700" for="name">Nama Produk</label>
                                        <input type="text" name="name" id="name"
                                            value="{{ old('name', $product->name) }}" placeholder="Nama">
                                        @error('name')
                                            <span class="block text-sm italic text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="flex flex-col">
                                        <label class="block font-bold text-gray-700" for="category">Kategori Produk</label>
                                        <select name="category" id="category">
                                            <option value="" selected disabled>Pilih Kategori Produk</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category', $product->category_id) == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                            <span class="block text-sm italic text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="flex flex-col">
                                        <label class="block font-bold text-gray-700" for="material">Bahan Produk</label>
                                        <input type="text" name="material" id="material"
                                            value="{{ old('material', $product->material) }}" placeholder="Bahan">
                                        @error('material')
                                            <span class="block text-sm italic text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="flex flex-col">
                                        <label class="block font-bold text-gray-700" for="price">Harga Produk</label>
                                        <input type="number" step="any" name="price" id="price"
                                            value="{{ old('price', $product->price) }}" placeholder="Harga">
                                        @error('price')
                                            <span class="block text-sm italic text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="flex flex-col col-span-full">
                                        <label class="block text-gray-700" for="description">Deskripsi Produk</label>
                                        <input type="hidden" name="description" id="description"
                                            value="{!! old('description', $product->description) !!}">
                                        <trix-editor input="description"></trix-editor>
                                        @error('description')
                                            <span class="block text-sm italic text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="flex flex-col col-span-full">
                                        <label class="block font-bold text-gray-700" for="color">Warna Produk</label>
                                        <div class="grid grid-cols-2 gap-2 sm:grid-cols-3">
                                            @foreach ($colors as $key => $color)
                                                <div
                                                    class="flex items-center justify-between px-2 py-1 border-2 rounded-sm gap-x-2">
                                                    <label
                                                        class="flex items-center w-full text-gray-700 select-none whitespace-nowrap"
                                                        for="color{{ $key }}">
                                                        <div class="w-4 h-4 mr-1 border-2 rounded-full inline-bolck"
                                                            style="background-color: {{ $color->hex }}"></div>
                                                        <span>{{ $color->name }}</span>
                                                    </label>
                                                    <input type="checkbox" name="color[]" id="color{{ $key }}"
                                                        class="accent-secondary-400 checked:bg-primary-500 focus:ring-primary-500 checked:focus:bg-primary-500"
                                                        value="{{ $color->id }}"
                                                        {{ in_array($color->id, $product_colors) ? 'checked' : '' }}>
                                                </div>
                                            @endforeach
                                        </div>
                                        @error('price')
                                            <span class="block text-sm italic text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="flex flex-col col-span-full">
                                        <label class="block font-bold text-gray-700" for="size">Ukuran Produk</label>
                                        <div class="grid grid-cols-2 gap-2 sm:grid-cols-3">
                                            @foreach ($sizes as $key => $size)
                                                <div
                                                    class="flex items-center justify-between px-2 py-1 border-2 rounded-sm gap-x-2">
                                                    <label
                                                        class="flex items-center w-full text-gray-700 select-none whitespace-nowrap"
                                                        for="size{{ $key }}">
                                                        <span>{{ $size->name }}</span>
                                                    </label>
                                                    <input type="checkbox" name="size[]" id="size{{ $key }}"
                                                        class="accent-secondary-400 checked:bg-primary-500 focus:ring-primary-500 checked:focus:bg-primary-500"
                                                        value="{{ $size->id }}"
                                                        {{ in_array($size->id, $product_sizes) ? 'checked' : '' }}>
                                                </div>
                                            @endforeach
                                        </div>
                                        @error('price')
                                            <span class="block text-sm italic text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="flex flex-col col-span-full">
                                        <label class="block font-bold text-gray-700" for="tag">Tag Produk</label>
                                        <div class="grid grid-cols-2 gap-2 sm:grid-cols-3">
                                            @foreach ($tags as $key => $tag)
                                                <div
                                                    class="flex items-center justify-between px-2 py-1 border-2 rounded-sm gap-x-2">
                                                    <label
                                                        class="flex items-center w-full text-gray-700 select-none whitespace-nowrap"
                                                        for="tag{{ $key }}">
                                                        <span>{{ $tag->name }}</span>
                                                    </label>
                                                    <input type="checkbox" name="tag[]" id="tag{{ $key }}"
                                                        class="accent-secondary-400 checked:bg-primary-500 focus:ring-primary-500 checked:focus:bg-primary-500"
                                                        value="{{ $tag->id }}"
                                                        {{ in_array($tag->id, $product_tags) ? 'checked' : '' }}>
                                                </div>
                                            @endforeach
                                        </div>
                                        @error('price')
                                            <span class="block text-sm italic text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="flex flex-col col-span-full">
                                        <label
                                            class="block px-3 py-2 font-semibold text-white transition-all rounded-md cursor-pointer hover:bg-primary-500 w-fit bg-primary-400"
                                            for="image"><i class="mr-2 fa-solid fa-images"></i>Tambah Gambar
                                            Produk</label>
                                        <input type="file" name="image[]" id="image" multiple class="hidden "
                                            accept="image/jpg, image/png, image/gif, image/jpeg">
                                        @error('image')
                                            <span class="block text-sm italic text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-end mt-4">
                                <button
                                    class="w-full px-4 py-2 font-bold text-white rounded-md bg-secondary-400 hover:bg-secondary-600 focus:outline-none focus:bg-secondary-600">Save</button>
                            </div>

                        </div>
                    </div>
                    <div
                        class="w-full px-6 py-4 mt-4 overflow-auto bg-white rounded-md shadow col-span-full sm:col-span-1 sm:mx-0">
                        <h4 class="text-xl font-bold text-gray-600 align-baseline">Gambar Produk</h4>
                        <span class="text-sm italic text-red-600" id="choose">Hapus Gambar</span>
                        <div class="grid grid-cols-1 gap-4 mt-4 sm:grid-cols-2" id="image-grid">
                            @foreach ($product->images as $image)
                                <label for="image{{ $image->id }}"
                                    class="relative h-56 overflow-hidden border-2 rounded">
                                    <img src="{{ asset("storage/$image->image_url") }}" />
                                    <input type="checkbox" name="delete_image[]" id="image{{ $image->id }}"
                                        class="hidden peer" value="{{ $image->id }}">
                                    <div
                                        class="absolute inset-0 hidden w-full h-full border-4 border-red-600 rounded border-spacing-3 peer-checked:block">
                                    </div>
                                </label>
                            @endforeach
                            @error('delete_image')
                                <span class="block text-sm italic text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $("#image").change(function() {
                previewImages(this);
                console.log($(this).val());
                $("#choose").show()
            });
        });

        function previewImages(input) {
            var preview = $('#image-grid');
            // console.log(input.files);

            if (input.files) {
                preview.append("<hr class='border-2 border-black rounded col-span-full'/>")
                for (var i = 0; i < input.files.length; i++) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var cover = Math.floor(Math.random() * 51);
                        // console.log(e.target.result);
                        // console.log(input.files);
                        preview.append(
                            `<label for="cover${cover}" class="relative h-56 overflow-hidden border-2 rounded">
                                <img src="${e.target.result}"/>
                                
                            </label>`
                        );
                    }

                    reader.readAsDataURL(input.files[i]);
                }
            }
        }
    </script>
@endsection
