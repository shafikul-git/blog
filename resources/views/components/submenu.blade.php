<ul
    class='absolute top-5 max-lg:top-8 left-0 z-50 block space-y-2 shadow-lg bg-white max-h-0 overflow-hidden min-w-[250px] group-hover/{{ $nextId }}:opacity-100 group-hover/{{ $nextId }}:max-h-[700px] px-6 group-hover/{{ $nextId }}:pb-4 group-hover/{{ $nextId }}:pt-6 transition-all duration-500'>
    @foreach ($subMenu as $menu)
        @php
            $nextUniquId = uniqid();
        @endphp
        <li class='border-b py-3 group/{{ $nextUniquId }}'>
            <a href="{{ $menu->menu_link }}"
                class='hover:text-[#007bff] hover:fill-[#007bff] text-gray-600 font-semibold text-[15px] block'>
                {!! $menu->menu_icon !!}
                {{ $menu->sub_menu_name }}
                @if ($menu->subMenu->isNotEmpty())
                    <i class="fa-solid fa-angle-down"></i>
                @endif
            </a>
            @if ($menu->subMenu->isNotEmpty())
                @include('components.submenu', ['subMenu' => $menu->subMenu, 'nextId' => $nextUniquId ])
            @endif

        </li>
    @endforeach
</ul>
