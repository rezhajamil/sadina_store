@extends('layouts.app')
@section('body')
    @if (session('success'))
        <x-alert type='success'>{{ session('success') }}</x-alert>
    @endif
    <div class="px-6 py-8 w-full">
        <div class="mb-8 max-h-[500px] overflow-hidden rounded-md">
            <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="object-cover w-full h-full">
        </div>
        <div class="flex flex-col gap-2">
            <h1 class="mt-4 text-6xl font-bold leading-9 text-sekunder">
                {{ $news->title }}
            </h1>

            <p class="text-sm leading-6 text-gray-600">
                {{ $news->created_at->format('d M Y | H:i') }}
            </p>

            <hr class="my-2 border-2 border-premier">
        </div>
        <p class="mt-2 text-base leading-6 text-gray-600">
            {!! $news->content !!}
        </p>

    </div>
    <div class="flex flex-col justify-end px-6 py-8">
        <hr class="mb-4 border-premier">
        {{-- <a href="{{ route('news.index') }}" class="p-3 text-sm font-semibold text-white rounded-md bg-sekunder">Berita
            lainnya</a> --}}
        @if ($another_news->count() > 0)
            <h3 class="mb-4 text-xl font-semibold">Berita Lainnya</h3>
        @endif
        <div class="grid grid-cols-1 gap-4 w-full sm:grid-cols-3">
            @foreach ($another_news as $data)
                <a href="{{ route('news.show', $data->id) }}" target="_blank"
                    class="p-4 bg-white rounded-xl border-2 transition-all cursor-pointer border-sekunder shadow-sekunder hover:shadow-xl">
                    <h2 class="mb-4 text-xl font-bold">{{ $data->title }}</h2>
                    <div class="line-clamp-3">{!! $data->content !!}</div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {})
    </script>
@endsection
