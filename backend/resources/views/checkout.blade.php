@extends('layouts.app')

@section('title', 'Đặt mua sỉ | Diva Materials')
@section('meta_robots', 'noindex,nofollow')
@section('canonical_url', url('/checkout'))

@php
$header_class = 'fixed top-0 w-full z-50 glass-nav';
@endphp

@section('content')
<main class="mx-auto min-h-screen max-w-screen-xl px-8 pb-24 pt-32">
    <livewire:checkout-form />
</main>
@endsection
