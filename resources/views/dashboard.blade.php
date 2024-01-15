@section('styles')
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
                        <div class="counter card-dashboard-total text-red-600"
                            data-target="{{ $countReports ?? config('constants.countStart') }}"></div>
                        {{ __('reports') }}
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
