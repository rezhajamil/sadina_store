<!-- banner -->
<div id="banner" class="relative bg-top bg-no-repeat bg-cover py-36"
    style="background-image: url('{{ asset('images/banner2.jpg') }}')">
    <div class="absolute inset-0 w-full h-full bg-slate-800/60"></div>
    <div class="container relative z-10 px-6">
        <h1 class="mb-4 text-6xl font-medium text-white capitalize">
            best collection for <br />
            best look
        </h1>
        <p class="text-white">
            Get your best look with best outfit you can imagine
        </p>
        <div class="mt-12">
            <a href="{{ route('browse.index') }}"
                class="px-8 py-3 font-medium text-white transition-all border rounded-md bg-tersier border-tersier hover:bg-transparent hover:text-tersier">Shop
                Now</a>
        </div>
    </div>
</div>
<!-- ./banner -->
