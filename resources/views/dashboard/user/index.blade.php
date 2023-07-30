@extends('layouts.dashboard.app')
@section('body')
    <div class="w-full sm:mx-4">
        <div class="flex flex-col">
            <div class="mt-4">
                <h4 class="text-xl font-bold text-gray-600 align-baseline">Daftar User</h4>

                <div class="overflow-auto bg-white rounded-md shadow w-fit">
                    <table class="overflow-auto text-left border-collapse w-fit">
                        <thead class="border-b">
                            <tr>
                                <th class="p-3 text-sm font-bold text-center text-gray-100 uppercase bg-primary-600">No</th>
                                <th class="p-3 text-sm font-medium text-center text-gray-100 uppercase bg-primary-600">Profil
                                </th>
                                <th class="p-3 text-sm font-medium text-center text-gray-100 uppercase bg-primary-600">
                                    Telepon</th>
                                <th class="p-3 text-sm font-medium text-center text-gray-100 uppercase bg-primary-600">
                                    Provinsi</th>
                                <th class="p-3 text-sm font-medium text-center text-gray-100 uppercase bg-primary-600">Kota
                                </th>
                                <th class="p-3 text-sm font-medium text-center text-gray-100 uppercase bg-primary-600">
                                    Alamat</th>
                                <th colspan="2"
                                    class="p-3 text-sm font-medium text-center text-gray-100 uppercase bg-primary-600">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $data)
                                <tr class="hover:bg-gray-200">
                                    <td class="p-3 font-bold text-gray-700">{{ $key + $users->firstItem() }}</td>
                                    <td class="p-3 text-gray-700 whitespace-nowrap">
                                        <div class="flex items-center gap-x-2">
                                            <img src="{{ $data->avatar }}" alt="{{ $data->name }}"
                                                class="object-cover object-center w-8 h-8 border rounded-full aspect-square">
                                            <div class="flex flex-col">
                                                <span
                                                    class="text-xs text-gray-400 whitespace-nowrap">{{ $data->email }}</span>
                                                <span class="font-semibold whitespace-nowrap">{{ $data->name }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-3 text-gray-700 phone">{{ $data->phone }}</td>
                                    <td class="p-3 text-gray-700 province">{{ $data->address->province ?? '-' }}</td>
                                    <td class="p-3 text-gray-700 city">{{ $data->address->city ?? '-' }}</td>
                                    <td class="p-3 text-gray-700 address">{{ $data->address->address ?? '-' }}</td>
                                    <td class="py-3 text-gray-700">
                                        <a href="https://wa.me/62{{ $data->whatsapp }}" target="_blank"
                                            class="text-2xl text-green-600 cursor-pointer hover:text-green-700"><i
                                                class="fa-brands fa-whatsapp"></i></a>

                                    </td>
                                    <td class="p-3 text-gray-700 address">
                                        <a href="{{ route('admin.user.show', $data->id) }}"
                                            class="block my-1 text-base font-semibold text-indigo-600 transition whitespace-nowrap hover:text-indigo-800">Lihat
                                            Pesanan
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->links('components.pagination', ['data' => $users]) }}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $("#search").on("input", function() {
                find();
            });

            $("#search_by").on("input", function() {
                find();
            });

            const find = () => {
                let search = $("#search").val();
                let searchBy = $('#search_by').val();
                let pattern = new RegExp(search, "i");
                $(`.${searchBy}`).each(function() {
                    let label = $(this).text();
                    if (pattern.test(label)) {
                        $(this).parent().show();
                    } else {
                        $(this).parent().hide();
                    }
                });
            }

        })
    </script>
@endsection
