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
            <img class="max-w-full w-full mx-auto" 
            @php
                if (!$img) {
                    echo "src='https://cdn.pixabay.com/photo/2019/12/24/09/54/the-gargoyle-4716390_1280.jpg'";
                } elseif (preg_match('/^(https?:\/\/|www\.)/', $img)) {
                    echo "src='" . $img . "'";
                } else {
                    echo "src='" . asset('storage/' . $img) . "'";
                }
            @endphp
        
            alt="{{ $alt ? $alt : 'no caption' }}" 
            loding="lazy">
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
