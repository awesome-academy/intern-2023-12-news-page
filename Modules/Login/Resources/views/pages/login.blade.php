@extends('login::layouts.master')

@section('styles')
    <link rel="stylesheet" href="{{ mix('css/login.css', "vendor/asset/login") }}">
@endsection

@section('content')
    <div class="container">
        <div class="card mt-5">
            <p><h3 class="text-center">Form Login</h3></p>

            <form method="POST" action="">
                @csrf
                <div class="mb-3">
                    <label for="Username" class="form-label">Username</label>
                    <input id="Username" type="text" name="username" placeholder="Username" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="Password" class="form-label">Password</label>
                    <input id="Password" type="password" name="password" placeholder="Password" class="form-control">
                </div>
                <div>
                    <label for="Remember" class="form-label">Remember Me</label>
                    <input id="Remember" type="checkbox" name="isRemember">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>

            <div class="w-100 text-center">
                <a href="{{route('register')}}" class="btn btn-link fit-content">Create Account</a>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
{{--    <script src="{{ mix('js/login.js', "vendor/asset/login") }}"></script>--}}
@endsection
