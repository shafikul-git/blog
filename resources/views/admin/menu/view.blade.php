@extends('admin.dashboard')
@section('title', 'Category View')
@section('adminContent')
   <x-button buttonText="Add Menu" action="{{ route('menu.create') }}"></x-button>
@foreach ($allMenuView as $menus)
    <ul>
        <li class="font-bold dark:text-white bg-gray-700 w-full py-3 my-6 hover:bg-gray-800 transition-all cursor-move rounded-md shadow-[0px_5px_10px_2px_#{{rand(100000,200000)}}]">
            <div class="flex justify-between items-start px-5">
                <h3 class="capitalize">{{ $menus->menu_name }}</h3>
                <div class="flex gap-6">
                    <x-form method="DELETE" action="{{route('menu.destroy', $menus->id)}}" iconBtn="<i class='fa-solid fa-trash-can hover:text-red-700 text-red-500 text-xl'></i>"></x-form>
                    <a href="{{route('menu.edit', $menus->id)}}">
                        <i class="fa-regular fa-pen-to-square hover:text-green-600 text-green-400 text-xl"></i>
                    </a>
                </div>
            </div>
            @if ($menus->subMenu->isNotEmpty())
                <x-adminAllMenu :menuItem="$menus->subMenu"></x-adminAllMenu>
            @endif
        </li>
    </ul>    
@endforeach

@endsection