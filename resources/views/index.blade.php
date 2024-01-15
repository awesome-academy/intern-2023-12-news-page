@extends('layouts.main')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="main-content__box">
                <h4>{{ __('New Posts') }}</h4>
                <div class="main-content__list-item">
                    @foreach ($newPosts as $item)
                        <a href="{{ route('detail', ['id' => $item->id]) }}" class="main-content__item">
                            <div class="w-100 h-100 main-container__item">
                                <div class="info-post-item d-flex">
                                    <img src="{{ asset(!empty($item->user->avatar) ? $item->user->avatar : 'images/avatar_default.png') }}"
                                        title="Avatar của {{ $item->user->name }}" alt="">
                                    <div>
                                        <h5 class="d-flex align-items-center">
                                            {{ $item->user->name }}
                                            @if ($item->user->verify)
                                                <div class="verify-user ml-1">
                                                    <i class="fa-solid fa-check"></i>
                                                </div>
                                            @endif
                                        </h5>
                                        @if ($item->verify)
                                            <span class="verifyText">{{ __('This post had been verified') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <h5>{{ $item->title }}</h5>
                                <div class="d-flex justify-content-between">
                                    <span class="item-footer">{{ formatDate($item->created_at) }}</span>
                                    <div class="d-flex item-footer">
                                        <div class="mr-2">
                                            <i class="fa-solid fa-message text-dark"></i>
                                            {{ $item->reviews->count() }}
                                        </div>
                                        <div class="ml-2">
                                            <i class="fa-solid fa-eye text-dark"></i>
                                            {{ $item->views }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="main-content__box">
                <h4>{{ __('Authenticated Posts') }}</h4>
                <div class="main-content__list-item">
                    @foreach ($authenticatedPosts as $item)
                        <a href="{{ route('detail', ['id' => $item->id]) }}" class="main-content__item">
                            <div class="w-100 h-100 main-container__item">
                                <div class="info-post-item d-flex">
                                    <img src="{{ asset(!empty($item->user->avatar) ? $item->user->avatar : 'images/avatar_default.png') }}"
                                        title="Avatar của {{ $item->user->name }}" alt="">
                                    <div>
                                        <h5 class="d-flex align-items-center">
                                            {{ $item->user->name }}
                                            @if ($item->user->verify)
                                                <div class="verify-user ml-1">
                                                    <i class="fa-solid fa-check"></i>
                                                </div>
                                            @endif
                                        </h5>
                                        @if ($item->verify)
                                            <span class="verifyText">{{ __('This post had been verified') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <h5>{{ $item->title }}</h5>
                                <div class="d-flex justify-content-between">
                                    <span class="item-footer">{{ formatDate($item->created_at) }}</span>
                                    <div class="d-flex item-footer">
                                        <div class="mr-2">
                                            <i class="fa-solid fa-message text-dark"></i>
                                            {{ $item->reviews->count() }}
                                        </div>
                                        <div class="ml-2">
                                            <i class="fa-solid fa-eye text-dark"></i>
                                            {{ $item->views }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="main-content__box">
                <h4>{{ __('High View Posts') }}</h4>
                <div class="main-content__list-item">
                    @foreach ($interactionsPosts as $item)
                        <a href="{{ route('detail', ['id' => $item->id]) }}" class="main-content__item">
                            <div class="w-100 h-100 main-container__item">
                                <div class="info-post-item d-flex">
                                    <img src="{{ asset(!empty($item->user->avatar) ? $item->user->avatar : 'images/avatar_default.png') }}"
                                        title="Avatar của {{ $item->user->name }}" alt="">
                                    <div>
                                        <h5 class="d-flex align-items-center">
                                            {{ $item->user->name }}
                                            @if ($item->user->verify)
                                                <div class="verify-user ml-1">
                                                    <i class="fa-solid fa-check"></i>
                                                </div>
                                            @endif
                                        </h5>
                                        @if ($item->verify)
                                            <span class="verifyText">{{ __('This post had been verified') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <h5>{{ $item->title }}</h5>
                                <div class="d-flex justify-content-between">
                                    <span class="item-footer">{{ formatDate($item->created_at) }}</span>
                                    <div class="d-flex item-footer">
                                        <div class="mr-2">
                                            <i class="fa-solid fa-message text-dark"></i>
                                            {{ $item->reviews->count() }}
                                        </div>
                                        <div class="ml-2">
                                            <i class="fa-solid fa-eye text-dark"></i>
                                            {{ $item->views }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
