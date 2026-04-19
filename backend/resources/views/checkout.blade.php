@extends('layouts.app')

@section('title', 'Dat Mua Si | Diva Materials')
@section('meta_robots', 'noindex,nofollow')
@section('canonical_url', url('/checkout'))

@php
$header_class = 'fixed top-0 w-full z-50 glass-nav';
@endphp

@section('content')
<main class="pt-32 pb-24 px-8 max-w-screen-xl mx-auto min-h-screen">
    <livewire:checkout-form />
</main>
@endsection
