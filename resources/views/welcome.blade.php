@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <div class="containers py-8 px-6">
        <form action="{{ route('login') }}" method="post">
            @csrf
            <h3>Login</h3>
            <label for="name/email">Name/Email</label>
            <input type="text" placeholder="Name or Email" id="username" name="name">

            <label for="password">Password</label>
            <input type="password" placeholder="Password" id="password" name="password">
            <input type="hidden" name="email">

            <button type="submit">Log In</button>
            {{-- <div class="social">
                <div class="go"><i class="fab fa-google"></i> Google</div>
                <div class="fb"><i class="fab fa-facebook"></i> Facebook</div>
            </div> --}}
        </form>
    </div>
@endsection