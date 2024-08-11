@extends('admin.dashboard')
@section('title', 'Post Create')
@section('adminContent')
    @php
        $inputStyle =
            'block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer';
        $labelClass =
            'peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 capitalize';
    @endphp

    <x-form action="{{ route('post.store') }}" animationBtn="Submit" method="POST" formHeading="Post Data Form" enctype="multipart/form-data"
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
        ]" class="max-w-md mx-auto">
        <div class="mt-4">
            <select name="status" id="status">
                <option class="capitalize" value="published">published</option>
                <option class="capitalize" value="pending">pending</option>
                <option class="capitalize" value="draft">draft</option>
                <option class="capitalize" value="archived">archived</option>
            </select>
            @error('status')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mt-4">
            <textarea name="content" id="content" cols="30" rows="10">{{ old('content') }}</textarea>
            @error('content')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
    </x-form>
@endsection
