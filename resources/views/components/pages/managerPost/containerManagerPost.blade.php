<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Handle') . ' ' . __('Posts') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex">
        <div class="p-6 bg-white border-b border-gray-200 w-full rounded-md">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lgr">
                <div class="flex justify-between items-center flex-wrap">
                    <div class="tabs-custom flex">
                        <a href="{{ route('manager.post.index', ['tab' => config('constants.post.postStatusSlugVerify')]) }}"
                            class="tab-item {{ empty($tab) || $tab === config('constants.post.postStatusSlugVerify') ? 'active' : '' }}">
                            {{ __('Verified') }}
                        </a>
                        <a href="{{ route('manager.post.index', ['tab' => config('constants.post.postStatusSlugNotVerify')]) }}"
                            class="tab-item {{ $tab === config('constants.post.postStatusSlugNotVerify') ? 'active' : '' }}">
                            {{ __('Not Verify Yet') }}
                        </a>
                        <a href="{{ route('manager.post.index', ['tab' => config('constants.post.postStatusSlugBanned')]) }}"
                            class="tab-item {{ $tab === config('constants.post.postStatusSlugBanned') ? 'active' : '' }}">
                            {{ __('Banned') }}
                        </a>
                        <div class="line"></div>
                    </div>
                    <form method="get" action="{{ route('manager.post.index') }}" id="form-search">
                        <div class="position-relative container-form-search">
                            <input name="tab" class="hidden" value="{{ $tab ?? null }}">
                            <input name="search" placeholder="{{ __('Enter the title you want to search for') }}"
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
                                    <th class="text-center" width="10%" scope="col">{{ __('Title') }}</th>
                                    <th class="text-center" scope="col">{{ __('Category') }}</th>
                                    <th class="text-center" scope="col">{{ __('Views') }}</th>
                                    <th class="text-center" scope="col">{{ __('Status') }}</th>
                                    <th class="text-center" scope="col">{{ __('Created_at') }}</th>
                                    <th class="text-center" scope="col">{{ __('Updated_at') }}</th>
                                    <th class="text-center" width="30%" scope="col">{{ __('Handle') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td class="text-center">{{ $item->id }}</td>
                                        <td class="text-center">{{ $item->title }}</td>
                                        <td class="text-center">{{ $item->category->name }}</td>
                                        <td class="text-center">{{ $item->views }}</td>
                                        <td class="text-center">{{ $item->status->name }}</td>
                                        <td class="text-center">{{ formatDate($item->created_at) }}</td>
                                        <td class="text-center">{{ formatDate($item->updated_at) }}</td>
                                        <td class="flex text-center justify-center" style="flex-wrap: wrap;">
                                            @if (empty($tab) || $tab === config('constants.post.postStatusSlugVerify'))
                                                <a href="{{ route('detail', ['id' => $item->id]) }}" target="_blank"
                                                    class="btn btn-success mr-2">{{ __('Show') }}</a>
                                                <form
                                                    action="{{ route('handle.manager.post', ['post' => $item->id, 'status' => config('constants.post.postStatusSlugBanned')]) }}"
                                                    method="post" class="position-relative js-delete"
                                                    style="width: fit-content;" enctype="multipart/form-data">
                                                    @csrf
                                                    {{ method_field('PATCH') }}
                                                    <button
                                                        data-ask="{{ __('Are you sure you want to update this resource?') }}"
                                                        class="btn btn-danger mr-2">{{ __('Ban') }}</button>
                                                </form>
                                                <form
                                                    action="{{ route('handle.manager.post', ['post' => $item->id, 'status' => config('constants.post.postStatusSlugNotVerify')]) }}"
                                                    method="post" class="position-relative js-delete"
                                                    style="width: fit-content;" enctype="multipart/form-data">
                                                    @csrf
                                                    {{ method_field('PATCH') }}
                                                    <button
                                                        data-ask="{{ __('Are you sure you want to update this resource?') }}"
                                                        class="btn btn-danger">{{ __('Unverified') }}</button>
                                                </form>
                                            @endif
                                            @if ($tab === config('constants.post.postStatusSlugNotVerify'))
                                                <form
                                                    action="{{ route('handle.manager.post', ['post' => $item->id, 'status' => config('constants.post.postStatusSlugBanned')]) }}"
                                                    method="post" class="position-relative js-delete"
                                                    style="width: fit-content;" enctype="multipart/form-data">
                                                    @csrf
                                                    {{ method_field('PATCH') }}
                                                    <button
                                                        data-ask="{{ __('Are you sure you want to update this resource?') }}"
                                                        class="btn btn-danger mr-2">{{ __('Ban') }}</button>
                                                </form>
                                                <form
                                                    action="{{ route('handle.manager.post', ['post' => $item->id, 'status' => config('constants.post.postStatusSlugVerify')]) }}"
                                                    method="post" class="position-relative js-delete"
                                                    style="width: fit-content;" enctype="multipart/form-data">
                                                    @csrf
                                                    {{ method_field('PATCH') }}
                                                    <button
                                                        data-ask="{{ __('Are you sure you want to update this resource?') }}"
                                                        class="btn btn-success">{{ __('Verify') }}</button>
                                                </form>
                                            @endif

                                            @if ($tab === config('constants.post.postStatusSlugBanned'))
                                                <form
                                                    action="{{ route('handle.manager.post', ['post' => $item->id, 'status' => config('constants.post.postStatusSlugPublish')]) }}"
                                                    method="post" class="position-relative js-delete"
                                                    style="width: fit-content;" enctype="multipart/form-data">
                                                    @csrf
                                                    {{ method_field('PATCH') }}
                                                    <button
                                                        data-ask="{{ __('Are you sure you want to update this resource?') }}"
                                                        class="btn btn-success">{{ __('Publish') }}</button>
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
