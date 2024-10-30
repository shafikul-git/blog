    @props([
        'blockClass' => '',
        'contentBlockClass' => '',
        'img' => '',
        'alt' => '',
        'heading' => '',
        'content' => '',
        'category' => '',
        'categorySlug' => '',
        'author' => '',
        'postTime' => '',
        'slug' => '',
    ])

    <div {{ $attributes }}>
        <div class="{{ $blockClass }}">
            <a href="{{ url('blog/' . $slug) }}">
                <img class="max-w-full w-full mx-auto" src="{{ $img }}" alt="{{ $alt ? $alt : 'no caption' }}"
                    loading="lazy">

            </a>
            <img src="{{ asset('') }}" alt="">
            <div class="{{ $contentBlockClass }}">
                <h3 class="text-lg font-bold leading-tight mb-2">
                    <a href="{{ url('blog/' . $slug) }}">{{ $heading }}</a>
                </h3>
                <p class="hidden md:block text-gray-600 leading-tight mb-1">{{ $content }}</p>
                <a class="text-gray-500" href="{{ url('categories/' . $categorySlug) }}">
                    <span class="inline-block h-3 border-l-2 border-red-600 mr-2">
                    </span>
                    {{ $category }}
                </a>
            </div>
        </div>
    </div>
    {{-- src="{{ Str::startsWith($img, ['http://', 'https://', 'www.']) ? $img : asset('storage/' . ltrim($img, '/')) }}" --}}
