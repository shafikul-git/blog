{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog - {{'blog'}} </title> --}}
{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon"
        href="https://img.freepik.com/premium-vector/blog-abstract-concept-vector-illustration_107173-25627.jpg"
        type="image/x-icon">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio"></script>
</head>

<body> --}}

    @php
       $menu = [
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
                    'sub_link' => [
                        [
                            'text' => 'home',
                            'link' => 'www.youtube.com',
                            'icon' => '<i class="fa-solid fa-arrow-right"></i>',
                            'sub_link' => [
                                [
                                    'text' => 'home',
                                    'link' => 'www.youtube.com',
                                    'icon' => '<i class="fa-solid fa-arrow-right"></i>',
                                ],
                                [
                                    'text' => 'home',
                                    'link' => 'www.youtube.com',
                                    'icon' => '<i class="fa-solid fa-arrow-right"></i>',
                                ]
                            ]
                        ],
                        [
                            'text' => 'home',
                            'link' => 'www.youtube.com',
                            'icon' => '<i class="fa-solid fa-arrow-right"></i>',
                        ]
                    ]
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
];

    @endphp
@extends('header')
@section('title', 'Home')
@section('otherConetent')

    <x-navbar :menu="$menu"></x-navbar>


    <!-- Hero Section -->
    <section class="bg-blue-600 text-white py-20">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-5xl font-bold mb-2">Welcome to My Blog</h1>
            <p class="text-xl mb-6">Insights, stories, and tips from the world of blogging</p>
            <a href="#posts" class="bg-white text-blue-600 px-4 py-2 rounded-full shadow-lg">Read the Blog</a>
        </div>
    </section>

    <!-- Featured Posts Section -->
    <section id="posts" class="container mx-auto py-16 px-6">
        <h2 class="text-4xl font-bold text-center mb-12">Featured Posts</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Post 1 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <img class="w-full h-48 object-cover" src="https://via.placeholder.com/400x300" alt="Post 1">
                <div class="p-6">
                    <h3 class="text-2xl font-bold mb-2">Post Title 1</h3>
                    <p class="text-gray-700 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec
                        iaculis mauris.</p>
                    <a href="#" class="text-blue-600 font-semibold">Read More</a>
                </div>
            </div>
            <!-- Post 2 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <img class="w-full h-48 object-cover" src="https://via.placeholder.com/400x300" alt="Post 2">
                <div class="p-6">
                    <h3 class="text-2xl font-bold mb-2">Post Title 2</h3>
                    <p class="text-gray-700 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec
                        iaculis mauris.</p>
                    <a href="#" class="text-blue-600 font-semibold">Read More</a>
                </div>
            </div>
            <!-- Post 3 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <img class="w-full h-48 object-cover" src="https://via.placeholder.com/400x300" alt="Post 3">
                <div class="p-6">
                    <h3 class="text-2xl font-bold mb-2">Post Title 3</h3>
                    <p class="text-gray-700 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec
                        iaculis mauris.</p>
                    <a href="#" class="text-blue-600 font-semibold">Read More</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <x-footer></x-footer>

    @endsection