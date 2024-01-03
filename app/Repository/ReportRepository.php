<?php

namespace App\Repository;

use App\Models\Report;

class ReportRepository
{
    public function insertReport($data)
    {
        Report::create($data);
    }
}
