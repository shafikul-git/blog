@foreach ($otherAllCategory as $categorys)
<li class="mb-2">
    <a href="{{ route('singlePost', $categorys->slug) }}" class="block group">
        <div
            class="bg-white dark:bg-gray-800 shadow-[0_4px_12px_-5px_rgba(0,0,0,0.4)] dark:shadow-[0_4px_12px_-5px_rgba(0,0,0,0.7)] w-full max-w-sm rounded-lg font-[sans-serif] overflow-hidden mx-auto transition-transform transform group-hover:scale-105">
            <div
                class="flex flex-wrap items-center cursor-pointer shadow-[0_2px_6px_-1px_rgba(0,0,0,0.3)] dark:shadow-[0_2px_6px_-1px_rgba(0,0,0,0.6)] rounded-lg w-full p-4 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                <div class="ml-4 flex-1">
                    <p
                        class="text-sm text-gray-800 dark:text-gray-200 font-semibold w-[150px] sm:w-[240px] md:w-[120px] whitespace-nowrap overflow-hidden text-ellipsis group-hover:underline capitalize">
                        {{ $categorys->name }}
                    </p>
                    <p
                        class="text-xs text-gray-500 dark:text-gray-400 mt-0.5 w-[150px]  sm:w-[250px] md:w-[120px] whitespace-nowrap overflow-hidden text-ellipsis capitalize">
                        {{ $categorys->description }}
                    </p>
                </div>
            </div>
        </div>
    </a>
</li>
@endforeach
