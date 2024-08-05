@extends('admin.dashboard')
@section('title', 'Category View')
@section('adminContent')

@php
    $inputStyle = 'block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer';
@endphp

    <x-form action="{{ route('menu.store') }}" animationBtn="Working" method="POST" formHeading="Menu Add Form" :fields="[
        [
            'type' => 'text',
            'name' => 'menu',
            'id' => 'menu',
            'placeholder' => '',
            'label' => 'Enter Your Menu Name here',
            'value' => '',
            'class' => $inputStyle
        ],
        [
            'type' => 'text',
            'name' => 'sub_menu',
            'id' => 'sub_menu',
            'placeholder' => '',
            'label' => 'Enter Your sub menu Name here',
            'value' => '',
            'class' => $inputStyle
        ],
        [
            'type' => 'text',
            'name' => 'menu_link',
            'id' => 'menu_link',
            'placeholder' => '',
            'label' => 'Enter Your menu Link Name here',
            'value' => Route('home') . '/',
            'class' => $inputStyle
        ],
    ]" class="max-w-md mx-auto">
        <label for="main_menu_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white capitalize">Select Main
            menu <sub class="text-green-500">(if you need)</sub> </label>
        <select id="main_menu_id" name="main_menu_id"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected disabled>Select Menu</option>
            @foreach ($mainMenu as $menus)
                <option value="{{ $menus['id'] }}"> {{ $menus['menu'] }} </option>
            @endforeach
        </select>
    </x-form>

    @once
        @if (session('success') || session('error'))
            <x-alert :success="session('success')" :error="session('error')"></x-alert>
        @endif
    @endonce
@endsection
