<?php

namespace App\Repository\Resource;

interface ReportRepositoryInterface
{
    public function insertReport($data);

    public function countReports($type, $reportId);

    public function getReportByTab($tab, $search);

    public function updateStatusByTabAndClearReport($id, $tab);

    public function __deleteReportAfterAction($id, $type);
}
