@extends('layouts.app')
@section('body')
    @if (session('success'))
        <x-alert type='success'>{{ session('success') }}</x-alert>
    @endif
    <div class="px-6 py-8">
        <span class="text-3xl font-bold text-secondary-700">Notifikasi Saya</span>
    </div>
    <div class="flex flex-col w-full px-4 overflow-hidden bg-gray-100 rounded-md">
        @foreach ($notif as $data)
            <a href="{{ route('order.show', $data->order_id) }}" class="flex flex-col w-full cursor-pointer">
                <div class="px-4 pt-4 pb-3 transition-all bg-white border-b border-secondary-600 hover:bg-gray-200 gap-y-4">
                    <span class="text-sm text-gray-400">{{ date('d-m-Y H:i', strtotime($data->created_at)) }}</span>
                    <div class="flex items-center w-full">
                        <span class="inline-block w-10/12">{{ $data->message }}</span>
                        <span class="inline-block w-2/12 text-right">
                            @if (in_array($data->id, $new))
                                <i class="text-red-600 fa-solid fa-circle-dot animate-ping"></i>
                            @else
                                <i class="text-green-600 fa-solid fa-check-double"></i>
                            @endif
                        </span>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
    {{ $notif->links('components.pagination', ['data' => $notif]) }}
@endsection
@section('script')
    <script>
        $(document).ready(function() {})
    </script>
@endsection
