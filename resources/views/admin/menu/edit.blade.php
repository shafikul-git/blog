@extends('admin.dashboard')
@section('title', 'Category View')
@section('adminContent')
    @php
        $inputStyle =
            'block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer';
        $labelClass =
            'peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 capitalize';

        if ($menuData[0]->menu_name) {
            $editMenu = [
                'type' => 'text',
                'name' => 'menu_name',
                'id' => 'menu_name',
                'placeholder' => '',
                'label' => [
                    'name' => 'Enter Your  menu Name here',
                    'class' => $labelClass,
                ],
                'class' => $inputStyle,
                'value' => $menuData[0]->menu_name,
            ];
        } else {
            $editMenu = [
                'type' => 'text',
                'name' => 'sub_menu_name',
                'id' => 'sub_menu_name',
                'placeholder' => '',
                'label' => [
                    'name' => 'Enter Your  sub menu name here',
                    'class' => $labelClass,
                ],
                'class' => $inputStyle,
                'value' => $menuData[0]->sub_menu_name,
            ];
        }
    @endphp
    <x-form action="{{ route('menu.update', $menuData[0]->id) }}" method="PUT" :fields="[
        $editMenu,
        [
            'type' => 'text',
            'name' => 'menu_link',
            'id' => 'menu_link',
            'placeholder' => '',
            'label' => [
                'name' => 'Enter Your  menu Name here',
                'class' => $labelClass,
            ],
            'class' => $inputStyle,
            'value' => $menuData[0]->menu_link
        ],
    ]" animationBtn="Submit">

    </x-form>
@endsection
