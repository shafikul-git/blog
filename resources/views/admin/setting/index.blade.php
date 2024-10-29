@extends('admin.dashboard')
@section('title', 'Setting Home Page')
@section('adminContent')
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-center dark:text-gray-100">General Settings</h1>
        </div>

        <form class="bg-white dark:bg-gray-800 p-8 shadow-lg rounded-lg space-y-6">
            <!-- Site Name -->
            <div>
                <label for="site-name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Site Name</label>
                <input type="text" id="site-name" placeholder="Enter your site name"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-100">
            </div>

            <!-- Site Logo -->
            <div>
                <label for="site-logo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Site Logo</label>
                <input type="file" id="site-logo"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none dark:bg-gray-700 dark:text-gray-100">
            </div>

            <!-- Tagline -->
            <div>
                <label for="tagline" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tagline</label>
                <input type="text" id="tagline" placeholder="Enter your tagline"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-100">
            </div>

            <!-- Language Setting -->
            <div>
                <label for="language" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Language</label>
                <select id="language"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-100">
                    <option value="en">English</option>
                    <option value="bn">Bengali</option>
                </select>
            </div>

            <!-- Timezone -->
            <div>
                <label for="timezone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Timezone</label>
                <select id="timezone"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-100">
                    <option value="Asia/Dhaka">Asia/Dhaka</option>
                    <option value="America/New_York">America/New_York</option>
                </select>
            </div>

            <!-- Default Post Page -->
            <div>
                <label for="default-post-page" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Default
                    Post Page</label>
                <input type="url" id="default-post-page" placeholder="Enter homepage or specific post page URL"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-100">
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

    @include('admin.setting.homePage', ['data' => $categorys])
@endsection
