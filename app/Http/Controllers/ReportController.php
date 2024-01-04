<?php

namespace App\Http\Controllers;

use App\Repository\ReportRepository;
use App\Repository\StatusRepository;
use App\Services\ReportService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    protected $reportService;
    protected $reportRepository;
    protected $statusRepository;

    public function __construct(
        ReportService $reportService,
        StatusRepository $statusRepository,
        ReportRepository $reportRepository
    ) {
        $this->reportService = $reportService;
        $this->statusRepository = $statusRepository;
        $this->reportRepository = $reportRepository;
    }

    public function __getDataTab($tab): LengthAwarePaginator
    {
        return $this->reportService->getReportByTab($tab);
    }

    public function index(Request $request)
    {
        $tab = empty($request['tab']) ? config('constants.report.reportTabUser') : $request['tab'];

        $dataView = [
            'tab' => $tab,
            'data' => $this->__getDataTab($tab),
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
