@section('styles')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endsection

@section('scripts')
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/profile.js') }}" defer></script>
@endsection

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (!empty(session('success')))
                        <div class="bg-success mb-6">
                            <p>
                                {{ __(session('success')) }}
                            </p>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ __($error) }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('update.profile') }}" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PATCH') }}
                        <h3 style="margin-bottom: 20px" class="h3 font-semibold text-xl text-gray-800 leading-tight">
                            {{ __('Info User') }} </h3>
                        <div style="margin-bottom: 20px;flex-wrap: wrap;"
                            class="upload-container relative flex items-center justify-between w-full">
                            <label class="block font-medium text-sm text-gray-700" for="email">
                                {{ __('Profile Photo') }}
                            </label>
                            <div class="drop-area w-full rounded-md border-2 border-dotted border-gray-200
                                transition-all hover:border-blue-600/30 text-center">
                                <label for="file-input"
                                    class="block w-full h-full text-gray-500 p-4 text-sm cursor-pointer">
                                    {{ __('Drop file or click to choose') }}
                                </label>

                                <input name="file" type="file" id="file-input" accept="image/*" class="hidden"/>

                                <input name="default" type="text" class="avatar-default hidden" value="{{ $user->avatar }}"/>

                                <div
                                    class="preview-container {{ !empty($user->avatar) ? 'flex' : 'hidden' }} items-center justify-center flex-col">
                                    <div class="preview-image w-36 h-36 bg-cover bg-center rounded-md"
                                        style="background-image: url({{ $user->avatar }})"></div>
                                    <span class="file-name my-4 text-sm font-medium">{{ $user->avatar }}</span>
                                    <p
                                        class="close-button cursor-pointer transition-all mb-4 rounded-md px-3 py-1
                                        border text-xs text-red-500 border-red-500 hover:bg-red-500 hover:text-white">
                                        {{ __('Delete') }}
                                    </p>
                                </div>
                            </div>

                        </div>
                        <div style="margin-bottom: 20px;" class="flex items-center">
                            <div style="width:100%">
                                <x-label for="name" :value="__('Name')" />
                                <input
                                    class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300
                                    focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"
                                    value="{{ $user->name }}" id="name" type="text" name="name"
                                    required="required" autofocus="autofocus">
                            </div>
                        </div>
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border
                            border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest
                            hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring
                            ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            {{ __('Save') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('update.password') }}">
                        @csrf
                        {{ method_field('PATCH') }}
                        <h3 style="margin-bottom: 20px" class="h3 font-semibold text-xl text-gray-800 leading-tight">
                            {{ __('Password') }}
                        </h3>
                        <div style="margin-bottom: 20px" class="flex items-center">
                            <div class="w-full">
                                <x-label for="current_password" :value="__('Current Password')" />

                                <input
                                    class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300
                                    focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"
                                    id="current_password" type="password" name="current_password" required="required"
                                    autofocus="autofocus">
                            </div>
                        </div>
                        <div style="margin-bottom: 20px" class="flex items-center">
                            <div class="w-full">
                                <x-label for="new_password" :value="__('New Password')" />

                                <input
                                    class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300
                                    focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"
                                    id="new_password" type="password" name="new_password" required="required"
                                    autofocus="autofocus">
                            </div>
                        </div>
                        <div style="margin-bottom: 20px" class="flex items-center">
                            <div class="w-full">
                                <x-label for="confirm_password" :value="__('Confirm Password')" />

                                <input
                                    class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300
                                    focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"
                                    id="confirm_password" type="password" name="confirm_password" required="required"
                                    autofocus="autofocus">
                            </div>
                        </div>
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border
                            border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest
                            hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring
                            ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            {{ __('Save') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
