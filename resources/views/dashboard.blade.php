@section('styles')
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection

@section('scripts')
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/dashboard.js') }}" defer></script>
@endsection

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex card-dashboard-main">
            <div class="p-6 bg-white border-b border-gray-200 w-full rounded-md card-dashboard">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg card-dashboard-container">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Total Views') }}
                    </h2>
                </div>
                <div class="flex card-dashboard-content items-center">
                    <div class="counter card-dashboard-total text-green-600" data-target="{{ $countViews }}"></div>
                    {{ __('views') }}
                </div>
            </div>
            <div class="p-6 bg-white border-b border-gray-200 w-full rounded-md card-dashboard">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg card-dashboard-container">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Total Posts') }}
                    </h2>
                </div>
                <div class="flex card-dashboard-content items-center">
                    <div class="counter card-dashboard-total text-yellow" data-target="{{ $countPosts }}"></div>
                    {{ __('posts') }}
                </div>
            </div>
            <div class="p-6 bg-white border-b border-gray-200 w-full rounded-md card-dashboard">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg card-dashboard-container">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Total Follows') }}
                    </h2>
                </div>
                <div class="flex card-dashboard-content items-center">
                    <div class="counter card-dashboard-total text-indigo-600" data-target="{{ $countFollows }}"></div>
                    {{ __('follows') }}
                </div>
            </div>
            @if (in_array(Auth::user()->role->slug, config('constants.modSlug')))
                <div class="p-6 bg-white border-b border-gray-200 w-full rounded-md card-dashboard">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg card-dashboard-container">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ __('Total Reports') }}
                        </h2>
                    </div>
                    <div class="flex card-dashboard-content items-center">
                        <div class="counter card-dashboard-total text-red-600" data-target="{{ $countReports }}"></div>
                        {{ __('reports') }}
                    </div>
                </div>
            @endif
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-7">
            <div class="p-6 bg-white border-b border-gray-200 w-full rounded-md">
                <div class="flex card-dashboard-main">
                    <h4 class="title-chart">{{ __('Chart view by') }}</h4>
                    <div>
                        <label for="time"></label>
                        <form id = "selectDateQuery" method="get" action="{{ route('dashboard') }}">
                            <select name="time" id="time">
                                @foreach ($selectDateQuery as $key => $item)
                                    <option {{ (int) $selectChoice === $key ? 'selected' : '' }}
                                        value="{{ $key }}">
                                        {{ __($item) }}
                                    </option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                </div>
                <div class="container-chart w-full h-full">
                    <canvas id="pie-canvas" data-views="{{ $data }}"
                        data-info = "{{ __('Views vary from day to day') }}"></canvas>
                    <div class="w-full text-right mt-3 mb-3">
                        <span class="text-muted">
                            {{ __('Last updated') }}: {{ isset($lastUpdated) ? formatDate($lastUpdated) : '--/--/----' }}
                        </span>
                    </div>
                    <div class="flex card-dashboard-sub mt-6 pt-4 w-full">
                        @if (!empty($highestViewPost))
                            <div class="post-top-chart">
                                <h4 class="title-chart mb-2">{{ __('Post') . ' ' . __('most viewed') }}:</h4>
                                <div class="p-3 item-top-chart">
                                    <a href="{{ route('detail', ['id' => $highestViewPost->id]) }}">
                                        <img loading="lazy" src="{{ $highestViewPost->thumbnail }}"
                                            class="thumbnail-top-chart w-full" alt="{{ $highestViewPost->title }}">
                                        <h4 class="text-vertical-overload title-item-top-chart mt-2 mb-2">
                                            {{ $highestViewPost->title }}
                                        </h4>
                                        <p class="text-muted text-vertical-overload">
                                            {{ $highestViewPost->description }}
                                        </p>
                                        @if ($highestViewPost->verify)
                                            <p class="verifyText mt-2">{{ __('This post had been verified') }}</p>
                                        @endif
                                        <div class="footer-item-top-chart mt-3">
                                            <span
                                                class="text-muted">{{ formatDate($highestViewPost->created_at) }}</span>
                                            <div class="footer-item-top-chart">
                                                <div class="mr-2">
                                                    <i class="fa-solid fa-message text-muted"></i>
                                                    {{ $highestViewPost->reviews->count() }}
                                                </div>
                                                <div class="ml-2">
                                                    <i class="fa-solid fa-eye text-muted"></i>
                                                    {{ $highestViewPost->views }}
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endif
                        @if (!empty($highestCommentPost))
                            <div class="post-top-chart">
                                <h4 class="title-chart mb-2">{{ __('Post') . ' ' . __('most comments') }}:</h4>
                                <div class="p-3 item-top-chart">
                                    <a href="{{ route('detail', ['id' => $highestCommentPost->id]) }}">
                                        <img loading="lazy" src="{{ $highestCommentPost->thumbnail }}"
                                            class="thumbnail-top-chart w-full" alt="{{ $highestCommentPost->title }}">
                                        <h4 class="text-vertical-overload title-item-top-chart mt-2 mb-2">
                                            {{ $highestCommentPost->title }}
                                        </h4>
                                        <p class="text-muted text-vertical-overload">
                                            {{ $highestCommentPost->description }}
                                        </p>
                                        @if ($highestCommentPost->verify)
                                            <p class="verifyText mt-2">{{ __('This post had been verified') }}</p>
                                        @endif
                                        <div class="footer-item-top-chart mt-3">
                                            <span
                                                class="text-muted">{{ formatDate($highestCommentPost->created_at) }}</span>
                                            <div class="footer-item-top-chart">
                                                <div class="mr-2">
                                                    <i class="fa-solid fa-message text-muted"></i>
                                                    {{ $highestCommentPost->reviews_count }}
                                                </div>
                                                <div class="ml-2">
                                                    <i class="fa-solid fa-eye text-muted"></i>
                                                    {{ $highestCommentPost->views }}
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endif
                        @if (!empty($newestPost))
                            <div class="post-top-chart">
                                <h4 class="title-chart mb-2">{{ __('New Post') }}:</h4>
                                <div class="p-3 item-top-chart">
                                    <a href="{{ route('detail', ['id' => $newestPost->id]) }}">
                                        <img loading="lazy" src="{{ $newestPost->thumbnail }}"
                                            class="thumbnail-top-chart w-full" alt="{{ $newestPost->title }}">
                                        <h4 class="text-vertical-overload title-item-top-chart mt-2 mb-2">
                                            {{ $newestPost->title }}
                                        </h4>
                                        <p class="text-muted text-vertical-overload">
                                            {{ $newestPost->description }}
                                        </p>
                                        @if ($newestPost->verify)
                                            <p class="verifyText mt-2">{{ __('This post had been verified') }}</p>
                                        @endif
                                        <div class="footer-item-top-chart mt-3">
                                            <span class="text-muted">{{ formatDate($newestPost->created_at) }}</span>
                                            <div class="footer-item-top-chart">
                                                <div class="mr-2">
                                                    <i class="fa-solid fa-message text-muted"></i>
                                                    {{ $newestPost->reviews->count() }}
                                                </div>
                                                <div class="ml-2">
                                                    <i class="fa-solid fa-eye text-muted"></i>
                                                    {{ $newestPost->views }}
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
