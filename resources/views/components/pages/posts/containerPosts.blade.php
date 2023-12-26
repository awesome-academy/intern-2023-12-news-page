<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Posts') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex">
        <div class="p-6 bg-white border-b border-gray-200 w-full rounded-md">
            @if (request()->routeIs('posts.index'))
                <a href="{{route('posts.create')}}" class="btn btn-md btn-success btn-add-post">{{__ ('Create Post')}}</a>
                <hr>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lgr">
                    <div class="tabs-custom flex">
                        <div class="tab-item active">
                            {{ __('Pending') }}
                        </div>
                        <div class="tab-item">
                            {{ __('Publish') }}
                        </div>
                        <div class="line"></div>
                    </div>
                    <div class="tab-content-custom">
                        <div class="tab-pane active">
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
                                    <th width="30%" scope="col">{{ __('Handle') }}</th>
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
                                    <td>
                                        <a href="{{route('posts.show',['post'=>1])}}" class="btn btn-success">{{ __('Show') }}</a>
                                        <a href="{{route('posts.edit',['post'=>1])}}" class="btn btn-warning">{{ __('Edit') }}</a>
                                        <a href="{{route('posts.destroy',['post'=>1])}}" class="btn btn-danger">{{ __('Delete') }}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Sample Title 2</td>
                                    <td>Category B</td>
                                    <td>150</td>
                                    <td>Inactive</td>
                                    <td>2023-02-10 08:45:00</td>
                                    <td>2023-02-15 12:20:00</td>
                                    <td>
                                        <a href="{{route('posts.show',['post'=>1])}}" class="btn btn-success">{{ __('Show') }}</a>
                                        <a href="{{route('posts.edit',['post'=>1])}}" class="btn btn-warning">{{ __('Edit') }}</a>
                                        <a href="{{route('posts.destroy',['post'=>1])}}" class="btn btn-danger">{{ __('Delete') }}</a>
                                    </td>
                                </tr>
                                <!-- Add more rows as needed -->
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane">
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
                                    <th width="30%" scope="col">{{ __('Handle') }}</th>
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
                                    <td>
                                        <a href="{{route('posts.show',['post'=>1])}}" class="btn btn-success">{{ __('Show') }}</a>
                                        <a href="{{route('posts.edit',['post'=>1])}}" class="btn btn-warning">{{ __('Edit') }}</a>
                                        <a href="{{route('posts.destroy',['post'=>1])}}" class="btn btn-danger">{{ __('Delete') }}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Sample Title 2</td>
                                    <td>Category B</td>
                                    <td>150</td>
                                    <td>Inactive</td>
                                    <td>2023-02-10 08:45:00</td>
                                    <td>2023-02-15 12:20:00</td>
                                    <td>
                                        <a href="{{route('posts.show',['post'=>1])}}" class="btn btn-success">{{ __('Show') }}</a>
                                        <a href="{{route('posts.edit',['post'=>1])}}" class="btn btn-warning">{{ __('Edit') }}</a>
                                        <a href="{{route('posts.destroy',['post'=>1])}}" class="btn btn-danger">{{ __('Delete') }}</a>
                                    </td>
                                </tr>
                                <!-- Add more rows as needed -->
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
                    <!-- Add more rows as needed -->
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
