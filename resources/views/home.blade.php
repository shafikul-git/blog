@extends('header')
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
                        <h2 class="text-gray-800 text-2xl font-bold capitalize">
                            <span class="inline-block h-5 border-l-3 border-red-600 mr-2"></span>
                            {{  $categoryNames['firstCategoryCard'] }}
                        </h2>
                    </div>
                        @include('Frontend.firstCategoryCard', ['data' => $categoryNames['firstCategoryCard']])
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
    <div class="relative bg-gray-50"
        style="background-image: url('https://cdn.pixabay.com/photo/2020/01/12/12/18/pixelated-4759868_1280.jpg');background-size: cover;background-position: center center;background-attachment: fixed">
        <div class="bg-black bg-opacity-70">
            <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
                <div class="flex flex-row flex-wrap">
                    <div class="flex-shrink max-w-full w-full py-12 overflow-hidden">
                        <div class="w-full py-3">
                            <h2 class="text-white text-2xl font-bold text-shadow-black capitalize">
                                <span class="inline-block h-5 border-l-3 border-red-600 mr-2"></span>
                                {{ $categoryNames['sliderCategory'] }}
                            </h2>
                        </div>

                        @include('Frontend.sliderCategory', ['data' => $categoryNames['sliderCategory']])
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider news End -->


    <!-- block news -->
    <div class="bg-white py-6">
        <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
            <div class="flex flex-row flex-wrap">
                <div class="flex-shrink max-w-full w-full overflow-hidden">
                    <div class="w-full py-3">
                        <h2 class="text-gray-800 text-2xl font-bold capitalize">
                            <span class="inline-block h-5 border-l-3 border-red-600 mr-2"></span>
                            {{ $categoryNames['secondCategoryCard'] }}
                        </h2>
                    </div>
                    @include('Frontend.secondCategoryCard', ['data' => $categoryNames['secondCategoryCard']])
                </div>
            </div>
        </div>
    </div>


    <!-- block news -->
    <div class="bg-gray-50 py-6">
        <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
            <div class="flex flex-row flex-wrap">
                <!-- Left -->
                <div class="flex-shrink max-w-full w-full lg:w-2/3  overflow-hidden">
                    <div class="w-full py-3">
                        <h2 class="text-gray-800 text-2xl font-bold capitalize">
                            <span class="inline-block h-5 border-l-3 border-red-600 mr-2"></span>
                            {{ $categoryNames['threadCategoryCard'] }}
                        </h2>
                    </div>
                    @include('Frontend.threadCategoryCard', ['data' => $categoryNames['threadCategoryCard']])
                  
                </div>
                <!-- right -->
                <div class="flex-shrink max-w-full w-full lg:w-1/3 lg:pl-8 lg:pt-14 lg:pb-8 order-first lg:order-last">
                    <div class="w-full bg-white">
                        <div class="mb-6">
                            <div class="p-4 bg-gray-100">
                                <h2 class="text-lg font-bold">Most Popular</h2>
                            </div>
                            <ul class="post-number">
                                <li class="border-b border-gray-100 hover:bg-gray-50">
                                    <a class="text-lg font-bold px-6 py-3 flex flex-row items-center" href="#">Why
                                        the
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



    <!-- block news -->
    <div class="bg-gray-50 py-6">
        <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
            <div class="flex flex-row flex-wrap">
                <!-- post -->
                <div class="flex-shrink max-w-full w-full lg:w-2/3 overflow-hidden">
                    <div class="w-full py-3">
                        <h2 class="text-gray-800 text-2xl font-bold capitalize">
                            <span class="inline-block h-5 border-l-3 border-red-600 mr-2"></span>
                            {{ $categoryNames['fourCategoryCard'] }}
                        </h2>
                    </div>
                    @include('Frontend.fourCategoryCard', ['data' => $categoryNames['fourCategoryCard']])

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
                                    <a class="text-lg font-bold px-6 py-3 flex flex-row items-center" href="#">Why
                                        the
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

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    // const firstCategoryCard = document.getElementById('firstCategoryCard')

    // @foreach ($categoryNames as $categoryName)
    //     axios.get("{{ route('spacificCategoryPost', $categoryName) }}")
    //     .then(response => {
    //         console.log(response.data);
            
    //     })
    //     .catch(error => {
    //         console.log('api error ' + error);
            
    //     })
    // @endforeach
    
</script>