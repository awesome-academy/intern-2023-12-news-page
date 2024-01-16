<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Follows') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex">
        <div class="p-6 bg-white border-b border-gray-200 w-full rounded-md">
            @if (request()->routeIs('follows.index'))
                <div class="flex justify-between items-center flex-wrap">
                    <div class="tabs-custom flex">
                        <a href="{{ route('follows.index', ['tab' => config('constants.follow.followerTab')]) }}"
                            class="tab-item {{ $tab === config('constants.follow.followerTab') ? 'active' : '' }}">
                            {{ __('Followers') }}
                        </a>
                        <a href="{{ route('follows.index', ['tab' => config('constants.follow.hadFollowedTab')]) }}"
                            class="tab-item {{ $tab === config('constants.follow.hadFollowedTab') ? 'active' : '' }}">
                            {{ __('Had Followed') }}
                        </a>
                        <div class="line"></div>
                    </div>
                    <form method="get" action="{{ route('follows.index') }}" id="form-search">
                        <div class="position-relative container-form-search">
                            <input name="tab" class="hidden" value="{{ $tab ?? null }}">
                            <input name="search" placeholder="{{ __('Enter the name you want to search for') }}"
                                class="p-4 bg-white border-b border-gray-200 w-full rounded-md">
                            <button class="btn btn-success mt-2">{{ __('Search') }}</button>
                        </div>
                    </form>
                </div>
                @if (!empty(session('success')))
                    <div class="bg-success mt-6">
                        <p>
                            {{ __(session('success')) }}
                        </p>
                    </div>
                @endif
                <div class="tab-content-custom">
                    <div class="tab-pane active">
                        <table class="table table-custom">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">{{ __('Index') }}</th>
                                    <th class="text-center" scope="col">{{ __('Avatar') }}</th>
                                    <th class="text-center" scope="col">{{ __('Name') }}</th>
                                    <th scope="col" class="text-center">{{ __('Handle') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $item)
                                    <tr>
                                        <td class="text-center">
                                            {{ $key + 1 }}
                                        </td>
                                        <td class="text-center flex justify-center">
                                            <img title="Avatar của {{ $item->name }}" class="img-manager"
                                                src="{{ asset(!empty($item->avatar) ? $item->avatar : 'images/avatar_default.png') }}">
                                        </td>
                                        <td class="text-center">{{ $item->name }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('info', ['id' => $item->id]) }}" class="btn btn-success"
                                                target="__blank">{{ __('Show') }}</a>
                                            @if ($tab === config('constants.follow.hadFollowedTab'))
                                                <a href="{{ route('unFollow', ['userId' => $item->id]) }}"
                                                    class="btn btn-danger">{{ __('Unfollow') }}</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <div class="tabs-custom flex">
                    <div class="tab-item active">
                        {{ __('Followers') }}
                    </div>
                    <div class="tab-item">
                        {{ __('Had Followed') }}
                    </div>
                    <div class="line"></div>
                </div>
                <div class="tab-content-custom">
                    <div class="tab-pane active">
                        <table class="table table-custom">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">{{ __('Index') }}</th>
                                    <th class="text-center" scope="col">{{ __('Avatar') }}</th>
                                    <th class="text-center" scope="col">{{ __('Name') }}</th>
                                    <th scope="col" class="text-center">{{ __('Handle') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($followers as $key => $user)
                                    <tr>
                                        <td class="text-center">
                                            {{ $key + 1 }}
                                        </td>
                                        <td class="text-center flex justify-center">
                                            <img title="Avatar của {{ $user->name }}" class="img-manager"
                                                src="{{ asset(!empty($user->avatar) ? $user->avatar : 'images/avatar_default.png') }}">
                                        </td>
                                        <td class="text-center">{{ $user->name }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('info', ['id' => $user->id]) }}" class="btn btn-success"
                                                target="__blank">{{ __('Show') }}</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane">
                        <table class="table table-custom">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">{{ __('Index') }}</th>
                                    <th class="text-center" scope="col">{{ __('Avatar') }}</th>
                                    <th class="text-center" scope="col">{{ __('Name') }}</th>
                                    <th scope="col" class="text-center">{{ __('Handle') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($following as $key => $user)
                                    <tr>
                                        <td class="text-center">
                                            {{ $key + 1 }}
                                        </td>
                                        <td class="text-center flex justify-center">
                                            <img title="Avatar của {{ $user->name }}" class="img-manager"
                                                src="{{ asset(!empty($user->avatar) ? $user->avatar : 'images/avatar_default.png') }}">
                                        </td>
                                        <td class="text-center">{{ $user->name }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('info', ['id' => $user->id]) }}" class="btn btn-success"
                                                target="__blank">{{ __('Show') }}</a>
                                            @if ((int) $userId === isset(Auth::user()->id) ? Auth::user()->id : null)
                                                <a href="{{ route('unFollow', ['userId' => $user->id]) }}"
                                                    class="btn btn-danger">{{ __('Unfollow') }}</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
