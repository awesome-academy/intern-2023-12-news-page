<div class="container-fluid sub-header mb-display d-none">
    <div class="container container-sub-header">
        @if (Route::has('login'))
            <div class="content-sub-header">
                <a href="{{route('locale', ['lang' => 'en'])}}"
                   class="text-dark link-underline-light">{{ __('English') }}</a>
                <a href="{{route('locale', ['lang' => 'vi'])}}"
                   class="text-dark link-underline-light">{{ __('Vietnamese') }}</a>
                @auth
                    <a href="{{ url('/dashboard') }}"
                       class="text-dark link-underline-light">{{ __('Dashboard') }}</a>
                @else
                    <a href="{{ route('login') }}"
                       class="text-dark link-underline-light">{{ __('Log in') }}</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="text-dark link-underline-light">{{ __('Register') }}</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
</div>
