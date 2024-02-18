<?php

namespace App\Services;

use App\Repository\Resource\ReportRepositoryInterface;

class ReportService
{
    protected $reportRepositoryInterface;

    public function __construct(ReportRepositoryInterface $reportRepositoryInterface)
    {
        $this->reportRepositoryInterface = $reportRepositoryInterface;
    }

    public function countReports($reportId = null): int
    {
        $typesReport = config('constants.reportType');
        $total = 0;

        foreach ($typesReport as $item) {
            $total += $this->reportRepositoryInterface->countReports($item, $reportId);
        }

        return $total;
    }
}
