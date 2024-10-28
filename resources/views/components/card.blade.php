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
        <a href="{{ url('blog/'. $slug) }}">
            <img class="max-w-full w-full mx-auto" src="{{ $img ? asset('storage/' . $img) : 'https://cdn.pixabay.com/photo/2023/11/02/05/23/woman-8359670_1280.png' }}" alt="{{ $alt ? $alt : 'no caption' }}">
        </a>
        <div class="{{ $contentBlockClass }}">
            <h3 class="text-lg font-bold leading-tight mb-2">
                <a href="{{ url('blog/'. $slug) }}">{{ $heading }}</a>
            </h3>
            <p class="hidden md:block text-gray-600 leading-tight mb-1">{{ $content }}</p>
            <a class="text-gray-500" href="{{ url('categories/'. $categorySlug) }}">
                <span class="inline-block h-3 border-l-2 border-red-600 mr-2">
                </span>
                {{ $category }}
            </a>
        </div>
    </div>
</div>
