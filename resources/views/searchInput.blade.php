@extends('layouts.main')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="main-content__box">
                <h4>{{ __('List') . ' ' . __('posts') . ' ' . __('match') . ' ' . __('with') }}: <span
                        class="text-primary">{{ $search }}</span>
                </h4>
                <div class="main-content__list-item">
                    @foreach ($dataPost as $item)
                        <a href="{{ route('detail', ['id' => $item->id]) }}" class="main-content__item">
                            <div class="w-100 h-100 main-container__item">
                                <div class="info-post-item d-flex">
                                    <img src="{{ asset(!empty($item->user->avatar) ? $item->user->avatar : 'images/avatar_default.png') }}"
                                        title="Avatar của {{ $item->user->name }}" alt="">
                                    <div>
                                        <h5 class="text-dark d-flex align-items-center">
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
                <h4>{{ __('List') . ' ' . __('users') . ' ' . __('match') . ' ' . __('with') }}: <span
                        class="text-primary">{{ $search }}</span>
                </h4>
                <div class="main-content__list-item">
                    @foreach ($dataUser as $item)
                        <a href="{{ route('info', ['id' => $item->id]) }}" class="main-content__item">
                            <div class="w-100 h-100 main-container__item">
                                <div class="info-post-item d-flex">
                                    <img src="{{ asset(!empty($item->avatar) ? $item->avatar : 'images/avatar_default.png') }}"
                                        title="Avatar của {{ $item->name }}" alt="">
                                    <div>
                                        <h5 class="d-flex align-items-center">
                                            {{ $item->name }}
                                            @if ($item->verify)
                                                <div class="verify-user ml-1">
                                                    <i class="fa-solid fa-check"></i>
                                                </div>
                                            @endif
                                        </h5>
                                        <div class="d-flex justify-content-between flex-wrap ml-2">
                                            <div class="d-flex item-footer">
                                                <div class="mr-2">
                                                    <i class="fa-solid fa-newspaper text-dark"></i>
                                                    {{ $item->posts->count() }}
                                                </div>
                                                <div class="mr-2">
                                                    <i class="fa-solid fa-user-plus text-dark"></i>
                                                    {{ $item->followers->count() }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="main-content__box">
                <h4>{{ __('List') . ' ' . __('hashtag') . ' ' . __('match') . ' ' . __('with') }}: <span
                        class="text-primary">{{ $search }}</span>
                </h4>
                <div class="main-content__list-item d-flex flex-column">
                    @foreach ($dataHashtag as $item)
                        <a href="{{ route('search', ['id' => $item->slug, 'type' => config('constants.hashtag.hashtagType')]) }}"
                            class="main-content__item text-dark link-underline-light">
                            {{ $item->name }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
