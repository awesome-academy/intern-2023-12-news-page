@extends('layouts.main')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/info.css') }}">
    <link rel="stylesheet" href="{{ asset('css/follow.css') }}">
@endsection

@section('scripts')
    <script src="{{ asset('js/actionFollow.js') }}" defer></script>
    <script src="{{ asset('js/modalReport.js') }}" defer></script>
    <script src="{{ asset('js/info.js') }}" defer></script>
    <script src="{{ asset('js/follow.js') }}" defer></script>
@endsection

@section('content')
    <div class="container">
        <div class="main-content__box">
            <div class="row js-parent">
                <div class="col-md-6">
                    <div class="info-post-item d-flex">
                        <img src="{{ asset(!empty($userInfo->avatar) ? $userInfo->avatar : 'images/avatar_default.png') }}"
                            title="Avatar của {{ $userInfo->name }}" alt="" class="post-item-avatar">
                        <div class="ml-2">
                            <h5 class="d-flex align-items-center">
                                {{ $userInfo->name }}
                                @if ($userInfo->verify)
                                    <div class="verify-user ml-1">
                                        <i class="fa-solid fa-check"></i>
                                    </div>
                                @endif
                            </h5>
                            <div class="d-flex justify-content-between flex-wrap">
                                <div class="d-flex item-footer">
                                    <span class="item-footer mr-3">{{ formatDate($userInfo->created_at) }}</span>
                                    <div class="mr-2">
                                        <i class="fa-solid fa-newspaper text-dark"></i>
                                        {{ $countPosts }}
                                    </div>
                                    <div class="mr-2">
                                        <i class="fa-solid fa-eye text-dark"></i>
                                        {{ $countViews }}
                                    </div>
                                    @if (!empty(Auth::user()) && in_array(Auth::user()->role->slug, config('constants.modSlug')))
                                        <div class="mr-2">
                                            <i class="fa-solid fa-flag text-dark"></i>
                                            {{ $countReports }}
                                        </div>
                                    @endif
                                    <div>
                                        <i class="fa-solid fa-user-plus text-dark"></i>
                                        {{ $countFollows }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="action-detail col-md-6 d-flex align-items-center justify-content-end">
                    <a class="btn btn-danger js-report" data-toggle="modal"
                        data-type="{{ config('constants.user.userType') }}" data-target="#reportModal"
                        data-id="{{ $userId }}">
                        <h6 class="m-0">{{ __('Report') }}</h6>
                    </a>
                    @if (!empty(Auth::user()) && Auth::user()->id !== (int) $userId)
                        <a href="{{ route('follow') }}" class="js-follow btn btn-success"
                            data-reverse="{{ $checkFollow ? __('Follow') : __('Unfollow') }}"
                            data-user-follow="{{ $userId }}" data-user="{{ Auth::user()->id }}"
                            data-toast-success = "{{ __('user') . ' ' . __('success') }}">
                            <h6 class="m-0">{{ $checkFollow ? __('Unfollow') : __('Follow') }}</h6>
                        </a>
                    @endif
                </div>
            </div>
            <ul class="nav nav-pills nav-justified position-relative mt-4">
                <li class="nav-item">
                    <a class="nav-link active" href="#follows" data-toggle="tab">
                        {{ __('Follows') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#posts" data-toggle="tab">
                        {{ __('Posts') }}
                    </a>
                </li>
            </ul>
            <div class="tab-content" id="ex2-content">
                <div class="tab-pane fade show active" id="follows" role="tabpanel" aria-labelledby="ex3-tab-1">
                    @include('components.pages.follow.containerFollows')
                </div>
                <div class="tab-pane fade" id="posts" role="tabpanel" aria-labelledby="ex3-tab-2">
                    @include('components.pages.posts.containerPosts')
                </div>
            </div>
        </div>
    </div>
    @include('components.pages.main.modalReport')
@endsection
