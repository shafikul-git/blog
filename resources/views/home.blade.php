@extends('layouts.frontendLayout')
@section('title', 'Home')
@section('otherConetent')
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
    <!-- Nav Section -->
    <x-navbar></x-navbar>

    {{-- Hero Section --}}
    @include('Frontend.heroSection')

    <!-- block news -->
    <div class="bg-white">
        <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
            <div class="flex flex-row flex-wrap">
                <!-- Left -->
                <div class="flex-shrink max-w-full w-full lg:w-2/3 overflow-hidden">
                    <div class="w-full py-3">
                        <h2 class="text-gray-800 text-2xl font-bold">
                            <span class="inline-block h-5 border-l-3 border-red-600 mr-2"></span>Europe
                        </h2>
                    </div>
                    <div class="flex flex-row flex-wrap -mx-3">


                        <x-card
                            class="flex-shrink max-w-full w-full sm:w-1/3 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100"
                            blockClass="flex flex-row sm:block hover-img" blockClass="py-0 sm:py-3 pl-3 sm:pl-0"></x-card>
                        <x-card
                            class="flex-shrink max-w-full w-full sm:w-1/3 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100"
                            blockClass="flex flex-row sm:block hover-img" blockClass="py-0 sm:py-3 pl-3 sm:pl-0"></x-card>
                        <x-card
                            class="flex-shrink max-w-full w-full sm:w-1/3 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100"
                            blockClass="flex flex-row sm:block hover-img" blockClass="py-0 sm:py-3 pl-3 sm:pl-0"></x-card>
                        <x-card
                            class="flex-shrink max-w-full w-full sm:w-1/3 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100"
                            blockClass="flex flex-row sm:block hover-img" blockClass="py-0 sm:py-3 pl-3 sm:pl-0"></x-card>

                    </div>
                </div>
                <!-- right -->
                <div class="flex-shrink max-w-full w-full lg:w-1/3 lg:pl-8 lg:pt-14 lg:pb-8 order-first lg:order-last">
                    <div class="w-full bg-gray-50 h-full">
                        <div class="text-sm py-6 sticky">
                            <div class="w-full text-center">
                                <a class="uppercase" href="#">Advertisement</a>
                                <a href="#">
                                    <img class="mx-auto" src="{{ asset('img/ads/250.jpg') }}" alt="advertisement area">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- slider news -->
    <!-- Wait -->
    <!-- slider news End -->


    <!-- block news -->
    <div class="bg-white py-6">
        <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
            <div class="flex flex-row flex-wrap">
                <div class="flex-shrink max-w-full w-full overflow-hidden">
                    <div class="w-full py-3">
                        <h2 class="text-gray-800 text-2xl font-bold">
                            <span class="inline-block h-5 border-l-3 border-red-600 mr-2"></span>Africa
                        </h2>
                    </div>
                    <div class="flex flex-row flex-wrap -mx-3">
                        <x-card
                            class="flex-shrink max-w-full w-full sm:w-1/3 lg:w-1/4 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100"
                            blockClass="flex flex-row sm:block hover-img" contentBlockClass="py-0 sm:py-3 pl-3 sm:pl-0" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- block news -->
    <div class="bg-gray-50 py-6">
        <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
            <div class="flex flex-row flex-wrap">
                <!-- post -->
                <div class="flex-shrink max-w-full w-full lg:w-2/3 overflow-hidden">
                    <div class="w-full py-3">
                        <h2 class="text-gray-800 text-2xl font-bold">
                            <span class="inline-block h-5 border-l-3 border-red-600 mr-2"></span>Latest news
                        </h2>
                    </div>
                    <div class="flex flex-row flex-wrap -mx-3">


                        <x-card class="flex-shrink max-w-full w-full px-3 pb-5"
                            blockClass="relative hover-img max-h-98 overflow-hidden"
                            contentBlockClass="absolute px-5 pt-8 pb-5 bottom-0 w-full bg-gradient-cover" />

                        {{-- throw Loop --}}
                        <x-card
                            class="flex-shrink max-w-full w-full sm:w-1/3 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100"
                            blockClass="flex flex-row sm:block hover-img" contentBlockClass="py-0 sm:py-3 pl-3 sm:pl-0" />
                        <x-card
                            class="flex-shrink max-w-full w-full sm:w-1/3 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100"
                            blockClass="flex flex-row sm:block hover-img" contentBlockClass="py-0 sm:py-3 pl-3 sm:pl-0" />
                        <x-card
                            class="flex-shrink max-w-full w-full sm:w-1/3 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100"
                            blockClass="flex flex-row sm:block hover-img" contentBlockClass="py-0 sm:py-3 pl-3 sm:pl-0" />
                        <x-card
                            class="flex-shrink max-w-full w-full sm:w-1/3 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100"
                            blockClass="flex flex-row sm:block hover-img" contentBlockClass="py-0 sm:py-3 pl-3 sm:pl-0" />


                    </div>
                </div>
                <!-- sidebar -->
                <div class="flex-shrink max-w-full w-full lg:w-1/3 lg:pr-8 lg:pt-14 lg:pb-8 order-first">
                    <div class="w-full bg-white">
                        <div class="mb-6">
                            <div class="p-4 bg-gray-100">
                                <h2 class="text-lg font-bold">Most Popular</h2>
                            </div>
                            <ul class="post-number">
                                <li class="border-b border-gray-100 hover:bg-gray-50">
                                    <a class="text-lg font-bold px-6 py-3 flex flex-row items-center" href="#">Why the
                                        world would end
                                        without political polls</a>
                                </li>
                                <li class="border-b border-gray-100 hover:bg-gray-50">
                                    <a class="text-lg font-bold px-6 py-3 flex flex-row items-center" href="#">Meet
                                        The Man Who Designed
                                        The Ducati Monster</a>
                                </li>
                                <li class="border-b border-gray-100 hover:bg-gray-50">
                                    <a class="text-lg font-bold px-6 py-3 flex flex-row items-center" href="#">2020
                                        Audi R8 Spyder spy
                                        shots release</a>
                                </li>
                                <li class="border-b border-gray-100 hover:bg-gray-50">
                                    <a class="text-lg font-bold px-6 py-3 flex flex-row items-center"
                                        href="#">Lamborghini makes Huracán
                                        GT3 racer faster for 2019</a>
                                </li>
                                <li class="border-b border-gray-100 hover:bg-gray-50">
                                    <a class="text-lg font-bold px-6 py-3 flex flex-row items-center" href="#">ZF
                                        plans $14 billion
                                        autonomous vehicle push, concept van</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="text-sm py-6 sticky">
                        <div class="w-full text-center">
                            <a class="uppercase" href="#">Advertisement</a>
                            <a href="#">
                                <img class="mx-auto" src="{{ asset('img/ads/250.jpg') }}" alt="advertisement area">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <x-footer></x-footer>

@endsection
