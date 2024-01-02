@extends('layouts.main')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('scripts')
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
                            <img
                                src="{{ asset(!empty($post->user->avatar) ? $post->user->avatar : 'images/avatar_default.png') }}"
                                title="Avatar của {{ $post->user->name }}" alt="">
                        </div>
                        <div class="info-detail">
                            <h5>
                                <a href="{{ route('info') }}">{{ $post->user->name }}</a>
                            </h5>
                            <div class="d-flex justify-content-between">
                                <span class="item-footer mr-2">{{ formatDate($post->created_at) }}</span>
                                <div class="d-flex item-footer">
                                    <div style="margin-right: 10px">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="800px" height="800px"
                                             viewBox="0 0 24 24" version="1.1">
                                            <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                                            <title>ic_fluent_comment_24_regular</title>
                                            <desc>Created with Sketch.</desc>
                                            <g id="🔍-Product-Icons" stroke="none" stroke-width="1" fill="none"
                                               fill-rule="evenodd">
                                                <g id="ic_fluent_comment_24_regular" fill="#212121" fill-rule="nonzero">
                                                    <path
                                                        d="M5.25,18 C3.45507456,18 2,16.5449254 2,14.75 L2,6.25 C2,4.45507456 3.45507456,3 5.25,3 L18.75,3 C20.5449254,3 22,4.45507456 22,6.25 L22,14.75 C22,16.5449254 20.5449254,18 18.75,18 L13.0124851,18 L7.99868152,21.7506795 C7.44585139,22.1641649 6.66249789,22.0512036 6.2490125,21.4983735 C6.08735764,21.2822409 6,21.0195912 6,20.7499063 L5.99921427,18 L5.25,18 Z M12.5135149,16.5 L18.75,16.5 C19.7164983,16.5 20.5,15.7164983 20.5,14.75 L20.5,6.25 C20.5,5.28350169 19.7164983,4.5 18.75,4.5 L5.25,4.5 C4.28350169,4.5 3.5,5.28350169 3.5,6.25 L3.5,14.75 C3.5,15.7164983 4.28350169,16.5 5.25,16.5 L7.49878573,16.5 L7.49899997,17.2497857 L7.49985739,20.2505702 L12.5135149,16.5 Z"
                                                        id="🎨-Color">
                                                    </path>
                                                </g>
                                            </g>
                                        </svg>
                                        {{ $post->reviews->count() }}
                                    </div>
                                    <div style="margin-right: 10px">
                                        <svg fill="#000000" height="800px" width="800px" version="1.1" id="Layer_1"
                                             xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 42 42"
                                             enable-background="new 0 0 42 42" xml:space="preserve">
                                            <path d="M15.3,20.1c0,3.1,2.6,5.7,5.7,5.7s5.7-2.6,5.7-5.7s-2.6-5.7-5.7-5.7S15.3,17,15.3,20.1z M23.4,32.4
                                                C30.1,30.9,40.5,22,40.5,22s-7.7-12-18-13.3c-0.6-0.1-2.6-0.1-3-0.1c-10,1-18,13.7-18,13.7s8.7,8.6,17,9.9
                                                C19.4,32.6,22.4,32.6,23.4,32.4z M11.1,20.7c0-5.2,4.4-9.4,9.9-9.4s9.9,4.2,9.9,9.4S26.5,30,21,30S11.1,25.8,11.1,20.7z"></path>
                                        </svg>
                                        {{ $post->views }}
                                    </div>
                                    <div style="">
                                        <svg class="svg-icon"
                                             style="width: 1em; height: 1em;vertical-align: middle;fill: currentColor;overflow: hidden;"
                                             viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M862.3616 605.44c-44.1344 0.4608-74.752 21.7088-94.2592 45.7216-19.1488-24.32-49.8176-45.7216-95.0784-45.7216-29.9008 0-54.7328 9.6768-73.7792 28.8256-34.8672 35.0208-35.584 87.7568-35.2256 89.3952-0.8704 5.3248-18.8928 131.9936 192.768 237.4656 3.584 1.792 7.5264 2.7136 11.4176 2.7136 4.1472 0 8.2432-1.024 11.9808-3.0208 128-67.9424 194.56-150.2208 192.512-239.8208C972.7488 674.56 943.7184 605.44 862.3616 605.44zM767.8464 909.312c-162.816-85.4528-153.7024-174.08-152.9344-181.6064-0.0512-9.4208 3.6352-40.192 20.6848-57.2928 9.216-9.2672 21.4528-13.7728 37.4784-13.7728 54.2208 0 68.1472 49.5104 69.4784 54.9888 2.6624 11.3664 12.6976 19.4048 24.3712 19.6608 11.2128-1.2288 22.0672-7.4752 25.2416-18.688 0.6656-2.2528 16.3328-55.3984 71.6288-55.9616 57.1392 0 57.7536 61.7472 57.8048 67.3792C923.0336 787.7632 868.5568 853.248 767.8464 909.312zM768.0512 321.4848c0-155.2384-126.3104-281.6-281.6-281.6s-281.6 126.3104-281.6 281.6c0 109.6192 63.0784 204.5952 154.7264 251.0848-168.8576 54.1184-308.3264 207.4624-308.3264 363.3152 0 14.1312 11.4688 25.6 25.6 25.6s25.6-11.4688 25.6-25.6c0-164.864 193.792-332.8 384-332.8C641.6896 603.0848 768.0512 476.7744 768.0512 321.4848zM486.4512 551.8848c-127.0272 0-230.4-103.3728-230.4-230.4 0-127.0272 103.3728-230.4 230.4-230.4s230.4 103.3728 230.4 230.4C716.8512 448.512 613.4784 551.8848 486.4512 551.8848z"/>
                                        </svg>
                                        {{ $post->user->followers->count() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="action-detail col-md-6 d-flex align-items-center justify-content-end">
                    <a class="btn btn-danger js-report" data-toggle="modal" data-target="#reportModal">
                        <h6 class="m-0">{{ __("Report") }}</h6>
                    </a>
                    <a class="btn btn-success">
                        <h6 class="m-0">{{ __("Follow") }}</h6>
                    </a>
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
            <div id="main">
                {!! $post->content !!}
            </div>
            <div class="tags-detail d-flex flex-wrap">
                <h3 class="txt">{{ __('Tags') }}:</h3>
                @foreach($post->hashtags as $item)
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
                        <button type="submit" class="btn btn-success mt-2" data-user="{{ Auth::user()->id ?? null }}"
                                data-post="{{ $post->id }}"
                                data-validate-true="{{ __('Post successfully, Reload the page to see you post') }}"
                                data-validate-false="{{ __('Please do not leave it blank') }}">{{ __('Save') }}</button>
                    </div>
                </form>
                @foreach($post->reviews as $item)
                    <div class="item-comment-detail js-parent">
                        <div class="d-flex flex-wrap">
                            <div class="icon-detail">
                                <img
                                    src="{{ asset(!empty($item->user->avatar) ? $item->user->avatar : 'images/avatar_default.png') }}"
                                    title="Avatar của {{ $item->user->name ?? __('Incognito') }}" alt="">
                            </div>
                            <div class="info-detail d-flex flex-column">
                                <h5>
                                    <a href="{{ route('info') }}">{{ $item->user->name ?? __('Incognito') }}</a>
                                    <span class="js-title-report">
                                    {!! $item->content !!}
                                </span>
                                </h5>
                                <div class="js-container-action">
                                    <div class="mb-2 d-flex justify-content-between">
                                        <div class="d-flex item-footer">
                                            <a href="#" class="js-report" data-toggle="modal"
                                               data-target="#reportModal">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M4 9V3H12.0284L10.0931 5.70938C9.96896 5.88323 9.96896 6.11677 10.0931 6.29062L12.0284 9H4ZM4 10H13C13.4067 10 13.6432 9.54032 13.4069 9.20938L11.1145 6L13.4069 2.79062C13.6432 2.45968 13.4067 2 13 2H3.5C3.22386 2 3 2.22386 3 2.5V13.5C3 13.7761 3.22386 14 3.5 14C3.77614 14 4 13.7761 4 13.5V10Z"
                                                        fill="#9F9F9F"></path>
                                                </svg>
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
                                    <img
                                        src="{{ asset(!empty($item->user->avatar) ? $item->user->avatar : 'images/avatar_default.png') }}"
                                        title="Avatar của {{ $item->user->name }}" alt="">
                                    <h5>{{ $item->user->name }}</h5>
                                </div>
                                <h5>{{ $item->title }}</h5>
                                <div class="d-flex justify-content-between">
                                    <span class="item-footer">{{ formatDate($item->created_at) }}</span>
                                    <div class="d-flex item-footer">
                                        <div style="margin-right: 5px">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="800px" height="800px"
                                                 viewBox="0 0 24 24" version="1.1">
                                                <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                                                <title>ic_fluent_comment_24_regular</title>
                                                <desc>Created with Sketch.</desc>
                                                <g id="🔍-Product-Icons" stroke="none" stroke-width="1" fill="none"
                                                   fill-rule="evenodd">
                                                    <g id="ic_fluent_comment_24_regular" fill="#212121"
                                                       fill-rule="nonzero">
                                                        <path
                                                            d="M5.25,18 C3.45507456,18 2,16.5449254 2,14.75 L2,6.25 C2,4.45507456 3.45507456,3 5.25,3 L18.75,3 C20.5449254,3 22,4.45507456 22,6.25 L22,14.75 C22,16.5449254 20.5449254,18 18.75,18 L13.0124851,18 L7.99868152,21.7506795 C7.44585139,22.1641649 6.66249789,22.0512036 6.2490125,21.4983735 C6.08735764,21.2822409 6,21.0195912 6,20.7499063 L5.99921427,18 L5.25,18 Z M12.5135149,16.5 L18.75,16.5 C19.7164983,16.5 20.5,15.7164983 20.5,14.75 L20.5,6.25 C20.5,5.28350169 19.7164983,4.5 18.75,4.5 L5.25,4.5 C4.28350169,4.5 3.5,5.28350169 3.5,6.25 L3.5,14.75 C3.5,15.7164983 4.28350169,16.5 5.25,16.5 L7.49878573,16.5 L7.49899997,17.2497857 L7.49985739,20.2505702 L12.5135149,16.5 Z"
                                                            id="🎨-Color">
                                                        </path>
                                                    </g>
                                                </g>
                                            </svg>
                                            {{ $item->reviews->count() }}
                                        </div>
                                        <div style="margin-left: 5px">
                                            <svg fill="#000000" height="800px" width="800px" version="1.1" id="Layer_1"
                                                 xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                                 viewBox="0 0 42 42" enable-background="new 0 0 42 42"
                                                 xml:space="preserve">
                                            <path d="M15.3,20.1c0,3.1,2.6,5.7,5.7,5.7s5.7-2.6,5.7-5.7s-2.6-5.7-5.7-5.7S15.3,17,15.3,20.1z M23.4,32.4
                                                C30.1,30.9,40.5,22,40.5,22s-7.7-12-18-13.3c-0.6-0.1-2.6-0.1-3-0.1c-10,1-18,13.7-18,13.7s8.7,8.6,17,9.9
                                                C19.4,32.6,22.4,32.6,23.4,32.4z M11.1,20.7c0-5.2,4.4-9.4,9.9-9.4s9.9,4.2,9.9,9.4S26.5,30,21,30S11.1,25.8,11.1,20.7z"/>
                                        </svg>
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
