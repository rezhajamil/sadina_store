@extends('layouts.dashboard.app')
@section('body')
    <div class="w-full sm:mx-4">
        <div class="flex flex-col">
            <div class="mt-4">
                <h4 class="text-xl font-bold text-gray-600 align-baseline">Tambah Data Ukuran</h4>

                <div class="px-6 py-4 mx-auto mt-4 overflow-auto bg-white rounded-md shadow sm:mx-0 w-fit">
                    <form action="{{ route('admin.size.store') }}" method="POST" class="">
                        @csrf
                        <div class="grid grid-cols-1 gap-6 mt-4">
                            <div class="flex flex-col">
                                <label class="block text-gray-700" for="name">Nama Ukuran</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}"
                                    placeholder="Nama">
                                @error('name')
                                    <span class="block text-sm italic text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label class="block text-gray-700" for="name">Kategori Ukuran</label>
                                <input type="text" name="category" id="category" value="{{ old('category') }}"
                                    placeholder="Kategori">
                                @error('category')
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
@section('script')
    <script>
        $(document).ready(function() {})
    </script>
@endsection
