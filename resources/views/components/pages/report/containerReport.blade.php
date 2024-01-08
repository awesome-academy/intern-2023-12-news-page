<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Reports') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex">
        <div class="p-6 bg-white border-b border-gray-200 w-full rounded-md">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lgr">
                <div class="tabs-custom flex">
                    <a href="{{ route('reports.index', ['tab' => config('constants.report.reportTabUser')]) }}"
                        class="tab-item {{ $tab === config('constants.report.reportTabUser') ? 'active' : '' }}">
                        {{ __('Users') }}
                    </a>
                    <a href="{{ route('reports.index', ['tab' => config('constants.report.reportTabPost')]) }}"
                        class="tab-item {{ ($tab === config('constants.report.reportTabPost')) ? 'active' : '' }}">
                        {{ __('Posts') }}
                    </a>
                    <a href="{{ route('reports.index', ['tab' => config('constants.report.reportTabReview')]) }}"
                        class="tab-item {{ ($tab === config('constants.report.reportTabReview')) ? 'active' : '' }}">
                        {{ __('Reviews') }}
                    </a>
                    <div class="line"></div>
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
                                <th scope="col">{{ __('ID') }}</th>
                                <th scope="col">{{ __('Type') . ' ' . __('Report') }}</th>
                                <th scope="col">{{ __('Users') . ' ' . __('Report') }}</th>
                                <th scope="col">{{ __('ID') . ' ' . __('Report') }}</th>
                                <th scope="col" width="40%">{{ __('Content') }}</th>
                                <th scope="col">{{ __('Created_at') }}</th>
                                <th scope="col">{{ __('Updated_at') }}</th>
                                <th width="20%" scope="col">{{ __('Handle') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->type }}</td>
                                    <td>{{ $item->userInfo->name ?? __('Incognito') }}</td>
                                    <td>{{ $item->report_id }}</td>
                                    <td>{{ $item->content }}</td>
                                    <td>{{ formatDate($item->created_at) }}</td>
                                    <td>{{ formatDate($item->updated_at) }}</td>
                                    <td class="flex">
                                        @if ($item->type === config('constants.report.reportTabPost'))
                                            <a href="{{ route('detail', ['id' => $item->report_id]) }}"
                                               style="margin-right: 5px;" target="_blank"
                                               class="btn btn-success">{{ __('Show') }}</a>
                                        @elseif ($item->type === config('constants.report.reportTabUser'))
                                            <a href="{{ route('info', ['id' => $item->report_id]) }}"
                                               style="margin-right: 5px;" target="_blank"
                                               class="btn btn-success">{{ __('Show') }}</a>
                                        @endif

                                        <form action="{{ route('report.updateStatus', ['report' => $item->report_id]) }}"
                                            method="post" class="position-relative js-delete"
                                            id="posts" style="width: fit-content;margin: auto"
                                            enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PATCH') }}
                                            <input name="tab" class="hidden" type="text"
                                                value="{{ $tab }}">
                                            <button class="btn btn-danger"
                                                data-ask="{{ __('Are you sure you want to update this resource?') }}">
                                                {{ __('Ban') }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            {{ $data->appends(['tab' => $tab])->links() }}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
