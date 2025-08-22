@extends('layouts.dashboard.app')
@section('body')
    <div class="w-full sm:mx-4">
        <div class="flex flex-col">
            <div class="mt-4">
                <h4 class="text-xl font-bold text-gray-600 align-baseline">Upload Berita Baru</h4>

                <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data" class="mt-4">
                    @csrf
                    <div class="mb-4">
                        <label for="judul" class="block text-sm font-medium text-gray-700">Judul Berita</label>
                        <input type="text" name="judul" id="judul" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    </div>

                    <div class="mb-4">
                        <label for="isi" class="block text-sm font-medium text-gray-700">Isi Berita</label>
                        <textarea name="isi" id="isi" rows="6" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="tag" class="block text-sm font-medium text-gray-700">Tag</label>
                        <input type="text" name="tag" id="tag" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar</label>
                        <input type="file" name="gambar" id="gambar" class="mt-1 block w-full">
                    </div>

                    <button type="submit" class="px-4 py-2 font-bold text-white rounded-md bg-secondary-500 hover:bg-secondary-700">
                        <i class="mr-2 fa-solid fa-plus"></i> Simpan Berita
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
