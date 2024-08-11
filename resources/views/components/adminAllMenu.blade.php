@props([
    'menuItem' => [],
])
<ul>
    @foreach ($menuItem as $subMenus)
    <li class=" font-bold  dark:text-white dark:bg-gray-700 bg-white w-max-full py-3 my-6 ml-5 hover:bg-gray-800 transition-all cursor-move rounded-md shadow-[0px_5px_10px_2px_#{{rand(100000,200000)}}]">
        <div class="flex justify-between items-start px-5">
            <h3 class="capitalize">{{ $subMenus->sub_menu_name }}</h3>
            <div class="flex gap-6">
                <x-form method="DELETE" action="{{route('menu.destroy', $subMenus->id)}}" iconBtn="<i class='fa-solid fa-trash-can hover:text-red-700 text-red-500 text-xl'></i>"></x-form>
                <a href="{{route('menu.edit', $subMenus->id)}}">
                    <i class="fa-regular fa-pen-to-square hover:text-green-600 text-green-400 text-xl"></i>
                </a>
            </div>
        </div>
        @if ($subMenus->subMenu->isNotEmpty())
            <x-adminAllMenu :menuItem="$subMenus->subMenu"></x-adminAllMenu>
        @endif
    </li>
    @endforeach
</ul>