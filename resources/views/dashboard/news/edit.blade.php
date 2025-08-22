@extends('layouts.dashboard.app')

@section('body')
<div class="w-full sm:mx-4">
    <div class="flex flex-col">
        <div class="mt-4">
            <h4 class="text-xl font-bold text-gray-600 align-baseline">Edit Berita</h4>

            <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data" class="mt-4">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="title" class="block font-bold text-gray-700">Judul Berita</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $news->title) }}" class="w-full px-4 py-2 border rounded-lg">
                </div>

                <div class="mb-4">
                    <label for="content" class="block font-bold text-gray-700">Isi Berita</label>
                    <textarea name="content" id="content" rows="6" class="w-full px-4 py-2 border rounded-lg">{{ old('content', $news->content) }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="tags" class="block font-bold text-gray-700">Tag</label>
                    <input type="text" name="tags" id="tags" value="{{ old('tags', $news->tags) }}" class="w-full px-4 py-2 border rounded-lg">
                </div>

                <div class="mb-4">
                    <label for="image" class="block font-bold text-gray-700">Gambar</label>
                    <input type="file" name="image" id="image" class="w-full px-4 py-2 border rounded-lg">
                    @if ($news->image)
                        <div class="mt-2">
                            <img src="{{ asset('news_images/' . $news->image) }}" alt="Current Image" class="w-32 h-auto">
                        </div>
                    @endif
                </div>

                <button type="submit" class="px-4 py-2 font-bold text-white rounded-md bg-secondary-500 hover:bg-secondary-700">Update Berita</button>
            </form>
        </div>
    </div>
</div>
@endsection
