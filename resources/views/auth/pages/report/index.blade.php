@section('styles')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/follow.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/post.css') }}">
@endsection

@section('scripts')
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/follow.js') }}" defer></script>
    <script src="{{ asset('js/post.js') }}" defer></script>
@endsection

<x-app-layout>
    @include('components.pages.report.containerReport')
</x-app-layout>
