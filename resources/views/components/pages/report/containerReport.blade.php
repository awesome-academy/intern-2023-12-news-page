<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Reports') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex">
        <div class="p-6 bg-white border-b border-gray-200 w-full rounded-md">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lgr">
                <div class="flex justify-between items-center flex-wrap">
                    <div class="tabs-custom flex">
                        <a href="{{ route('reports.index', ['tab' => config('constants.report.reportTabUser')]) }}"
                            class="tab-item {{ $tab === config('constants.report.reportTabUser') ? 'active' : '' }}">
                            {{ __('Users') }}
                        </a>
                        <a href="{{ route('reports.index', ['tab' => config('constants.report.reportTabPost')]) }}"
                            class="tab-item {{ $tab === config('constants.report.reportTabPost') ? 'active' : '' }}">
                            {{ __('Posts') }}
                        </a>
                        <a href="{{ route('reports.index', ['tab' => config('constants.report.reportTabReview')]) }}"
                            class="tab-item {{ $tab === config('constants.report.reportTabReview') ? 'active' : '' }}">
                            {{ __('Reviews') }}
                        </a>
                        <div class="line"></div>
                    </div>
                    <form method="get" action="{{ route('reports.index') }}" id="form-search">
                        <div class="position-relative container-form-search">
                            <input name="tab" class="hidden" value="{{ $tab ?? null }}">
                            <input name="search" placeholder="{{ __('Enter the id you want to search for') }}"
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
                                    <th class="text-center" scope="col">{{ __('ID') . ' ' . __('Report') }}</th>
                                    <th class="text-center" scope="col">{{ __('Users') . ' ' . __('Report') }}</th>
                                    <th class="text-center" scope="col" width="40%">{{ __('Content') }}</th>
                                    <th class="text-center" scope="col">{{ __('Created_at') }}</th>
                                    <th class="text-center" width="20%" scope="col">{{ __('Handle') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td class="text-center">{{ $item->report_id }}</td>
                                        <td class="text-center">{{ $item->userInfo->name ?? __('Incognito') }}</td>
                                        <td class="text-center">{{ $item->content }}</td>
                                        <td class="text-center">{{ formatDate($item->created_at) }}</td>
                                        <td class="flex text-center">
                                            @if ($item->type === config('constants.report.reportTabPost'))
                                                <a href="{{ route('detail', ['id' => $item->report_id]) }}"
                                                    style="margin-right: 5px;" target="_blank"
                                                    class="btn btn-success">{{ __('Show') }}</a>
                                            @elseif ($item->type === config('constants.report.reportTabUser'))
                                                <a href="{{ route('info', ['id' => $item->report_id]) }}"
                                                    style="margin-right: 5px;" target="_blank"
                                                    class="btn btn-success">{{ __('Show') }}</a>
                                            @endif

                                            <form
                                                action="{{ route('report.updateStatus', ['report' => $item->report_id]) }}"
                                                method="post" class="position-relative js-delete" id="posts"
                                                style="width: fit-content;margin: auto" enctype="multipart/form-data">
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
