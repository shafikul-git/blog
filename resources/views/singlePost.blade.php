@extends('header')
@section('title', $singlePostData->title)
@section('otherConetent')

{{-- Highlight code --}}
<link rel="stylesheet" href="{{ asset('css/singlepost.css') }}">

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
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-3">
                    <h2 class="text-2xl font-bold mb-4">
                        {{ $singlePostData->title }}
                    </h2>
                    <div class="prose customCss">
                        {!! $singlePostData->content !!}
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:w-1/4 lg:pl-8 mt-8 lg:mt-0">
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg mb-6">
                    <h3 class="text-xl font-bold mb-4">Recent Posts</h3>
                    <ul>
                        <x-recent-post></x-recent-post>
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
                        <x-other-category></x-other-category>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <x-footer></x-footer>


    {{-- Highlight Code show  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>

    <script>
      document.addEventListener('DOMContentLoaded', (event) => {
        document.querySelectorAll('pre code').forEach((block) => {
        hljs.highlightElement(block);
        });
    });
    </script>
@endsection


