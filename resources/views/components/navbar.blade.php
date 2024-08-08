{{-- @props([
    'menu' => [
        [
            'text' => 'home',
            'link' => 'www.youtube.com',
            'icon' => '',
        ],
        [
            'text' => 'home',
            'link' => '#',
            'icon' => '',
            'sub_link' => [
                [
                    'text' => 'home',
                    'link' => 'www.youtube.com',
                    'icon' => '<i class="fa-solid fa-arrow-right"></i>',
                ],
                [
                    'text' => 'home',
                    'link' => 'www.youtube.com',
                    'icon' => '',
                ],
            ],
        ],
        [
            'text' => 'home',
            'link' => 'www.youtube.com',
            'icon' => '',
        ],
        [
            'logo' => 'https://readymadeui.com/readymadeui.svg',
            'alt' => 'logo',
            'link' => 'http://127.0.0.1:8000/',
        ],
    ],
]) --}}




@php

    $menu = [
        [
            'id' => 15,
            'menu_name' => 'Home',
            'sub_menu_name' => null,
            'menu_link' => '# ',
            'main_menu_id' => null,
            'menu_icon' => "<i class=\"fa-solid fa-house\"></i>",
            'sub_menu' => [
                [
                    'id' => 18,
                    'menu_name' => null,
                    'sub_menu_name' => 'home page 1',
                    'menu_link' => '/page-1',
                    'main_menu_id' => 15,
                    'menu_icon' => "<i class=\"fa-solid fa-file\"></i>",
                    'sub_menu' => [],
                ],
                [
                    'id' => 19,
                    'menu_name' => null,
                    'sub_menu_name' => 'home page 2',
                    'menu_link' => '/page-2',
                    'main_menu_id' => 15,
                    'menu_icon' => null,
                    'sub_menu' => [],
                ],
            ],
        ],
        [
            'id' => 16,
            'menu_name' => 'About',
            'sub_menu_name' => null,
            'menu_link' => '/about',
            'main_menu_id' => null,
            'menu_icon' => "<i class=\"fa-solid fa-cloud\"></i>",
            'sub_menu' => [
                [
                    'id' => 20,
                    'menu_name' => null,
                    'sub_menu_name' => 'about page 1',
                    'menu_link' => '/about/page-1',
                    'main_menu_id' => 16,
                    'menu_icon' => null,
                    'sub_menu' => [
                        [
                            'id' => 25,
                            'menu_name' => null,
                            'sub_menu_name' => 'about sub page 1',
                            'menu_link' => '/about/page-1/page-1',
                            'main_menu_id' => 20,
                            'menu_icon' => null,
                            'sub_menu' => [],
                        ],
                        [
                            'id' => 26,
                            'menu_name' => null,
                            'sub_menu_name' => 'about sub page 2',
                            'menu_link' => '/about/page-1/page-2',
                            'main_menu_id' => 20,
                            'menu_icon' => null,
                            'sub_menu' => [],
                        ],
                    ],
                ],
                [
                    'id' => 21,
                    'menu_name' => null,
                    'sub_menu_name' => 'about page 2',
                    'menu_link' => '/about/page-2',
                    'main_menu_id' => 16,
                    'menu_icon' => null,
                    'sub_menu' => [],
                ],
                [
                    'id' => 24,
                    'menu_name' => null,
                    'sub_menu_name' => 'about page 3',
                    'menu_link' => '/about/page-3',
                    'main_menu_id' => 16,
                    'menu_icon' => null,
                    'sub_menu' => [],
                ],
            ],
        ],
        [
            'id' => 17,
            'menu_name' => 'Contact',
            'sub_menu_name' => null,
            'menu_link' => '/contact',
            'main_menu_id' => null,
            'menu_icon' => "<i class=\"fa-brands fa-slack\"></i>",
            'sub_menu' => [
                [
                    'id' => 22,
                    'menu_name' => null,
                    'sub_menu_name' => 'contact page 1',
                    'menu_link' => '/contact/page-1',
                    'main_menu_id' => 17,
                    'menu_icon' => null,
                    'sub_menu' => [],
                ],
            ],
        ],
        [
            'id' => 28,
            'menu_name' => 'Other Check',
            'sub_menu_name' => null,
            'menu_link' => '/other-check',
            'main_menu_id' => null,
            'menu_icon' => null,
            'sub_menu' => [
                [
                    'id' => 29,
                    'menu_name' => null,
                    'sub_menu_name' => 'other cehck',
                    'menu_link' => '/ot',
                    'main_menu_id' => 28,
                    'menu_icon' => null,
                    'sub_menu' => [
                        [
                            'id' => 30,
                            'menu_name' => null,
                            'sub_menu_name' => 'other check sub 1',
                            'menu_link' => '/oter-sub',
                            'main_menu_id' => 29,
                            'menu_icon' => null,
                            'sub_menu' => [
                                [
                                    'id' => 31,
                                    'menu_name' => null,
                                    'sub_menu_name' => 'again check',
                                    'menu_link' => '/again-checl',
                                    'main_menu_id' => 30,
                                    'menu_icon' => null,
                                    'sub_menu' => [
                                        [
                                            'id' => 32,
                                            'menu_name' => null,
                                            'sub_menu_name' => 'again 2',
                                            'menu_link' => '/again-3',
                                            'main_menu_id' => 31,
                                            'menu_icon' => null,
                                            'sub_menu' => [],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'id' => 135,
            'menu_name' => 'Check Empty',
            'sub_menu_name' => null,
            'menu_link' => '/Empty',
            'main_menu_id' => null,
            'menu_icon' => "<i class=\"fa-solid fa-house\"></i>",
            'sub_menu' => [],
        ],
    ];


    // function renderMenu($menu) {
    //     $html = '';

    //     foreach ($menu as $menuContent) {
    //         $hasSubMenu = !empty($menuContent['sub_menu']);
    //         $menuClass = $hasSubMenu ? 'group max-lg:border-b max-lg:px-3 max-lg:py-3 relative' : 'max-lg:border-b max-lg:px-3 max-lg:py-3';
    //         $linkClass = $hasSubMenu ? 'hover:text-[#007bff] hover:fill-[#007bff] text-gray-600 font-semibold text-[15px] block capitalize' : 'hover:text-[#007bff] text-[#007bff] font-semibold block text-[15px] capitalize';

    //         $html .= '<li class="' . $menuClass . '">';
    //         $html .= '<a href="' . $menuContent['menu_link'] . '" class="' . $linkClass . '">';
    //         $html .= $menuContent['menu_name'] ? $menuContent['menu_name'] : $menuContent['sub_menu_name'];
    //         if ($hasSubMenu) {
    //             $html .= ' <i class="fa-solid fa-angle-down mr-4 inline-block"></i>';
    //         }
    //         $html .= '</a>';

    //         if ($hasSubMenu) {
    //             $html .= '<ul class="absolute top-5 max-lg:top-8 left-0 z-50 block space-y-2 shadow-lg bg-white max-h-0 overflow-hidden min-w-[250px] group-hover:opacity-100 group-hover:max-h-[700px] px-6 group-hover:pb-4 group-hover:pt-6 transition-all duration-500">';
    //             $html .= renderMenu($menuContent['sub_menu']);
    //             $html .= '</ul>';
    //         }

    //         $html .= '</li>';
    //     }

    //     return $html;
    // }
@endphp

<header class='shadow-md bg-white font-[sans-serif] tracking-wide relative z-50'>

    {{-- Top Section --}}
    <section
        class='flex items-center flex-wrap lg:justify-center gap-4 py-3 sm:px-10 px-4 border-gray-200 border-b min-h-[75px]'>
        {{-- Left Side Top Menu --}}
        <div class='left-10 absolute z-50 bg-gray-100 flex px-4 py-3 rounded max-lg:hidden'>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192.904 192.904" width="20px"
                class="cursor-pointer fill-gray-400 mr-6 rotate-90 inline-block">
                <path
                    d="m190.707 180.101-47.078-47.077c11.702-14.072 18.752-32.142 18.752-51.831C162.381 36.423 125.959 0 81.191 0 36.422 0 0 36.423 0 81.193c0 44.767 36.422 81.187 81.191 81.187 19.688 0 37.759-7.049 51.831-18.751l47.079 47.078a7.474 7.474 0 0 0 5.303 2.197 7.498 7.498 0 0 0 5.303-12.803zM15 81.193C15 44.694 44.693 15 81.191 15c36.497 0 66.189 29.694 66.189 66.193 0 36.496-29.692 66.187-66.189 66.187C44.693 147.38 15 117.689 15 81.193z">
                </path>
            </svg>
            <input type='text' placeholder='Search...' class="outline-none bg-transparent w-full text-sm" />
        </div>

        {{-- Middle Side --}}
        <a href="#" class="shrink-0"><img src="https://readymadeui.com/readymadeui.svg" alt="logo"
                class='md:w-[170px] w-36' />
        </a>

        {{-- Right Side Top Menu --}}
        <div class="lg:absolute lg:right-10 flex items-center ml-auto space-x-8">
            <span class="relative">
                <i
                    class="fa-regular fa-heart cursor-pointer fill-[#333] hover:text-[#007bff] inline-block text-[1.4rem]"></i>
                <span class="absolute left-auto -ml-1 top-0 rounded-full bg-black px-1 py-0 text-xs text-white">1</span>
            </span>
            <span class="relative">
                <i
                    class="fa-regular fa-bell cursor-pointer fill-[#333] hover:text-[#007bff] inline-block text-[1.4rem]"></i>
                <span class="absolute left-auto -ml-1 top-0 rounded-full bg-black px-1 py-0 text-xs text-white">4</span>
            </span>

            {{-- Login & Logout --}}
            @if (Route::has('login'))
                <div class="inline-block cursor-pointer border-gray-300">
                    @auth
                        <div class="relative font-[sans-serif] w-max mx-auto ">
                            <button
                                class="px-4 py-2 flex items-center rounded-full text-[#333] text-sm border border-gray-300 outline-none hover:bg-gray-100"
                                type="button" onclick="logOutButton()">
                                <img src="https://readymadeui.com/profile_6.webp"
                                    class="w-7 h-7 mr-3 rounded-full shrink-0"></img>
                                {{ Auth::user()->name }}
                                <i class="fa-solid fa-angle-down w-3 fill-gray-400 inline ml-3"></i>
                            </button>
                            <ul id="logOutDropDownMenu"
                                class='absolute hidden shadow-lg bg-white py-2 z-[1000] min-w-full w-max rounded-lg max-h-96 overflow-auto'>
                                <li
                                    class='py-2.5 px-5 flex items-center hover:bg-gray-100 text-[#333] text-sm cursor-pointer'>
                                    <a href="{{ route('profile.edit') }}">
                                        <i class="fa-regular fa-user w-4 h-4 mr-3"></i>
                                        View profile
                                    </a>
                                </li>
                                <li
                                    class='py-2.5 px-5 flex items-center hover:bg-gray-100 text-[#333] text-sm cursor-pointer'>
                                    <a href="{{ route('dashboard') }}">
                                        <i class="fa-regular fa-chart-bar w-4 h-4 mr-3"></i>
                                        Dashboard
                                    </a>
                                </li>
                                <li
                                    class='py-2.5 px-5 flex items-center hover:bg-gray-100 text-[#333] text-sm cursor-pointer'>
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <button type="submit">
                                            <i class="fa-solid fa-arrow-right-from-bracket w-4 h-4 mr-3"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <i class="fa-regular fa-user hover:text-[#007bff] cursor-pointer fill-[#333] inline-block text-[1.4rem]"
                            onclick="loginDropDown()"></i>
                        <div class="relative font-[sans-serif] w-max mx-auto">
                            <ul
                                class='absolute hidden loginIconToggle shadow-lg bg-white py-2 z-[1000] min-w-full w-max rounded-lg max-h-96 overflow-auto right-[-1.5rem] top-[1rem]'>
                                <li
                                    class='py-2.5 px-5 flex items-center hover:bg-gray-100 text-[#333] text-sm cursor-pointer'>
                                    <a href="{{ route('login') }}">
                                        <i class="fa-regular fa-user w-4 h-4 mr-3"></i>
                                        Login
                                    </a>
                                </li>

                                @if (Route::has('register'))
                                    <li
                                        class='py-2.5 px-5 flex items-center hover:bg-gray-100 text-[#333] text-sm cursor-pointer'>
                                        <a href="{{ route('register') }}"> <i
                                                class="fa-solid fa-arrow-right-from-bracket w-4 h-4 mr-3"></i>
                                            Registater
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    @endauth
                </div>
            @endif
        </div>
    </section>

    {{-- Next Section --}}
    <div class='flex flex-wrap justify-center px-10 py-3 relative'>
        {{-- Mobile Button Close --}}
        <div id="collapseMenu"
            class='max-lg:hidden lg:!block max-lg:before:fixed max-lg:before:bg-black max-lg:before:opacity-40 max-lg:before:inset-0 max-lg:before:z-50'>
            <button id="toggleClose" class='lg:hidden fixed top-2 right-4 z-[100] rounded-full bg-white p-3'>
                <i class="fa-solid fa-xmark w-4 fill-black font-bold"></i>
            </button>

            <ul class='lg:flex lg:gap-x-10 max-lg:space-y-3 max-lg:fixed max-lg:bg-white max-lg:w-2/3 max-lg:min-w-[300px] max-lg:top-0 max-lg:left-0 max-lg:p-4 max-lg:h-full max-lg:shadow-md max-lg:overflow-auto z-50 '>
                <li class='max-lg:border-b max-lg:pb-4 px-3 lg:hidden'>
                    <a href="#">
                        <img src="" alt="" class='w-36' />
                    </a>
                </li>
                @foreach ($menu as $menuContent)
                @php
                    $fastGroup = preg_replace('/[\/,@#-]/', '', $menuContent['menu_link']);
                @endphp
                    <li class="{{ $menuContent['sub_menu'] ? 'group/' . $fastGroup . ' max-lg:border-b max-lg:px-3 max-lg:py-3 relative' : 'max-lg:border-b max-lg:px-3 max-lg:py-3' }}">
                        @if ($menuContent['sub_menu'])
                            <a href="{{ $menuContent['menu_link'] }}" class='hover:text-[#007bff] hover:fill-[#007bff] text-gray-600 font-semibold text-[15px] block capitalize'>
                                {{ $menuContent['menu_name'] }}
                                <i class="fa-solid fa-angle-down mr-4 inline-block"></i>
                            </a>
                            <ul class='absolute top-5 max-lg:top-8 left-0 z-50 block space-y-2 shadow-lg bg-white max-h-0 overflow-hidden min-w-[250px] group-hover/{{$fastGroup}}:opacity-100 group-hover/{{$fastGroup}}:max-h-[700px] px-6 group-hover/{{$fastGroup}}:pb-4 group-hover/{{$fastGroup}}:pt-6 transition-all duration-500'>
                                @foreach ($menuContent['sub_menu'] as $many_sub_menu)
                                @php
                                    $groupStr = preg_replace('/[\/,@#-]/', '', $many_sub_menu['menu_link']);
                                @endphp
                                    <li class="{{ $many_sub_menu['sub_menu'] ? 'group/' . $groupStr . ' max-lg:border-b max-lg:px-3 max-lg:py-3 relative border-b py-3 ' : 'max-lg:border-b max-lg:px-3 max-lg:py-3 border-b py-3 ' }}">
                                        @if ($many_sub_menu['sub_menu'])
                                            <a href="{{ $many_sub_menu['menu_link'] }}" class='hover:text-[#007bff] hover:fill-[#007bff] text-gray-600 font-semibold text-[15px] block capitalize'>
                                                {!! $many_sub_menu['menu_icon'] !!} {{ $many_sub_menu['sub_menu_name'] }}
                                                <i class="fa-solid fa-angle-down mr-4 inline-block"></i>
                                            </a>
                                            <ul class='absolute top-5 max-lg:top-8 left-0 z-50 block space-y-2 shadow-lg bg-white max-h-0 overflow-hidden min-w-[250px] group-hover/{{$groupStr}}:opacity-100 group-hover/{{$groupStr}}:max-h-[700px] px-6 group-hover/{{$groupStr}}:pb-4 group-hover/{{$groupStr}}:pt-6 transition-all duration-500'>
                                                
                                                @foreach ($many_sub_menu['sub_menu'] as $menus)
                                                    @php
                                                        $thredGroup = preg_replace('/[\/,@#-]/', '', $menus['menu_link']);
                                                    @endphp
                                                <li class="{{ $menus['sub_menu'] ? 'group/' . $thredGroup . ' max-lg:border-b max-lg:px-3 max-lg:py-3 relative border-b py-3 ' : 'max-lg:border-b max-lg:px-3 max-lg:py-3 border-b py-3 ' }}">
                                                        @if ($menus['sub_menu'])
                                                            <a href="{{ $menus['menu_link'] }}" class='hover:text-[#007bff] hover:fill-[#007bff] text-gray-600 font-semibold text-[15px] block capitalize'>
                                                                {{ $menus['sub_menu_name'] }}
                                                                <i class="fa-solid fa-angle-down mr-4 inline-block"></i>
                                                            </a>
                                                        @else
                                                            <a href="{{ $menus['menu_link'] }}" class='hover:text-[#007bff] hover:fill-[#007bff] text-gray-600 font-semibold text-[15px] block capitalize'>
                                                                {!! $menus['menu_icon'] !!} {{ $menus['sub_menu_name'] }}
                                                            </a>
                                                        @endif
                                                    </li>
                                                @endforeach

                                                {{-- @foreach ($many_sub_menu['sub_menu'] as $menus)
                                                    <li class='border-b py-3'>
                                                        <a href="{{ $menus['menu_link'] }}" class='hover:text-[#007bff] hover:fill-[#007bff] text-gray-600 font-semibold text-[15px] block capitalize'>
                                                            {!! $menus['menu_icon'] !!} {{ $menus['sub_menu_name'] }}
                                                        </a>
                                                    </li>
                                                @endforeach --}}
                                            </ul>
                                        @else
                                            <a href="{{ $many_sub_menu['menu_link'] }}" class='hover:text-[#007bff] hover:fill-[#007bff] text-gray-600 font-semibold text-[15px] block capitalize'>
                                                {!! $many_sub_menu['menu_icon'] !!} {{ $many_sub_menu['sub_menu_name'] }}
                                            </a>
                                        @endif
                                    </li>
                                @endforeach

                            </ul>
                        @else
                            <a href="{{ $menuContent['menu_link'] }}" class="hover:text-[#007bff] text-[#007bff] font-semibold block text-[15px] capitalize">
                                {{ $menuContent['menu_name'] }} 
                            </a>
                        @endif
                    </li>
                @endforeach
                {{-- {!! renderMenu($menu) !!} --}}
            </ul>
        </div>

        {{-- Mobile Button Open --}}
        <div id="toggleOpen" class='flex ml-auto lg:hidden'>
            <button>
                <i class="fa-solid fa-bars w-7 h-7 text-2xl"></i>
            </button>
        </div>
    </div>
</header>


<script>
    var toggleOpen = document.getElementById('toggleOpen');
    var toggleClose = document.getElementById('toggleClose');
    var collapseMenu = document.getElementById('collapseMenu');

    function handleClick() {
        if (collapseMenu.style.display === 'block') {
            collapseMenu.style.display = 'none';
        } else {
            collapseMenu.style.display = 'block';
        }
    }

    toggleOpen.addEventListener('click', handleClick);
    toggleClose.addEventListener('click', handleClick);

    // Logout dropDown
    function logOutButton() {
        const logOutDropDownMenu = document.getElementById('logOutDropDownMenu');
        if (logOutDropDownMenu.classList.contains('hidden')) {
            logOutDropDownMenu.classList.replace('hidden', 'block');
        } else {
            logOutDropDownMenu.classList.replace('block', 'hidden');
        }
    }

    // User Login Toggle 
    function loginDropDown() {
        const loginIconToggle = document.querySelector('.loginIconToggle');
        if (loginIconToggle.classList.contains('hidden')) {
            loginIconToggle.classList.replace('hidden', 'block');
        } else {
            loginIconToggle.classList.replace('block', 'hidden');
        }
    }
</script>
