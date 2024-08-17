@extends('header')
@section('title', 'Blog')
@section('otherConetent')

    <!-- Nav Section -->
    <x-navbar></x-navbar>

@foreach ($blogDatas as $blogData)
    <div class="bg-gray-50 font-[sans-serif] p-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-8 gap-12 items-center md:max-w-7xl max-w-lg mx-auto">
          <div>
            <h2 class="text-4xl font-bold text-gray-300 uppercase mb-6">Blogs</h2>
            <h2 class="text-3xl font-extrabold text-[#333] uppercase leading-10">Discover Our Letest Blog Posts</h2>
          </div>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:col-span-2">
            @foreach ($blogData->posts as $post)
            <div class="cursor-pointer rounded overflow-hidden group">
              <img src="{{ asset('storage/' . $post->featured_image) }}" alt="Blog Post 1" class="w-full h-52 object-cover" />
              <div class="py-6">
                <span class="text-sm block text-gray-400 mb-2">10 FEB 2023 | BY JOHN DOE</span>
                <h3 class="text-xl font-bold text-[#333] group-hover:text-blue-500 transition-all">{{ $post->title }}</h3>
              </div>
            </div>
            @endforeach
          </div>
        </div>
    </div>
@endforeach

    <!-- Footer Section -->
    <x-footer></x-footer>

@endsection
