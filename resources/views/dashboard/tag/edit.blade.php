@extends('layouts.dashboard.app')
@section('body')
    <div class="w-full sm:mx-4">
        <div class="flex flex-col">
            <div class="mt-4">
                <h4 class="text-xl font-bold text-gray-600 align-baseline">Edit Data Tag ({{ $tag->name }})</h4>

                <div class="px-6 py-4 mx-auto mt-4 overflow-auto bg-white rounded-md shadow sm:mx-0 w-fit">
                    <form action="{{ route('admin.tag.update', $tag->id) }}" method="POST" class="">
                        @csrf
                        @method('put')
                        <div class="grid grid-cols-1 gap-6 mt-4">
                            <div class="flex flex-col">
                                <label class="block text-gray-700" for="name">Nama Tag</label>
                                <input type="text" name="name" id="name" value="{{ old('name', $tag->name) }}"
                                    placeholder="Nama">
                                @error('name')
                                    <span class="block text-sm italic text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="flex justify-end mt-4">
                            <button
                                class="w-full px-4 py-2 font-bold text-white rounded-md bg-secondary-400 hover:bg-secondary-600 focus:outline-none focus:bg-secondary-600">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>
@endsection
