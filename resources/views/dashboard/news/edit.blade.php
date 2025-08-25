@extends('layouts.dashboard.app')
@section('body')
    <div class="w-full sm:mx-4">
        <div class="flex flex-col">
            <div class="mt-4">
                <h4 class="text-xl font-bold text-gray-600 align-baseline">Tambah Data Berita</h4>

                <form class="grid grid-cols-1 gap-4" action="{{ route('admin.news.update', $news->id) }}') }}" method="POST"
                    class=""enctype="multipart/form-data">
                    <div
                        class="overflow-auto col-span-full px-2 py-4 mt-4 w-full bg-white rounded-md shadow sm:col-span-1 sm:mx-0 sm:px-6">
                        <div> @method('PUT')
                            @csrf
                            <div class="grid grid-cols-1 gap-6 mt-4">
                                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                    <div class="flex flex-col">
                                        <label class="block font-bold text-gray-700" for="title">Nama Berita</label>
                                        <input type="text" name="title" id="title"
                                            value="{{ old('title', $news->title) }}" placeholder="Nama">
                                        @error('title')
                                            <span class="block text-sm italic text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="flex flex-col justify-end">
                                        <label
                                            class="block px-3 py-2 font-semibold text-white rounded-md transition-all cursor-pointer w-fit bg-primary-400 hover:bg-primary-500"
                                            for="image"><i class="mr-2 fa-solid fa-images"></i>Pilih Gambar
                                            Berita</label>
                                        <input type="file" name="image" id="image" class="hidden"
                                            accept="image/jpg, image/png, image/gif, image/jpeg">
                                        @error('image')
                                            <span class="block text-sm italic text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="flex flex-col col-span-full">
                                        <label class="block text-gray-700" for="content">Konten Berita</label>
                                        <input type="hidden" name="content" id="content" value="{!! old('content', $news->content) !!}">
                                        <trix-editor input="content"></trix-editor>
                                        @error('content')
                                            <span class="block text-sm italic text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-end mt-4">
                                <button
                                    class="px-4 py-2 w-full font-bold text-white rounded-md bg-secondary-400 hover:bg-secondary-600 focus:bg-secondary-600 focus:outline-none">Submit</button>
                            </div>

                        </div>
                    </div>
                    <div
                        class="overflow-auto col-span-full px-6 py-4 mt-4 w-full bg-white rounded-md shadow sm:col-span-1 sm:mx-0">
                        <h4 class="text-xl font-bold text-gray-600 align-baseline">Gambar Berita</h4>
                        {{-- <span class="text-sm text-gray-600" style="display: none" id="choose">Pilih Gambar sebagai
                            Cover</span> --}}
                        <div class="grid grid-cols-1 gap-4 mt-4 sm:grid-cols-2" id="image-grid">
                            <label for="cover" class="overflow-hidden relative h-56 rounded border-2">
                                <img src="{{ asset('storage/' . $news->image) }}" alt="" class="object-cover" />

                            </label>
                            {{-- <input type="radio" name="cover" id="cover${cover}" class="hidden peer"
                                value="${e.target.result}" checked>
                            <div
                                class="hidden absolute inset-0 justify-center items-center w-full h-full bg-green-600/80 peer-checked:flex">
                                <span class="inline-block text-lg font-bold text-white">
                                    COVER
                                </span>
                            </div> --}}
                            @error('cover')
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
            preview.html('');
            // console.log(input.files);

            if (input.files) {
                for (var i = 0; i < input.files.length; i++) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var cover = Math.floor(Math.random() * 51);
                        // console.log(e.target.result);
                        // console.log(input.files);
                        preview.prepend(
                            `<label for="cover${cover}" class="overflow-hidden relative h-56 rounded border-2">
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
