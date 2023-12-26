<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Follows') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex">
        <div class="p-6 bg-white border-b border-gray-200 w-full rounded-md">
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
                            <th scope="col">{{ __('ID') }}</th>
                            <th scope="col">{{ __('Avatar') }}</th>
                            <th scope="col">{{ __('Name') }}</th>
                            <th scope="col">{{ __('Role') }}</th>
                            <th scope="col">{{ __('Status') }}</th>
                            <th scope="col">{{ __('Time') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Sample Title 1</td>
                            <td>Category A</td>
                            <td>100</td>
                            <td>Active</td>
                            <td>Active</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Sample Title 2</td>
                            <td>Category B</td>
                            <td>150</td>
                            <td>Inactive</td>
                            <td>Active</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane">
                    <table class="table table-custom">
                        <thead>
                        <tr>
                            <th scope="col">{{ __('ID') }}</th>
                            <th scope="col">{{ __('Avatar') }}</th>
                            <th scope="col">{{ __('Name') }}</th>
                            <th scope="col">{{ __('Role') }}</th>
                            <th scope="col">{{ __('Status') }}</th>
                            <th scope="col">{{ __('Time') }}</th>
                            @if (request()->routeIs('follows.index'))
                                <th width="30%" scope="col">{{ __('Handle') }}</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Sample Title 1</td>
                            <td>Category A</td>
                            <td>100</td>
                            <td>Active</td>
                            <td>Active</td>
                            @if (request()->routeIs('follows.index'))
                                <td>
                                    <a href="detail" class="btn btn-success">{{ __('Show') }}</a>
                                    <a href="unfollow" class="btn btn-danger">{{ __('Unfollow') }}</a>
                                </td>
                            @endif
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Sample Title 2</td>
                            <td>Category B</td>
                            <td>150</td>
                            <td>Inactive</td>
                            <td>Active</td>
                            @if (request()->routeIs('follows.index'))
                                <td>
                                    <a href="detail" class="btn btn-success">{{ __('Show') }}</a>
                                    <a href="unfollow" class="btn btn-danger">{{ __('Unfollow') }}</a>
                                </td>
                            @endif
                        </tr>
                        <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

