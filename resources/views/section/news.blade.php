<section id="background" class="relative bg-gray-200 pb-[60px] pt-[30px] sm:px-6 sm:pt-[40px]">
    <div class="container mx-auto">
        <div class="flex flex-wrap -mx-4">
            <div class="w-full sm:px-4">
                <div class="hero-content">
                    <div class="flex flex-col gap-2 justify-between items-center sm:flex-row">
                        <h1
                            class="mb-6 text-2xl font-bold leading-snug text-neutral-700 sm:text-3xl sm:text-[42px] lg:text-[40px] xl:text-[42px]">
                            NEWS & ARTICLE
                        </h1>
                        <a href="{{ route('news.index') }}" class="font-semibold text-sekunder hover:underline">More
                            News...</a>
                    </div>

                    <div class="grid grid-cols-1 gap-4 w-full sm:grid-cols-3">
                        @foreach ($news as $data)
                            <a href="{{ route('news.show', $data->id) }}" target="_blank"
                                class="p-4 bg-white rounded-xl border-2 transition-all cursor-pointer border-sekunder shadow-sekunder hover:shadow-xl">
                                <h2 class="mb-4 text-xl font-bold">{{ $data->title }}</h2>
                                <div class="line-clamp-3">{!! $data->content !!}</div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
