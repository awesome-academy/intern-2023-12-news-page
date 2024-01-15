<?php

namespace App\Repository;

use App\Models\Post;
use App\Models\Report;
use App\Models\Review;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ReportRepository
{
    protected $statusRepository;

    public function __construct(StatusRepository $statusRepository)
    {
        $this->statusRepository = $statusRepository;
    }

    public function insertReport($data)
    {
        Report::create($data);
    }

    public function countReports($type, $reportId)
    {
        if ($type !== config('constants.user.userType')) {
            $query = Report::with($type)->where('type', $type);
            if ($reportId !== null) {
                $query->whereHas($type, function ($query) use ($reportId) {
                    $query->where('user_id', $reportId);
                });
            }

            return $query->count();
        }

        return Report::where('report_id', $reportId)->where('type', $type)->count();
    }

    public function getReportByTab($tab, $search): LengthAwarePaginator
    {
        if ($tab === config('constants.post.postType')) {
            $getIdStatus = $this->statusRepository
                ->getIdBySlug(config('constants.post.postStatusSlugPublish'), $tab);
        } elseif ($tab === config('constants.review.reviewType')) {
            $getIdStatus = $this->statusRepository
                ->getIdBySlug(config('constants.review.reviewStatusPublish'), $tab);
        } else {
            $getIdStatus = $this->statusRepository
                ->getIdBySlug(config('constants.user.userStatusActive'), config('constants.user.userStatusType'));
        }

        return Report::where('type', $tab)
            ->with('userInfo')
            ->when($search, function ($query) use ($search) {
                return $query->where('report_id', $search);
            })
            ->whereHas($tab, function ($query) use ($getIdStatus) {
                $query->where('status_id', $getIdStatus);
            })->select(['content', 'report_id', 'created_at', 'user_id'])->orderBy('created_at', 'DESC')
            ->paginate(config('constants.paginate'));
    }

    public function updateStatusByTabAndClearReport($id, $tab)
    {
        switch ($tab) {
            case config('constants.user.userType'):
                $getIdStatus = $this->statusRepository->getIdBySlug(
                    config('constants.user.userStatusBan'),
                    config('constants.user.userStatusType')
                );
                User::find($id)->update([
                    'status_id' => $getIdStatus,
                ]);

                break;
            case config('constants.post.postType'):
                $getIdStatus = $this->statusRepository->getIdBySlug(
                    config('constants.post.postStatusSlugBanned'),
                    config('constants.post.postType')
                );
                Post::find($id)->update([
                    'status_id' => $getIdStatus,
                ]);

                break;
            case config('constants.review.reviewType'):
                $getIdStatus = $this->statusRepository->getIdBySlug(
                    config('constants.review.reviewStatusBan'),
                    config('constants.review.reviewType')
                );
                Review::find($id)->update([
                    'status_id' => $getIdStatus,
                ]);

                break;
        }
    }

    public function __deleteReportAfterAction($id, $type)
    {
        Report::where('report_id', $id)->where('type', $type)->delete();
    }
}
