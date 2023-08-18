@extends('layouts.dashboard.app')
@section('body')
    @if (session('success'))
        <x-alert type='success'>{{ session('success') }}</x-alert>
    @endif
    <div class="w-full sm:mx-4">
        <div class="flex flex-col">
            <div class="mt-4">
                <h4 class="text-xl font-bold text-gray-600 align-baseline">Ganti Password</h4>

                <div class="px-6 py-4 mx-auto mt-4 overflow-auto bg-white rounded-md shadow sm:mx-0 w-fit">
                    <form action="{{ route('admin.user.update_password') }}" method="POST" class="">
                        @csrf
                        @method('put')
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
                            <div class="flex flex-col">
                                <label class="block text-gray-700" for="password">Password Baru</label>
                                <input type="password" name="password" id="password" placeholder="Password Baru">
                                @error('password')
                                    <span class="block text-sm italic text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label class="block text-gray-700" for="password_confirmation">Konfirmasi Password
                                    Baru</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    placeholder="Konfirmasi Password Baru">
                                @error('password_confirmation')
                                    <span class="block text-sm italic text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="flex justify-end mt-4">
                            <button
                                class="w-full px-4 py-2 font-bold text-white rounded-md bg-secondary-400 hover:bg-secondary-600 focus:outline-none focus:bg-secondary-600">Simpan</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>
@endsection
