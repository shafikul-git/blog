<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-center dark:text-gray-100">Home Page Settings</h1>
    </div>
    <form class="bg-white dark:bg-gray-800 p-8 shadow-lg rounded-lg space-y-6" action="{{ route('setting.store') }}" method="POST">
        @csrf
        <div>
            <label for="firstCategoryCard"
                class="block text-sm font-medium text-gray-700 dark:text-gray-300 capitalize">first Category Card</label>
            <x-select id="firstCategoryCard" :data="$data" :selectedData="$settings"  name="firstCategoryCard" class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-100" > </x-select>
            @error('firstCategoryCard')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="secondCategoryCard"
                class="block text-sm font-medium text-gray-700 dark:text-gray-300 capitalize">second Category
                Card</label>
                <x-select id="secondCategoryCard" name="secondCategoryCard" :data="$data" :selectedData="$settings" class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-100"> </x-select>
                @error('secondCategoryCard')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
        </div>

        <div>
            <label for="threadCategoryCard"
                class="block text-sm font-medium text-gray-700 dark:text-gray-300 capitalize">thrad Category
                Card</label>
                <x-select id="threadCategoryCard" name="threadCategoryCard" :data="$data" :selectedData="$settings" class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-100" > </x-select>
                @error('threadCategoryCard')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="fourCategoryCard"
                class="block text-sm font-medium text-gray-700 dark:text-gray-300 capitalize">four Category Card</label>
                <x-select id="fourCategoryCard" name="fourCategoryCard" :data="$data" :selectedData="$settings" class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-100" > </x-select>
                @error('fourCategoryCard')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="sliderCategory"
                class="block text-sm font-medium text-gray-700 dark:text-gray-300 capitalize">slider Category
                Card</label>
                <x-select id="sliderCategory" name="sliderCategory" :data="$data" :selectedData="$settings" class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-100" > </x-select>
                @error('sliderCategory')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Save Button -->
        <div class="text-center">
            <button type="submit"
                class="w-full md:w-auto px-4 py-2 bg-blue-600 dark:bg-blue-500 text-white font-semibold rounded-md shadow-md hover:bg-blue-700 dark:hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Save Changes
            </button>
        </div>

    </form>
</div>
