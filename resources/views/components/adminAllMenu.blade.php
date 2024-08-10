@props([
    'menuItem' => [],
])
<ul>
    @foreach ($menuItem as $subMenus)
    <li class=" font-bold  dark:text-white dark:bg-gray-700 bg-white w-max-full py-3 my-6 ml-5 hover:bg-gray-800 transition-all cursor-move rounded-md shadow-[0px_5px_10px_2px_#63b3ed]">
        <div class="flex justify-between items-start px-5">
            <h3>{{ $subMenus->sub_menu_name }}</h3>
            <div class="flex gap-6">
                <i class="fa-solid fa-trash-can hover:text-red-700 text-red-500 cursor-pointer text-xl"></i>
                <i class="fa-regular fa-pen-to-square hover:text-green-600 text-green-400 cursor-pointer text-xl"></i>
            </div>
        </div>
        @if ($subMenus->subMenu->isNotEmpty())
            <x-adminAllMenu :menuItem="$subMenus->subMenu"></x-adminAllMenu>
        @endif
    </li>
    @endforeach
</ul>