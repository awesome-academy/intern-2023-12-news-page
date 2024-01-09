<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Users') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex">
        <div class="p-6 bg-white border-b border-gray-200 w-full rounded-md">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lgr">
                <div class="flex justify-between items-center flex-wrap">
                    <div class="tabs-custom flex">
                        <a href="{{ route('manager.users.index', ['tab' => config('constants.user.userSlug')]) }}"
                            class="tab-item {{ $tab === null || $tab === config('constants.user.userSlug') ? 'active' : '' }}">
                            {{ __('Users') }}
                        </a>
                        <a href="{{ route('manager.users.index', ['tab' => config('constants.user.moderatorSlug')]) }}"
                            class="tab-item {{ $tab === config('constants.user.moderatorSlug') ? 'active' : '' }}">
                            {{ __('Moderators') }}
                        </a>
                        <a href="{{ route('manager.users.index', ['tab' => config('constants.user.adminSlug')]) }}"
                            class="tab-item {{ $tab === config('constants.user.adminSlug') ? 'active' : '' }}">
                            {{ __('Admins') }}
                        </a>
                        <div class="line"></div>
                    </div>
                    <form method="get" action="{{ route('manager.users.index') }}" id="form-search">
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
                                    <th class="text-center" scope="col">{{ __('ID') }}</th>
                                    <th class="text-center" scope="col">{{ __('Name') }}</th>
                                    <th class="text-center" scope="col">{{ __('Avatar') }}</th>
                                    <th class="text-center" scope="col">{{ __('Verify') }}</th>
                                    <th class="text-center" scope="col">{{ __('Status') }}</th>
                                    <th class="text-center" scope="col">{{ __('Role') }}</th>
                                    <th class="text-center" scope="col">{{ __('Created_at') }}</th>
                                    <th class="text-center" scope="col">{{ __('Updated_at') }}</th>
                                    <th width="20%" class="text-center" scope="col">{{ __('Handle') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td class="text-center">{{ $item->id }}</td>
                                        <td class="text-center">{{ $item->name }}</td>
                                        <td class="text-center">
                                            <img class="imgColumnTable"
                                                title="Avatar của {{ $item->name }}"
                                                src="{{ asset(!empty($item->avatar) ? Auth::user()->avatar : 'images/avatar_default.png') }}">
                                        </td>
                                        <td class="text-center">
                                            {{ $item->verify === 1 ? __('Verified') : __('Not Verify Yet') }}</td>
                                        <td class="text-center">{{ $item->status->name }}</td>
                                        <td class="text-center">{{ $item->role->name }}</td>
                                        <td class="text-center">{{ formatDate($item->created_at) }}</td>
                                        <td class="text-center">{{ formatDate($item->updated_at) }}</td>
                                        <td class="flex">
                                            @if (Auth::user()->role->slug !== $tab &&
                                                    ($tab === config('constants.user.userSlug') || $tab === config('constants.user.moderatorSlug')))
                                                <form action="{{ route('user.updateStatus', ['user' => $item->id]) }}"
                                                    method="post" class="position-relative js-delete"
                                                    style="width: fit-content;margin: auto"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    {{ method_field('PATCH') }}
                                                    @if ($item->status->slug === config('constants.user.userStatusActive'))
                                                        <input name="slug" class="hidden"
                                                            value="{{ config('constants.user.userStatusBan') }}">
                                                        <button class="btn btn-danger"
                                                            data-ask="{{ __('Are you sure you want to update this resource?') }}">
                                                            {{ __('Ban') }}
                                                        </button>
                                                    @else
                                                        <input name="slug" class="hidden"
                                                            value="{{ config('constants.user.userStatusActive') }}">
                                                        <button class="btn btn-success"
                                                            data-ask="{{ __('Are you sure you want to update this resource?') }}">
                                                            {{ __('Unban') }}
                                                        </button>
                                                    @endif
                                                </form>
                                            @endif
                                            @if (Auth::user()->role->slug === config('constants.user.adminSlug'))
                                                <form action="{{ route('user.updateRole', ['user' => $item->id]) }}"
                                                    method="post" class="position-relative js-delete"
                                                    style="width: fit-content;margin: auto"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    {{ method_field('PATCH') }}
                                                    @if ($tab === config('constants.user.userSlug'))
                                                        <input name="slug" class="hidden"
                                                            value="{{ config('constants.user.moderatorSlug') }}">
                                                        <button class="btn btn-success ml-2"
                                                            data-ask="{{ __('Are you sure you want to update this resource?') }}">
                                                            {{ __('Set Moderator') }}
                                                        </button>
                                                    @elseif ($tab === config('constants.user.moderatorSlug'))
                                                        <input name="slug" class="hidden"
                                                            value="{{ config('constants.user.userSlug') }}">
                                                        <button class="btn btn-danger ml-2"
                                                            data-ask="{{ __('Are you sure you want to update this resource?') }}">
                                                            {{ __('Unset Moderator') }}
                                                        </button>
                                                    @endif
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                {{ $data->appends(['tab' => $tab, 'search' => $search])->links() }}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
