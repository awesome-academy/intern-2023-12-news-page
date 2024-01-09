<?php

namespace App\Http\Controllers;

use App\Repository\ReportRepository;
use App\Repository\StatusRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    protected $reportRepository;
    protected $statusRepository;

    public function __construct(
        StatusRepository $statusRepository,
        ReportRepository $reportRepository
    ) {
        $this->statusRepository = $statusRepository;
        $this->reportRepository = $reportRepository;
    }

    public function __getDataTab($tab, $search): LengthAwarePaginator
    {
        return $this->reportRepository->getReportByTab($tab, $search);
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

        $this->reportRepository->updateStatusByTabAndClearReport($banId, $tab);
        $this->reportRepository->__deleteReportAfterAction($banId, $tab);

        return redirect()->route('reports.index')
            ->with('success', config('constants.notification.updateSuccess'));
    }
}
