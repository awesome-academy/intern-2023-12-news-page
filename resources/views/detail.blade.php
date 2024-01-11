@extends('layouts.main')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
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
            <div class="row">
                <div class="col-md-6">
                    <div class="d-flex align-items-center flex-wrap">
                        <div class="icon-detail">
                            <img src="{{ asset(!empty($post->user->avatar) ? $post->user->avatar : 'images/avatar_default.png') }}"
                                title="Avatar của {{ $post->user->name }}" alt="">
                        </div>
                        <div class="info-detail">
                            <h5 class="">
                                <a class="d-flex align-items-center" href="{{ route('info', ['id' => $post->user_id]) }}">
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
            <div class="category-detail">
                {{ __('Category') }}:<a
                    href="{{ route('search', ['slug' => $post->category->slug, 'type' => config('constants.category.categoryType')]) }}">
                    {{ $post->category->name }}</a>
            </div>
            <h3 class="title-detail">
                <span class="js-title-report">
                    {{ $post->title }}
                </span>
            </h3>
            @if ($post->verify)
                <h4 class="box-verify">
                    <span class="js-title-report">
                        {{ __('This post had been verified') }}
                    </span>
                </h4>
            @endif
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
                                <h5>
                                    @if (!empty($item->user_id))
                                        <a
                                            href="{{ route('info', ['id' => $item->user_id]) }}">{{ $item->user->name }}</a>
                                    @else
                                        <a>{{ __('Incognito') }}</a>
                                    @endif
                                    <span class="js-title-report">
                                        {!! $item->content !!}
                                    </span>
                                </h5>
                                <div class="js-container-action">
                                    <div class="mb-2 d-flex justify-content-between">
                                        <div class="d-flex item-footer">
                                            <a href="#" class="js-report" data-toggle="modal"
                                                data-type="{{ config('constants.review.reviewType') }}"
                                                data-target="#reportModal" data-id="{{ $item->id }}">
                                                <i class="fa-solid fa-flag"></i>
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
                        <a href="{{ route('detail', ['id' => $item->id]) }}" class="main-content__item">
                            <div class="w-100 h-100 main-container__item">
                                <div class="info-post-item d-flex">
                                    <img src="{{ asset(!empty($item->user->avatar) ? $item->user->avatar : 'images/avatar_default.png') }}"
                                        title="Avatar của {{ $item->user->name }}" alt="">
                                    <h5>{{ $item->user->name }}</h5>
                                </div>
                                <h5>{{ $item->title }}</h5>
                                <div class="d-flex justify-content-between">
                                    <span class="item-footer">{{ formatDate($item->created_at) }}</span>
                                    <div class="d-flex item-footer">
                                        <div class="mr-2">
                                            <i class="fa-solid fa-message text-dark"></i>
                                            {{ $item->reviews->count() }}
                                        </div>
                                        <div class="mr-2">
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
    @include('components.pages.main.modalReport')
@endsection
