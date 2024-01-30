<?php

namespace App\Http\Controllers;

use App\Repository\Resource\ReportRepositoryInterface;
use App\Repository\Resource\StatusRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    protected $reportRepositoryInterface;
    protected $statusRepositoryInterface;

    public function __construct(
        StatusRepositoryInterface $statusRepositoryInterface,
        ReportRepositoryInterface $reportRepositoryInterface
    ) {
        $this->statusRepositoryInterface = $statusRepositoryInterface;
        $this->reportRepositoryInterface = $reportRepositoryInterface;
    }

    public function __getDataTab($tab, $search): LengthAwarePaginator
    {
        return $this->reportRepositoryInterface->getReportByTab($tab, $search);
    }

    public function index(Request $request)
    {
        $tab = empty($request['tab']) ? config('constants.report.reportTabUser') : $request['tab'];
        $search = $request['search'];

        $dataView = [
            'tab' => $tab,
            'search' => $search,
            'data' => $this->__getDataTab($tab, $search),
        ];

        return view('auth/pages/report/index')->with($dataView);
    }

    public function updateStatus(Request $request, $report): RedirectResponse
    {
        $banId = $report;
        $tab = $request['tab'];

        $this->reportRepositoryInterface->updateStatusByTabAndClearReport($banId, $tab);
        $this->reportRepositoryInterface->__deleteReportAfterAction($banId, $tab);

        return redirect()->route('reports.index')
            ->with('success', config('constants.notification.updateSuccess'));
    }
}
