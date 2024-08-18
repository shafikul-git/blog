@extends('header')
@section('title', $singlePostData->title)
@section('otherConetent')

<style>
    .blogContentUnTailwindCss * {
        all: unset; /* Unsets all styles applied by any CSS */
        display: revert; /* Reverts elements to their display default (e.g., block for <p>, <h1>, etc.) */
        font-family: inherit;
        color: inherit;
        margin: 0;
        padding: 0;
        box-sizing: border-box; /* Maintain box-sizing */
    }
</style>
    <!-- Nav Section -->
    <x-navbar></x-navbar>

    <div class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
        <!-- Background Image -->
        <div class="w-full h-64 bg-cover bg-center" style="background-image: url('{{ asset('storage/' . $singlePostData->featured_image ) }}');">
            <div class="w-full h-full bg-black bg-opacity-50 flex items-center justify-center">
                <h1 class="text-4xl font-bold text-white">
                    {{ $singlePostData->title }}
                </h1>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="container mx-auto py-8 px-4 lg:flex">
            <!-- Blog Content -->
            <div class="lg:w-3/4 lg:pr-8">
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-bold mb-4">
                        {{ $singlePostData->title }}
                    </h2>
                    <p class="mb-4 dark:text-white blogContentUnTailwindCss">
                        {!! $singlePostData->content !!}
                    </p>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:w-1/4 lg:pl-8 mt-8 lg:mt-0">
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg mb-6">
                    <h3 class="text-xl font-bold mb-4">Recent Posts</h3>
                    <ul>
                        <li class="mb-2"><a href="#" class="text-blue-500 dark:text-blue-400 hover:underline">Post 1</a></li>
                        <li class="mb-2"><a href="#" class="text-blue-500 dark:text-blue-400 hover:underline">Post 2</a></li>
                        <li class="mb-2"><a href="#" class="text-blue-500 dark:text-blue-400 hover:underline">Post 3</a></li>
                    </ul>
                </div>

                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg mb-6">
                    <h3 class="text-xl font-bold mb-4">Suggested Posts</h3>
                    <ul>
                        <li class="mb-2"><a href="#" class="text-blue-500 dark:text-blue-400 hover:underline">Post 4</a></li>
                        <li class="mb-2"><a href="#" class="text-blue-500 dark:text-blue-400 hover:underline">Post 5</a></li>
                        <li class="mb-2"><a href="#" class="text-blue-500 dark:text-blue-400 hover:underline">Post 6</a></li>
                    </ul>
                </div>

                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-bold mb-4">Other Categories</h3>
                    <ul>
                        <li class="mb-2"><a href="#" class="text-blue-500 dark:text-blue-400 hover:underline">Category 1</a></li>
                        <li class="mb-2"><a href="#" class="text-blue-500 dark:text-blue-400 hover:underline">Category 2</a></li>
                        <li class="mb-2"><a href="#" class="text-blue-500 dark:text-blue-400 hover:underline">Category 3</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Section -->
    <x-footer></x-footer>

@endsection


