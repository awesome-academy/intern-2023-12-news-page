@extends('login::layouts.master')

@section('styles')
    <link rel="stylesheet" href="{{ mix('css/register.css', "vendor/asset/login") }}">
@endsection

@section('content')
    <div class="container">
        <div class="card mt-5">
            <p>
            <h3 class="text-center">Register Login</h3></p>

            <form method="POST" action="{{route('register.create')}}">
                @csrf
                <div class="mb-3">
                    <label for="Username" class="form-label">Username</label>
                    <input id="Username" type="text" name="username" placeholder="Username"
                           class="form-control @error('username') is-invalid @enderror" required>
                    @if ($errors->any('username'))
                        <span style="color:orangered;font-size:13px" class="error mt-1">
                            {{$errors->first('username')}}
                        </span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="Email" class="form-label">Email</label>
                    <input id="Email" type="email" name="email" placeholder="Email"
                           class="form-control @error('email') is-invalid @enderror" required>
                    @if ($errors->any('email'))
                        <span style="color:orangered;font-size:13px" class="error mt-1">
                            {{$errors->first('email')}}
                        </span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="Password" class="form-label">Password</label>
                    <input id="Password" type="password" name="password" placeholder="Password"
                           class="form-control @error('password') is-invalid @enderror" required >
                    @if ($errors->any('password'))
                        <span style="color:orangered;font-size:13px" class="error mt-1">
                            {{$errors->first('password')}}
                        </span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Password Confirm"
                           class="form-control @error('password_confirmation') is-invalid @enderror" required >
                    @if ($errors->any('password_confirmation'))
                        <span style="color:orangered;font-size:13px" class="error mt-1">
                            {{$errors->first('password_confirmation')}}
                        </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>

            <div class="w-100 text-center">
                <a href="{{route('login')}}" class="btn btn-link fit-content">Back Login</a>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{--    <script src="{{ mix('js/register.js', "vendor/asset/login") }}"></script>--}}
@endsection
