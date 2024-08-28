@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection

@section('content')
<div class="flex w-full ">
    <!-- Sidebar -->
    @include('layouts.sidebar')

    <!-- Main Content -->
    <main class="main-content">
        <!-- Topbar -->
        <header class="topbar">
            <div class="search-box">
                {{-- <input type="text" placeholder="Search...">
                <i class="fas fa-search"></i> --}}
            </div>
            <div class="user-menu">
                <i class="fas fa-user-circle"></i> <span>Shawn L.</span>
            </div>
        </header>

        <!-- Dashboard -->
        @yield('main-section')
    </main>
</div>

@endsection
