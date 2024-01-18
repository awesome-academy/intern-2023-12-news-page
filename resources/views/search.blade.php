@extends('layouts.main')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="main-content__box">
                <h4 class="font-weight-bold">{{ __('New Posts') . ' ' . __('From') }} <span
                        class="text-primary">{{ $search }}</span>
                </h4>
                <div class="main-content__list-item">
                    @foreach ($newPosts as $item)
                        <div class="main-content__item">
                            <a href="{{ route('detail', ['id' => $item->id]) }}">
                                <div class="w-100 h-100 main-container__item d-flex">
                                    <div class="thumbnail-img__item mr-3">
                                        <img loading="lazy" src="{{ $item->thumbnail }}" alt="{{ $item->title }}">
                                    </div>
                                    <div class="d-flex flex-column justify-content-between mw-75 w-100">
                                        <div>
                                            <h4>{{ $item->title }}</h4>
                                            <p class="text-muted">
                                                {{ $item->description }}
                                            </p>
                                            @if ($item->verify)
                                                <p class="verifyText">{{ __('This post had been verified') }}</p>
                                            @endif
                                        </div>
                                        <div>
                                            <div class="info-post-item d-flex mb-2">
                                                <img src="{{ asset(!empty($item->user->avatar) ? $item->user->avatar : 'images/avatar_default.png') }}"
                                                    title="Avatar của {{ $item->user->name }}" alt=""
                                                    class="post-item-avatar" loading="lazy">
                                                <div>
                                                    <h6 class="d-flex align-items-center post-item-name">
                                                        {{ $item->user->name }}
                                                        @if ($item->user->verify)
                                                            <div class="verify-user ml-1">
                                                                <i class="fa-solid fa-check"></i>
                                                            </div>
                                                        @endif
                                                    </h6>
                                                </div>
                                            </div>
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
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="main-content__box">
                <h4 class="font-weight-bold">{{ __('Verified Posts') . ' ' . __('From') }} <span
                        class="text-primary">{{ $search }}</span></h4>
                <div class="main-content__list-item">
                    @foreach ($verifiedPosts as $item)
                        <div class="main-content__item">
                            <a href="{{ route('detail', ['id' => $item->id]) }}">
                                <div class="w-100 h-100 main-container__item d-flex">
                                    <div class="thumbnail-img__item mr-3">
                                        <img loading="lazy" src="{{ $item->thumbnail }}" alt="{{ $item->title }}">
                                    </div>
                                    <div class="d-flex flex-column justify-content-between mw-75 w-100">
                                        <div>
                                            <h4>{{ $item->title }}</h4>
                                            <p class="text-muted">
                                                {{ $item->description }}
                                            </p>
                                            @if ($item->verify)
                                                <p class="verifyText">{{ __('This post had been verified') }}</p>
                                            @endif
                                        </div>
                                        <div>
                                            <div class="info-post-item d-flex mb-2">
                                                <img src="{{ asset(!empty($item->user->avatar) ? $item->user->avatar : 'images/avatar_default.png') }}"
                                                    title="Avatar của {{ $item->user->name }}" alt=""
                                                    class="post-item-avatar" loading="lazy">
                                                <div>
                                                    <h6 class="d-flex align-items-center post-item-name">
                                                        {{ $item->user->name }}
                                                        @if ($item->user->verify)
                                                            <div class="verify-user ml-1">
                                                                <i class="fa-solid fa-check"></i>
                                                            </div>
                                                        @endif
                                                    </h6>
                                                </div>
                                            </div>
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
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="main-content__box">
                <h4 class="font-weight-bold">{{ __('High View Posts') . ' ' . __('From') }} <span
                        class="text-primary">{{ $search }}</span>
                </h4>
                <div class="main-content__list-item">
                    @foreach ($interactionsPosts as $item)
                        <div class="main-content__item">
                            <a href="{{ route('detail', ['id' => $item->id]) }}">
                                <div class="w-100 h-100 main-container__item d-flex">
                                    <div class="thumbnail-img__item mr-3">
                                        <img loading="lazy" src="{{ $item->thumbnail }}" alt="{{ $item->title }}">
                                    </div>
                                    <div class="d-flex flex-column justify-content-between mw-75 w-100">
                                        <div>
                                            <h4>{{ $item->title }}</h4>
                                            <p class="text-muted">
                                                {{ $item->description }}
                                            </p>
                                            @if ($item->verify)
                                                <p class="verifyText">{{ __('This post had been verified') }}</p>
                                            @endif
                                        </div>
                                        <div>
                                            <div class="info-post-item d-flex mb-2">
                                                <img src="{{ asset(!empty($item->user->avatar) ? $item->user->avatar : 'images/avatar_default.png') }}"
                                                    title="Avatar của {{ $item->user->name }}" alt=""
                                                    class="post-item-avatar" loading="lazy">
                                                <div>
                                                    <h6 class="d-flex align-items-center post-item-name">
                                                        {{ $item->user->name }}
                                                        @if ($item->user->verify)
                                                            <div class="verify-user ml-1">
                                                                <i class="fa-solid fa-check"></i>
                                                            </div>
                                                        @endif
                                                    </h6>
                                                </div>
                                            </div>
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
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
