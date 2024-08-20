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

                    <div class="flex justify-between">
                        <h3 class="text-xl font-bold mb-4">Recent Posts</h3>
                        <a href="{{ route('blog') }}" class="text-indigo-400 hover:text-indigo-600 underline  font-bold">More</a>
                    </div>
                    <ul>
                        <x-recent-post></x-recent-post>
                    </ul>
                </div>

                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg mb-6">
                        <h3 class="text-xl font-bold mb-4">Suggested Posts</h3>
                    <ul>
                       <x-suggested-post></x-suggested-post>
                    </ul>
                </div>

                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">
                    <div class="flex justify-between">
                        <h3 class="text-xl font-bold mb-4">Other Categories</h3>
                        <a href="{{ route('categories.index') }}" class="text-indigo-400 hover:text-indigo-600 underline  font-bold">More</a>
                    </div>
                    <ul>
                        <x-other-category></x-other-category>
                    </ul>

                </div>
            </div>
        </div>
    </div>


    <div class="max-w-lg mx-auto p-6 bg-white dark:bg-gray-800 shadow-md rounded-lg">
        <h2 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-200">Contact Us</h2>

        <form action="{{ route('postComment',  $singlePostData->id) }}" method="post">
            @csrf
            <!-- Name Field -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                <input type="text" id="name" name="name"
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-300"
                       placeholder="John Doe">
            </div>

            <!-- Email Field -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                <input type="email" id="email" name="email"
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-300"
                       placeholder="you@example.com">
            </div>

            <!-- Website Field -->
            <div class="mb-4">
                <label for="website" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Website</label>
                <input type="url" id="website" name="website"
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-300"
                       placeholder="https://yourwebsite.com">
            </div>

            <!-- Comment Field -->
            <div class="mb-4">
                <label for="comment" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Comment</label>
                <textarea id="comment" name="comment" rows="4"
                          class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-300"
                          placeholder="Your message here..."></textarea>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit"
                        class="w-full px-4 py-2 bg-indigo-600 text-white font-semibold rounded-md shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400">
                    Submit
                </button>
            </div>
        </form>
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


