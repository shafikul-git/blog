@extends('header')
@section('title', 'CONGRATULATIONS')
@section('otherConetent')
    <!-- Nav Section -->
    <x-navbar></x-navbar>

    <div class="flex items-center justify-center min-h-screen bg-cyan-200">
<div class="bg-white rounded-lg shadow-lg p-8 max-w-lg text-center">
    <h1 class="text-3xl font-bold text-cyan-500 mb-4">CONGRATULATIONS !</h1>
    <div class="flex justify-center mb-6">
        <div class="w-16 h-16 flex items-center justify-center bg-cyan-500 rounded-full">
            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>
    </div>
    <p class="text-lg text-teal-700 mb-4 capitalize">{{ $message }}</p>
    <strong>Your Details : </strong>
    <p class="text-teal-700 mb-2">Name: {{ $congratulations['name'] }}</p>
    <p class="text-teal-700 mb-2">Date: {{ $congratulations->updated_at->format('d-m-Y H:i:s') }}</p>
    <p class="text-teal-700 mb-6">ID: {{ $congratulations->id }}</p>
    <p class="text-teal-700 mb-6">Your Message: {{ $congratulations->message }}</p>
    <p class="text-teal-700">Regards, <strong> Contact Team </strong></p>
</div>
</div>
    <!-- Footer Section -->
    <x-footer></x-footer>
@endsection
