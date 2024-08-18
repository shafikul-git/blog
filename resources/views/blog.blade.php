@extends('header')
@section('title', 'Blog')
@section('otherConetent')

    <!-- Nav Section -->
    <x-navbar></x-navbar>

@foreach ($blogDatas as $blogData)
<div class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 font-sans p-6 hover:shadow-[inset_0px_1px_21px_1px_#667eea] ">
    <div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-8 gap-12 items-center md:max-w-7xl max-w-lg mx-auto">
      <div>
        <h2 class="text-4xl font-bold text-gray-700 dark:text-gray-300 uppercase mb-6">{{ $blogData->name }}</h2>
        <h2 class="text-3xl font-extrabold text-gray-900 dark:text-gray-100 uppercase leading-10">{{ $blogData->description }}</h2>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:col-span-2">
        @foreach ($blogData->posts as $post)
        <a href="{{ route('singlePost', $post->slug) }}" class="rounded overflow-hidden group bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 transition-all">
          <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-52 object-cover" />
          <div class="py-6 px-4">
            <span class="text-sm block text-gray-500 dark:text-gray-400 mb-2">{{ date('d M Y', strtotime($post->created_at)) }} | BY {{ strtoupper($post->users[0]->name ) }}</span>
            <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 group-hover:text-blue-500 dark:group-hover:text-blue-400 transition-all">{{ $post->title }}</h3>
          </div>
        </a>
        @endforeach
      </div>
    </div>
  </div>

@endforeach

    <!-- Footer Section -->
    <x-footer></x-footer>

@endsection
