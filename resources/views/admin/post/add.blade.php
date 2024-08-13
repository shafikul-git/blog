@extends('admin.dashboard')
@section('title', 'Post Create')
@section('adminContent')
    @php
        $inputStyle =
            'block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer';
        $labelClass =
            'peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 capitalize';
    @endphp

    {{-- <x-form action="{{ route('post.store') }}" method="POST" formHeading="Post Data Form" enctype="multipart/form-data"
        :fields="[
            [
                'type' => 'text',
                'name' => 'title',
                'id' => 'title',
                'placeholder' => '',
                'label' => [
                    'name' => 'Enter Post title here',
                    'class' => $labelClass,
                ],
                'class' => $inputStyle,
            ],
            [
                'type' => 'text',
                'name' => 'slug',
                'id' => 'slug',
                'placeholder' => '',
                'label' => [
                    'name' => 'Enter post slug here',
                    'class' => $labelClass,
                ],
                'class' => $inputStyle,
            ],
            [
                'type' => 'text',
                'name' => 'meta_title',
                'id' => 'meta_title',
                'placeholder' => '',
                'label' => [
                    'name' => 'Enter Post meta Title here',
                    'class' => $labelClass,
                ],
                'class' => $inputStyle,
            ],
            [
                'type' => 'text',
                'name' => 'meta_keywords',
                'id' => 'meta_keywords',
                'placeholder' => '',
                'label' => [
                    'name' => 'Enter Post meta keywords here',
                    'class' => $labelClass,
                ],
                'class' => $inputStyle,
            ],
            [
                'type' => 'text',
                'name' => 'meta_description',
                'id' => 'meta_description',
                'placeholder' => '',
                'label' => [
                    'name' => 'Enter Post meta description here',
                    'class' => $labelClass,
                ],
                'class' => $inputStyle,
            ],
            [
                'type' => 'datetime-local',
                'name' => 'published_at',
                'id' => 'published_at',
                'placeholder' => '',
                'label' => [
                    'name' => 'Publish Date',
                    'class' => $labelClass,
                ],
                'class' => $inputStyle,
            ],
            [
                'type' => 'file',
                'name' => 'featured_image',
                'id' => 'featured_image',
                'placeholder' => '',
                'label' => [
                    'name' => 'File Upload ',
                    'class' => $labelClass,
                ],
                'class' => $inputStyle,
            ],
        ]" >
        <div class="mt-4">
            <select class="capitalize" name="status" id="status">
                <option value="published">published</option>
                <option value="pending">pending</option>
                <option value="draft">draft</option>
                <option value="archived">archived</option>
            </select>
            @error('status')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
        
        <x-tiny.tiny name="content" rows="20" cols="40"></x-tiny.tiny>

        <input type="submit" value="extra submit" class="text-green-400 py-2 px-4 capitalize text-3xl bg-gray-500 hover:bg-black hover:text-white">
        
    </x-form> --}}

<form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container mx-auto">
        <div class="lg:flex">
            <!-- Left Side: 3/4 of the page -->
            <div class="lg:w-3/4 w-full lg:pr-4">
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 dark:text-gray-300">Title</label>
                    <input value="{{ old('title') }}" type="text" name="title" id="title" placeholder="Enter title" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('title')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="slug" class="block text-gray-700 dark:text-gray-300">Slug</label>
                    <input value="{{ old('slug') }}" type="text" id="slug" name="slug" placeholder="Enter slug" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('slug')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
               
                <!-- Seo Work -->
                <div class="mb-4">
                    <label for="meta_title" class="block text-gray-700 dark:text-gray-300">Meta Title</label>
                    <input value="{{ old('meta_title') }}" type="text" name="meta_title" id="meta_title" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Meta Title">
                    @error('meta_title')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="meta_description" class="block text-gray-700 dark:text-gray-300">Meta Description</label>
                    <textarea id="meta_description" name="meta_description" rows="10" placeholder="Enter Meta Description" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('meta_description') }} </textarea>
                    @error('meta_description')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <!--<input type="text" name="meta_description" id="" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Meta Description"> -->
                
            </div>
    
            <!-- Right Side: 1/4 of the page -->
            <div class="lg:w-1/4 w-full">
                <div class="mb-4">
                    <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-blue-700 dark:hover:bg-blue-800"> Submit </button>
                </div>
                <div class="mb-4">
                    <label for="status" class="block text-gray-700 dark:text-gray-300 capitalize">select Status</label>
                    <select id="status" name="status" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 capitalize">
                        <option value="draft">draft</option>
                        <option value="published" selected>published</option>
                        <option value="archived">archived</option>
                        <option value="pending">pending</option>
                    </select>
                    @error('status')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="meta_keywords" class="block text-gray-700 dark:text-gray-300">Meta Keyword</label>
                    <input value="{{ old('meta_keywords') }}" type="text" name="meta_keywords" id="meta_keywords" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Meta Keyword">
                    @error('meta_keywords')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="published_at" class="block text-gray-700 dark:text-gray-300">Publish Date</label>
                    <input value="{{ old('published_at') }}" type="datetime-local" id="published_at" name="published_at" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('published_at')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="featured_image" class="block text-gray-700 dark:text-gray-300">Featured Image</label>
                    <input type="file" name="featured_image" id="featured_image" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('featured_image')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <x-tags></x-tags>
                </div>
                <div class="mb-4">
                    <x-category></x-category>
                </div>
                
            </div>
        </div>
    </div>

    <div class="mb-4">
        <label for="content" class="block text-gray-700 dark:text-gray-300">Content</label>
        <x-tiny.tiny name="content" rows="20" cols="40" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"></x-tiny.tiny>
    </div>
    @error('content')
        <p class="text-red-500">{{ $message }}</p>
    @enderror
</form>
      
      

    
@endsection
