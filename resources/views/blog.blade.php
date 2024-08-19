@extends('header')
@section('title', 'Blog')
@section('otherConetent')

    <!-- Nav Section -->
    <x-navbar></x-navbar>

@foreach ($blogDatas as $blogData)
<div class="bg-white dark:bg-gray-900 font-[sans-serif]">
    <div class="max-w-7xl mx-auto py-12">
      <div class="text-center">
        <h2 class="text-3xl font-extrabold text-[#333] dark:text-white inline-block relative after:absolute after:w-4/6 after:h-1 after:left-0 after:right-0 after:-bottom-4 after:mx-auto after:bg-pink-400 dark:after:bg-pink-500 after:rounded-full">
          LATEST BLOGS
        </h2>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 mt-16 max-md:max-w-lg mx-auto">
        <!-- Blog Post 1 -->
        <div class="bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 relative group">
          <img src="https://readymadeui.com/Imagination.webp" alt="Blog Post 1" class="w-full h-96 object-cover group-hover:scale-105 transition-transform duration-500" />
          <div class="p-6 absolute bottom-0 left-0 right-0 bg-white dark:bg-gray-800 bg-opacity-90 dark:bg-opacity-95 group-hover:bg-opacity-100 dark:group-hover:bg-opacity-100 transition-colors duration-300">
            <span class="text-sm block text-gray-600 dark:text-gray-400 mb-2">10 FEB 2023 | BY JOHN DOE</span>
            <h3 class="text-xl font-bold text-[#333] dark:text-white group-hover:text-pink-500 dark:group-hover:text-pink-400 transition-colors duration-300">A Guide to Igniting Your Imagination</h3>
            <div class="h-0 overflow-hidden group-hover:h-16 group-hover:mt-4 transition-all duration-300">
              <p class="text-gray-600 dark:text-gray-400 text-sm">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis accumsan, nunc et tempus blandit, metus mi consectetur felis turpis vitae ligula.
              </p>
            </div>
          </div>
        </div>
        <!-- Blog Post 2 -->
        <div class="bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 relative group">
          <img src="https://readymadeui.com/hacks-watch.webp" alt="Blog Post 2" class="w-full h-96 object-cover group-hover:scale-105 transition-transform duration-500" />
          <div class="p-6 absolute bottom-0 left-0 right-0 bg-white dark:bg-gray-800 bg-opacity-90 dark:bg-opacity-95 group-hover:bg-opacity-100 dark:group-hover:bg-opacity-100 transition-colors duration-300">
            <span class="text-sm block text-gray-600 dark:text-gray-400 mb-2">7 JUN 2023 | BY MARK ADAIR</span>
            <h3 class="text-xl font-bold text-[#333] dark:text-white group-hover:text-pink-500 dark:group-hover:text-pink-400 transition-colors duration-300">Hacks to Supercharge Your Day</h3>
            <div class="h-0 overflow-hidden group-hover:h-16 group-hover:mt-4 transition-all duration-300">
              <p class="text-gray-600 dark:text-gray-400 text-sm">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis accumsan, nunc et tempus blandit, metus mi consectetur felis turpis vitae ligula.
              </p>
            </div>
          </div>
        </div>
        <!-- Blog Post 3 -->
        <div class="bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 relative group">
          <img src="https://readymadeui.com/prediction.webp" alt="Blog Post 3" class="w-full h-96 object-cover group-hover:scale-105 transition-transform duration-500" />
          <div class="p-6 absolute bottom-0 left-0 right-0 bg-white dark:bg-gray-800 bg-opacity-90 dark:bg-opacity-95 group-hover:bg-opacity-100 dark:group-hover:bg-opacity-100 transition-colors duration-300">
            <span class="text-sm block text-gray-600 dark:text-gray-400 mb-2">5 OCT 2023 | BY SIMON KONECKI</span>
            <h3 class="text-xl font-bold text-[#333] dark:text-white group-hover:text-pink-500 dark:group-hover:text-pink-400 transition-colors duration-300">Trends and Predictions</h3>
            <div class="h-0 overflow-hidden group-hover:h-16 group-hover:mt-4 transition-all duration-300">
              <p class="text-gray-600 dark:text-gray-400 text-sm">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis accumsan, nunc et tempus blandit, metus mi consectetur felis turpis vitae ligula.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


@endforeach

    <!-- Footer Section -->
    <x-footer></x-footer>

@endsection
