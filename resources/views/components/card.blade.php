@props([
    'blockClass' => '',
    'contentBlockClass' => '',
])
<div {{ $attributes }}>
    <div class="{{ $blockClass }}">
        <a href="">
            <img class="max-w-full w-full mx-auto" src="{{ asset('img/dummy/img6.jpg') }}" alt="alt title">
        </a>
        <div class="{{ $contentBlockClass }}">
            <h3 class="text-lg font-bold leading-tight mb-2">
                <a href="#">5 Tips to Save Money Booking Your Next Hotel Room</a>
            </h3>
            <p class="hidden md:block text-gray-600 leading-tight mb-1">This is a wider card with supporting
                text below as a natural lead-in to additional content.</p>
            <a class="text-gray-500" href="#">
                <span class="inline-block h-3 border-l-2 border-red-600 mr-2">
                </span>
                Europe
            </a>
        </div>
    </div>
</div>
