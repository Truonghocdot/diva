@extends('layouts.app')

@section('title', 'Checkout | The Tactile Sanctuary')

@php
    $header_class = 'fixed top-0 w-full z-50 bg-[#f8faf9]/60 backdrop-blur-md flex justify-between items-center px-8 py-6 max-w-screen-2xl mx-auto left-1/2 -translate-x-1/2';
@endphp

@section('content')
<main class="pt-32 pb-24 px-8 max-w-screen-xl mx-auto min-h-screen">
    <div class="flex flex-col md:flex-row gap-16">
        <!-- Shipping ... -->
        <div class="flex-1 space-y-12">
            <h1 class="text-4xl font-headline font-light text-on-background">Thanh toán</h1>
            <!-- Form ... -->
        </div>
        <!-- Summary ... -->
        <div class="w-full md:w-[420px]">
             <!-- ... -->
        </div>
    </div>
</main>
@endsection
