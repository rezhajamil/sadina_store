@switch($status)
    @case('waiting')
        <div class="flex items-center justify-center px-3 py-1 rounded-full bg-yellow-400/80">
            <span class="text-sm font-semibold text-yellow-700 whitespace-nowrap status">Menunggu Pembayaran</span>
        </div>
    @break

    @case('paid')
        <div class="flex items-center justify-center px-3 py-1 rounded-full bg-indigo-400/80">
            <span class="text-sm font-semibold text-indigo-700 whitespace-nowrap status">Dibayar</span>
        </div>
    @break

    @case('cancel')
        <div class="flex items-center justify-center px-3 py-1 rounded-full bg-red-400/80">
            <span class="text-sm font-semibold text-red-700 whitespace-nowrap status">Batal</span>
        </div>
    @break

    @case('prepare')
        <div class="flex items-center justify-center px-3 py-1 rounded-full bg-gray-400/80">
            <span class="text-sm font-semibold text-gray-700 whitespace-nowrap status">Sedang Disiapkan</span>
        </div>
    @break

    @case('deliver')
        <div class="flex items-center justify-center px-3 py-1 rounded-full bg-blue-400/80">
            <span class="text-sm font-semibold text-blue-700 whitespace-nowrap status">Sedang Dikirim</span>
        </div>
    @break

    @case('finish')
        <div class="flex items-center justify-center px-3 py-1 rounded-full bg-green-400/80">
            <span class="text-sm font-semibold text-green-700 whitespace-nowrap status">Selesai</span>
        </div>
    @break

    @default
@endswitch
