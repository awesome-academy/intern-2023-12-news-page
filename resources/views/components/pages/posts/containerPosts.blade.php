<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Posts') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex">
        <div class="p-6 bg-white border-b border-gray-200 w-full rounded-md">
            @if (request()->routeIs('posts.index'))
                <a href="{{ route('posts.create') }}"
                   class="btn btn-md btn-success btn-add-post">{{ __('Create Post') }}</a>
                <hr>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lgr">
                    <div class="flex justify-between items-center">
                        <div class="tabs-custom flex">
                            <a href="{{ route('posts.index', ['tab' => config('constants.post.postStatusDefault')]) }}"
                               class="tab-item {{ ($tab === null || $tab === config('constants.post.postStatusDefault')) ? 'active' : '' }}">
                                {{ __('All') }}
                            </a>
                            <a href="{{ route('posts.index', ['tab' => config('constants.post.postStatusSlugPending')]) }}"
                               class="tab-item {{ ($tab === config('constants.post.postStatusSlugPending')) ? 'active' : '' }}">
                                {{ __('Pending') }}
                            </a>
                            <a href="{{ route('posts.index', ['tab' => config('constants.post.postStatusSlugPublish')]) }}"
                               class="tab-item {{ ($tab === config('constants.post.postStatusSlugPublish')) ? 'active' : '' }}">
                                {{ __('Publish') }}
                            </a>
                            <a href="{{ route('posts.index', ['tab' => config('constants.post.postStatusSlugHidden')]) }}"
                               class="tab-item {{ ($tab === config('constants.post.postStatusSlugHidden')) ? 'active' : '' }}">
                                {{ __('Hidden') }}
                            </a>
                            <a href="{{ route('posts.index', ['tab' => config('constants.post.postStatusSlugBanned')]) }}"
                               class="tab-item {{ ($tab === config('constants.post.postStatusSlugBanned')) ? 'active' : '' }}">
                                {{ __('Banned') }}
                            </a>
                            <div class="line"></div>
                        </div>
                        <form method="get" action="{{route('posts.index')}}" id="form-search">
                            <div class="position-relative container-form-search">
                                <input name="tab" class="hidden" value="{{$tab ?? null}}">
                                <input name="search" placeholder="{{ __('Enter the title you want to search for') }}"
                                       class="p-4 bg-white border-b border-gray-200 w-full rounded-md">
                                <button class="btn btn-success mt-2">{{ __('Search') }}</button>
                            </div>
                        </form>
                    </div>
                    @if(!empty(session('success')))
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
                                    <th class="text-center" width="10%"
                                        scope="col">{{ __('Action') . ' ' . __('Status') }}</th>
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
                                            @if($item->status->slug === config('constants.post.postStatusSlugPublish'))
                                                <a href="{{ route('detail', ['id' => $item->id]) }}"
                                                   style="margin-right: 5px;" target="_blank"
                                                   class="btn btn-success">{{ __('Show') }}</a>
                                            @endif
                                            <a href="{{ route('posts.edit',[ 'post' => $item->id ]) }}"
                                               style="margin-right: 5px;"
                                               class="btn btn-warning">{{ __('Edit') }}</a>
                                            <form action="{{ route('posts.destroy',['post' => $item->id]) }}"
                                                  method="post" class="position-relative js-delete"
                                                  id="posts" style="width: fit-content;"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button
                                                    data-ask="{{ __('Are you sure you want to delete this resource?') }}"
                                                    class="btn btn-danger">{{ __('Delete') }}</button>
                                            </form>
                                        </td>
                                        <td style="flex-wrap: wrap;">
                                            @if ($item->status->slug === config('constants.post.postStatusSlugPublish'))
                                                <form action="{{ route('post.editStatus',['post' => $item->id]) }}"
                                                      method="post" class="position-relative"
                                                      id="posts" style="width: fit-content;margin: auto"
                                                      enctype="multipart/form-data">
                                                    @csrf
                                                    {{ method_field('PATCH') }}
                                                    <input name="status" class="hidden" type="text"
                                                           value="{{ config('constants.post.postStatusSlugHidden') }}">
                                                    <button class="btn btn-danger">
                                                        {{ __('Hidden') }}
                                                    </button>
                                                </form>
                                            @elseif ($item->status->slug === config('constants.post.postStatusSlugHidden'))
                                                <form action="{{route('post.editStatus',['post' => $item->id])}}"
                                                      method="post" class="position-relative"
                                                      id="posts" style="width: fit-content;"
                                                      enctype="multipart/form-data">
                                                    @csrf
                                                    {{ method_field('PATCH') }}
                                                    <input name="status" class="hidden" type="text"
                                                           value="{{ config('constants.post.postStatusSlugPublish') }}">
                                                    <button class="btn btn-success">
                                                        {{ __('Publish') }}
                                                    </button>
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
            @else
                <table class="table table-custom">
                    <thead>
                    <tr>
                        <th scope="col">{{ __('ID') }}</th>
                        <th scope="col">{{ __('Title') }}</th>
                        <th scope="col">{{ __('Category') }}</th>
                        <th scope="col">{{ __('Views') }}</th>
                        <th scope="col">{{ __('Status') }}</th>
                        <th scope="col">{{ __('Created_at') }}</th>
                        <th scope="col">{{ __('Updated_at') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Sample Title 1</td>
                        <td>Category A</td>
                        <td>100</td>
                        <td>Active</td>
                        <td>2023-01-01 10:00:00</td>
                        <td>2023-01-05 15:30:00</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Sample Title 2</td>
                        <td>Category B</td>
                        <td>150</td>
                        <td>Inactive</td>
                        <td>2023-02-10 08:45:00</td>
                        <td>2023-02-15 12:20:00</td>
                    </tr>
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
