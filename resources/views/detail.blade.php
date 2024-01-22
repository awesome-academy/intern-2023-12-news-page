@extends('layouts.main')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('scripts')
    <script src="{{ asset('js/actionFollow.js') }}" defer></script>
    <script src="{{ asset('js/modalReport.js') }}" defer></script>
    <script src="{{ asset('js/detail.js') }}" defer></script>
@endsection

@section('content')
    <div class="container">
        <div class="main-content__box js-parent" data-id="{{ $post->id }}">
            <div class="category-detail mb-3">
                <a class="category-text"
                    href="{{ route('search', ['slug' => $post->category->slug, 'type' => config('constants.category.categoryType')]) }}">
                    {{ $post->category->name }}
                </a>
            </div>
            <h2 class="title-detail mb-3">
                <span class="font-weight-bold position-relative">
                    <span class="js-title-report">{{ $post->title }}</span>
                    @if ($post->verify)
                        <div class="verify-post ml-1 position-absolute" data-toggle="tooltip" data-placement="right"
                            title="{{ __('This post had been verified') }}">
                            <i class="fa-solid fa-check"></i>
                        </div>
                    @endif
                </span>
            </h2>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="d-flex align-items-center flex-wrap">
                        <div class="icon-detail">
                            <img src="{{ asset(!empty($post->user->avatar) ? $post->user->avatar : 'images/avatar_default.png') }}"
                                title="Avatar của {{ $post->user->name }}" alt="">
                        </div>
                        <div class="info-detail">
                            <h5 class="">
                                <a class="d-flex align-items-center text-dark"
                                    href="{{ route('info', ['id' => $post->user_id]) }}">
                                    {{ $post->user->name }}
                                    @if ($post->user->verify)
                                        <div class="verify-user ml-1">
                                            <i class="fa-solid fa-check"></i>
                                        </div>
                                    @endif
                                </a>
                            </h5>
                            <div class="d-flex justify-content-between">
                                <span class="item-footer mr-2">{{ formatDate($post->created_at) }}</span>
                                <div class="d-flex item-footer">
                                    <div class="mr-2">
                                        <i class="fa-solid fa-message text-dark"></i>
                                        {{ $post->reviews->count() }}
                                    </div>
                                    <div class="mr-2">
                                        <i class="fa-solid fa-eye text-dark"></i>
                                        {{ $post->views }}
                                    </div>
                                    <div style="">
                                        <i class="fa-solid fa-user-plus text-dark"></i>
                                        {{ $post->user->followers->count() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="action-detail col-md-6 d-flex align-items-center justify-content-end">
                    <a class="btn btn-danger js-report" data-toggle="modal"
                        data-type="{{ config('constants.post.postType') }}" data-target="#reportModal"
                        data-id="{{ $post->id }}">
                        <h6 class="m-0">{{ __('Report') }}</h6>
                    </a>
                    @if (!empty(Auth::user()) && Auth::user()->id !== $post->user_id)
                        <a href="{{ route('follow') }}" class="js-follow btn btn-success"
                            data-reverse="{{ $checkFollow ? __('Follow') : __('Unfollow') }}"
                            data-user-follow="{{ $post->user_id }}" data-user="{{ Auth::user()->id }}"
                            data-toast-success = "{{ __('user') . ' ' . __('success') }}">
                            <h6 class="m-0">{{ $checkFollow ? __('Unfollow') : __('Follow') }}</h6>
                        </a>
                    @endif
                </div>
            </div>
            <div id="main">
                {!! $post->content !!}
            </div>
            <div class="tags-detail d-flex flex-wrap">
                <h3 class="txt">{{ __('Tags') }}:</h3>
                @foreach ($post->hashtags as $item)
                    <h4 class="item-tag">
                        <a href="{{ route('search', ['slug' => $item->slug, 'type' => config('constants.hashtag.hashtagType')]) }}"
                            title="{{ $item->name }}">{{ $item->name }}</a>
                    </h4>
                @endforeach
            </div>
            <div class="comments-detail">
                <h4>{{ __('Comments') }}</h4>
                <form method="POST" action="{{ route('comment') }}" id="comment">
                    @csrf
                    <input name="name" class="d-none" value="{{ __('Incognito') }}">
                    <textarea name="review" class="textarea-emoji"></textarea>
                    <div class="w-100 text-end">
                        <button type="submit" class="btn btn-success mt-2 mb-2" data-user="{{ Auth::user()->id ?? null }}"
                            data-post="{{ $post->id }}" data-route-info={{ route('info') }}
                            data-validate-true="{{ __('Post successfully, Reload the page to see you post') }}"
                            data-validate-false="{{ __('Please do not leave it blank') }}">{{ __('Save') }}</button>
                    </div>
                </form>
                @foreach ($post->reviews as $item)
                    <div class="item-comment-detail js-parent">
                        <div class="d-flex flex-wrap">
                            <div class="icon-detail">
                                <img src="{{ asset(!empty($item->user->avatar) ? $item->user->avatar : 'images/avatar_default.png') }}"
                                    title="Avatar của {{ $item->user->name ?? __('Incognito') }}" alt="">
                            </div>
                            <div class="info-detail d-flex flex-column">
                                <h6>
                                    @if (!empty($item->user_id))
                                        <a class="name-comment"
                                            href="{{ route('info', ['id' => $item->user_id]) }}">{{ $item->user->name }}:</a>
                                    @else
                                        <a class="name-comment">{{ __('Incognito') }}:</a>
                                    @endif
                                    <span class="js-title-report content-comment font-weight-bold">
                                        {!! $item->content !!}
                                    </span>
                                </h6>
                                <div class="js-container-action">
                                    <div class="mb-2 d-flex justify-content-between">
                                        <div class="d-flex item-footer">
                                            <a href="#" class="js-report btn-report-comment" data-toggle="modal"
                                                data-type="{{ config('constants.review.reviewType') }}"
                                                data-target="#reportModal" data-id="{{ $item->id }}">
                                                <i class="fa-solid fa-flag text-dark"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="posts-category">
                <h6 class="mt-4 mb-4">
                    <span>
                        {{ __('Posts in the same Category') }}
                    </span>
                </h6>
                <div class="container-posts-category">
                    @foreach ($postSameCategory as $item)
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
    @include('components.pages.main.modalReport')
@endsection
