
@extends('layouts.dashboard.app')
@section('body')
    <div class="w-full sm:mx-4">
        <div class="flex flex-col">
            <div class="mt-4">
                <h4 class="text-xl font-bold text-gray-600 align-baseline">Tambah Berita Baru</h4>

                <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data" class="mt-4">
                    @csrf
                    <div class="mb-4">
                        <label for="title" class="block font-bold text-gray-700">Judul Berita</label>
                        <input type="text" name="title" id="title" class="w-full px-4 py-2 border rounded-lg" required>
                    </div>

                    <div class="mb-4">
                        <label for="content" class="block font-bold text-gray-700">Isi Berita</label>
                        <textarea name="content" id="content" rows="6" class="w-full px-4 py-2 border rounded-lg" required></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="tags" class="block font-bold text-gray-700">Tag</label>
                        <input type="text" name="tags" id="tags" class="w-full px-4 py-2 border rounded-lg">
                    </div>

                    <div class="mb-4">
                        <label for="image" class="block font-bold text-gray-700">Gambar</label>
                        <input type="file" name="image" id="image" class="w-full px-4 py-2 border rounded-lg">
                    </div>

                    <button type="submit" class="px-4 py-2 font-bold text-white transition-all rounded-md bg-secondary-500 hover:bg-secondary-700">
                        <i class="mr-2 fa-solid fa-plus"></i> Simpan Berita
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
