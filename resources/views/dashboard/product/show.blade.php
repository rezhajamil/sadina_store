@extends('layouts.dashboard.app')
@section('body')
    @if (session('success'))
        <x-alert type='success'>{{ session('success') }}</x-alert>
    @endif
    <div class="w-full mx-4">
        <div class="flex flex-col">
            <div class="mt-4">
                <div class="flex items-center gap-x-3 ">
                    <a href="{{ url()->previous() }}"
                        class="inline-block px-4 py-2 font-bold text-white transition-all rounded-md bg-secondary-300 hover:bg-secondary-400">
                        <i class="mr-2 fa-solid fa-arrow-left"></i> Kembali
                    </a>
                    <h4 class="text-xl font-bold text-gray-600 align-baseline">Detail {{ $product->name }}</h4>
                    <a href="{{ route('admin.product.edit', $product->id) }}"
                        class="transition-all cursor-pointer text-secondary-300 hover:text-secondary-600"><i
                            class="fa-solid fa-pen-to-square"></i></a>
                </div>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div
                        class="w-full px-2 py-4 mt-4 overflow-auto bg-white rounded-md shadow sm:px-6 col-span-full sm:col-span-1 sm:mx-0">
                        <div>
                            <table class="w-full border-2 rounded-md">
                                <tr>
                                    <td class="p-4 font-bold border">Nama Produk</td>
                                    <td class="p-4 border">{{ $product->name }}</td>
                                </tr>
                                <tr>
                                    <td class="p-4 font-bold border">Kategori</td>
                                    <td class="p-4 border">{{ $product->category->name }}</td>
                                </tr>
                                <tr>
                                    <td class="p-4 font-bold border">Bahan</td>
                                    <td class="p-4 border">{{ $product->material }}</td>
                                </tr>
                                <tr>
                                    <td class="p-4 font-bold border">Berat</td>
                                    <td class="p-4 border">{{ number_format($product->weight, 0, ',', '.') }} gram</td>
                                </tr>
                                <tr>
                                    <td class="p-4 font-bold border">Harga</td>
                                    <td class="p-4 border">{{ number_format($product->price, 0, ',', '.') }}</td>
                                </tr>
                            </table>
                            <div class="flex flex-col gap-2 my-3">
                                <span class="font-bold">Warna Produk</span>
                                <div class="grid grid-cols-2 gap-2 sm:grid-cols-3">
                                    @foreach ($product->colors as $color)
                                        <div class="px-3 py-1 text-center"
                                            style="background-color: {{ $color->color->hex ?? '#000000' }}; border:2px {{ $color->color->hex && $color->color->hex != '#FFFFFF' ?? '#000000' }} solid">
                                            <span
                                                class="font-semibold {{ $color->color->name == 'white' || $color->color->hex == '#FFFFFF' ? 'text-black' : 'text-white' }}">{{ $color->color->name }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="flex flex-col gap-2 my-3">
                                <span class="font-bold">Ukuran Produk</span>
                                <div class="grid grid-cols-2 gap-2 sm:grid-cols-3">
                                    @foreach ($product->sizes as $size)
                                        <div class="px-3 py-1 border-2">
                                            <span class="font-semibold text-black">{{ $size->size->name }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="flex flex-col gap-2 my-3">
                                <span class="font-bold">Tag Produk</span>
                                <div class="grid grid-cols-2 gap-2 sm:grid-cols-3">
                                    @foreach ($product->tags as $tag)
                                        <div class="px-3 py-1 border-2">
                                            <span class="font-semibold text-black">{{ $tag->tag->name }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="w-full px-6 py-4 mt-4 overflow-auto bg-white rounded-md shadow col-span-full sm:col-span-1 sm:mx-0">
                        <h4 class="text-xl font-bold text-gray-600 align-baseline">Gambar Produk</h4>
                        <span class="text-sm italic text-green-600">*Cover</span>
                        <form class="grid grid-cols-1 gap-4 mt-4 sm:grid-cols-2" id="image-grid"
                            action="{{ route('admin.product.change_cover', $product->id) }}" method="POST">
                            @csrf
                            @method('put')
                            @foreach ($product->images as $image)
                                <label for="image{{ $image->id }}" class="relative border-2 rounded h-72 w-fit">
                                    <img src="{{ asset("storage/$image->image_url") }}" class="object-contain h-full" />
                                    <input type="radio" name="cover" id="image{{ $image->id }}" class="hidden peer"
                                        value="{{ $image->id }}" {{ $image->is_cover ? 'checked' : '' }}>
                                    <div
                                        class="absolute inset-0 hidden w-full h-full border-4 border-green-600 rounded border-spacing-3 peer-checked:block">
                                    </div>
                                </label>
                            @endforeach
                            <button type="submit"
                                class="px-3 py-2 font-semibold text-white transition-all bg-green-600 rounded cursor-pointer col-span-full hover:bg-green-800">Ganti
                                Cover</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#capture').click(function() {
                $(".check").hide()
                $(".hadir").show()
                createPDF()
                $(".check").show()
                $(".hadir").hide()
            });
        })
    </script>
@endsection
