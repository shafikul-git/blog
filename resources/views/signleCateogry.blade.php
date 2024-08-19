@extends('header')
@section('title', 'Categories/ ' . $datas->name)
@section('otherConetent')

    <!-- Nav Section -->
    <x-navbar></x-navbar>

    <div class="bg-white dark:bg-gray-900 font-[sans-serif]">
        <div class="max-w-7xl mx-auto py-12">
          <div class="text-center">
            <span class="inline-block relative after:absolute after:w-4/6 after:h-1 after:left-0 after:right-0 after:-bottom-4 after:mx-auto after:bg-pink-400 dark:after:bg-pink-500 after:rounded-full">
                <h2 class="text-3xl font-extrabold text-[#333] dark:text-white capitalize"> {{ $datas->name }} </h2>
                <p class="dark:text-white mt-2">{{ ucfirst($datas->description) }}</p>
            </span>
          </div>
          <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-16 max-md:max-w-lg mx-auto p-4">
            @foreach ($post as $data)
            <div class="bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 relative group">
              <img src="{{ asset('storage/' . $data->featured_image ) }}" alt="{{ $data->alt_name }}" class="w-full h-96 object-cover group-hover:scale-105 transition-transform duration-500" />
              <div class="p-6 absolute bottom-0 left-0 right-0 bg-white dark:bg-gray-800 bg-opacity-90 dark:bg-opacity-95 group-hover:bg-opacity-100 dark:group-hover:bg-opacity-100 transition-colors duration-300">
                <span class="text-sm block text-gray-600 dark:text-gray-400 mb-2 capitalize">
                    {{ Carbon\Carbon::parse($data->created_at)->diffForHumans() }}
                     | BY
                    {{$data->users[0]->name}}
                </span>
                    <a href="{{ route('singlePost', $data->slug) }}">
                        <h3 class="text-xl font-bold text-[#333] dark:text-white group-hover:text-pink-500 dark:group-hover:text-pink-400 transition-colors duration-300">{{ $data->title }}</h3>
                        <div class="h-0 overflow-hidden group-hover:h-16 group-hover:mt-4 transition-all duration-300">
                        <p class="text-gray-600 dark:text-gray-400 text-sm">{!! strip_tags($data->content) !!}</p>
                        </div>
                    </a>
              </div>
            </div>
            @endforeach
          </div>
          {{ $post->links() }}
        </div>
      </div>


    <!-- Footer Section -->
    <x-footer></x-footer>

@endsection
