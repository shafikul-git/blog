@extends('header')
@section('title', 'Comment Edit/ ' . $data->name)
@section('otherConetent')
@php
$inputStyle =
    'block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer';
$labelClass =
    'peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 capitalize';
@endphp
    <!-- Nav Section -->
    <x-navbar></x-navbar>
    <div class="max-w-lg mx-auto p-6 bg-white dark:bg-gray-800 shadow-md rounded-lg">
    <x-form id="UpdateComment" action="{{ route('comment.update',  $data->id) }}" animationBtn="Submit" method="PUT"
        :fields="[
            [
                'type' => 'text',
                'name' => 'name',
                'id' => 'name',
                'placeholder' => '',
        'value' => $data->name,
                'label' => [
                    'name' => 'Enter Name*',
                    'class' => $labelClass,
                ],
                'class' => $inputStyle,
            ],
            [
                'type' => 'text',
                'name' => 'website',
                'id' => 'website',
                'placeholder' => '',
                'value' => $data->website,
                'label' => [
                    'name' => 'Enter Website',
                    'class' => $labelClass,
                ],
                'class' => $inputStyle,
            ],
        ]" class="max-w-full">

        <label for="comment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your message*</label>
        <textarea name="comment" id="comment" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your Reply here...">{{ $data->comment }}</textarea>
    </x-form>
    </div>
    <!-- Footer Section -->
    <x-footer></x-footer>

@endsection
