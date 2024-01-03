<?php

namespace App\Repository;

use App\Models\Report;

class ReportRepository
{
    public function insertReport($data)
    {
        Report::create($data);
    }

    public function countReports($type, $reportId)
    {
        switch ($type) {
            case config('constants.review.reviewType'):
                $query = Report::with('review')->where('type', $type);
                if ($reportId !== null) {
                    $query->whereHas('review', function ($query) use ($reportId) {
                        $query->where('user_id', $reportId);
                    });
                }

                return $query->count();
            case config('constants.post.postType'):
                $query = Report::with('post')->where('type', $type);
                if ($reportId !== null) {
                    $query->whereHas('post', function ($query) use ($reportId) {
                        $query->where('user_id', $reportId);
                    });
                }

                return $query->count();
            case config('constants.user.userType'):
                return Report::where('report_id', $reportId)->where('type', $type)->count();
        }
    }
}
