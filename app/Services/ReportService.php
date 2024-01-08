<?php

namespace App\Services;

use App\Repository\ReportRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ReportService
{
    protected $reportRepository;

    public function __construct(ReportRepository $reportRepository)
    {
        $this->reportRepository = $reportRepository;
    }

    public function countReports($reportId = null)
    {
        $typesReport = config('constants.reportType');
        $total = 0;

        foreach ($typesReport as $item) {
            $total += $this->reportRepository->countReports($item, $reportId);
        }

        return $total;
    }

    public function getReportByTab($tab): LengthAwarePaginator
    {
        return $this->reportRepository->getReportByTab($tab);
    }
}
