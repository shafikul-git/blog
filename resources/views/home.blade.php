@extends('header')
@section('title', 'Home')
@section('otherConetent')

    <x-navbar></x-navbar>


    <!-- Hero Section -->
    <section class="bg-blue-600 text-white py-20">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-5xl font-bold mb-2">Welcome to My Blog</h1>
            <p class="text-xl mb-6">Insights, stories, and tips from the world of blogging</p>
            <a href="#posts" class="bg-white text-blue-600 px-4 py-2 rounded-full shadow-lg">Read the Blog</a>
        </div>
    </section>

    <!-- Featured Posts Section -->
    <section id="posts" class="container mx-auto py-16 px-6">
        <h2 class="text-4xl font-bold text-center mb-12">Featured Posts</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Post 1 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <img class="w-full h-48 object-cover" src="https://via.placeholder.com/400x300" alt="Post 1">
                <div class="p-6">
                    <h3 class="text-2xl font-bold mb-2">Post Title 1</h3>
                    <p class="text-gray-700 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec
                        iaculis mauris.</p>
                    <a href="#" class="text-blue-600 font-semibold">Read More</a>
                </div>
            </div>
            <!-- Post 2 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <img class="w-full h-48 object-cover" src="https://via.placeholder.com/400x300" alt="Post 2">
                <div class="p-6">
                    <h3 class="text-2xl font-bold mb-2">Post Title 2</h3>
                    <p class="text-gray-700 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec
                        iaculis mauris.</p>
                    <a href="#" class="text-blue-600 font-semibold">Read More</a>
                </div>
            </div>
            <!-- Post 3 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <img class="w-full h-48 object-cover" src="https://via.placeholder.com/400x300" alt="Post 3">
                <div class="p-6">
                    <h3 class="text-2xl font-bold mb-2">Post Title 3</h3>
                    <p class="text-gray-700 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec
                        iaculis mauris.</p>
                    <a href="#" class="text-blue-600 font-semibold">Read More</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <x-footer></x-footer>

    @endsection