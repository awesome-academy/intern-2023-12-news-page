@extends('layouts.main')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="main-content__box">
                <h4 class="font-weight-bold">{{ __('List') . ' ' . __('posts') . ' ' . __('match') . ' ' . __('with') }}:
                    <span class="text-primary">{{ $search }}</span>
                </h4>
                <div class="main-content__list-item">
                    @foreach ($dataPost as $item)
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
                <h4 class="font-weight-bold">{{ __('List') . ' ' . __('users') . ' ' . __('match') . ' ' . __('with') }}:
                    <span class="text-primary">{{ $search }}</span>
                </h4>
                <div class="main-content__list-item">
                    @foreach ($dataUser as $item)
                        <a href="{{ route('info', ['id' => $item->id]) }}" class="main-content__item">
                            <div class="w-100 h-100 main-container__item">
                                <div class="info-post-item d-flex">
                                    <img src="{{ asset(!empty($item->avatar) ? $item->avatar : 'images/avatar_default.png') }}"
                                        title="Avatar của {{ $item->name }}" alt="" class="post-item-avatar">
                                    <div class="ml-2">
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
                <h4 class="font-weight-bold">{{ __('List') . ' ' . __('hashtag') . ' ' . __('match') . ' ' . __('with') }}:
                    <span class="text-primary">{{ $search }}</span>
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
