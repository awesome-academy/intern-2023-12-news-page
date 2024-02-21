<?php

namespace Tests\Unit\Controller;

use App\Http\Controllers\LandingPageController;
use App\Models\User;
use App\Repository\Resource\CategoryRepositoryInterface;
use App\Repository\Resource\FollowRepositoryInterface;
use App\Repository\Resource\HashtagRepositoryInterface;
use App\Repository\Resource\NotificationRepositoryInterface;
use App\Repository\Resource\PostRepositoryInterface;
use App\Repository\Resource\ReportRepositoryInterface;
use App\Repository\Resource\ReviewRepositoryInterface;
use App\Repository\Resource\StatusRepositoryInterface;
use App\Repository\Resource\UserRepositoryInterface;
use App\Services\LandingPageService;
use App\Services\PostService;
use App\Services\ReportService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery;
use Tests\TestCase;

class LandingPageControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $controller;
    protected $mockReportService;
    protected $mockPostService;
    protected $mockLandingPageService;
    protected $mockCategoryRepositoryInterface;
    protected $mockHashtagRepositoryInterface;
    protected $mockPostRepositoryInterface;
    protected $mockStatusRepositoryInterface;
    protected $mockReviewRepositoryInterface;
    protected $mockReportRepositoryInterface;
    protected $mockUserRepositoryInterface;
    protected $mockFollowRepositoryInterface;
    protected $mockNotificationRepositoryInterface;

    public function setUp(): void
    {
        parent::setUp();
        $this->mockReportService = Mockery::mock(ReportService::class);
        $this->mockPostService = Mockery::mock(PostService::class);
        $this->mockLandingPageService = Mockery::mock(LandingPageService::class);
        $this->mockCategoryRepositoryInterface = Mockery::mock(CategoryRepositoryInterface::class);
        $this->mockHashtagRepositoryInterface = Mockery::mock(HashtagRepositoryInterface::class);
        $this->mockPostRepositoryInterface = Mockery::mock(PostRepositoryInterface::class);
        $this->mockStatusRepositoryInterface = Mockery::mock(StatusRepositoryInterface::class);
        $this->mockReviewRepositoryInterface = Mockery::mock(ReviewRepositoryInterface::class);
        $this->mockReportRepositoryInterface = Mockery::mock(ReportRepositoryInterface::class);
        $this->mockUserRepositoryInterface = Mockery::mock(UserRepositoryInterface::class);
        $this->mockFollowRepositoryInterface = Mockery::mock(FollowRepositoryInterface::class);
        $this->mockNotificationRepositoryInterface = Mockery::mock(NotificationRepositoryInterface::class);

        $user = User::factory()->create();
        Auth::shouldReceive('user')->andReturn($user);

        $this->artisan('db:seed', ['--class' => 'CategoriesSeeder', '--database' => 'testing']);
        $this->artisan('db:seed', ['--class' => 'RolesSeeder', '--database' => 'testing']);
        $this->artisan('db:seed', ['--class' => 'StatusesSeeder', '--database' => 'testing']);

        $this->controller = new LandingPageController(
            $this->mockLandingPageService,
            $this->mockPostService,
            $this->mockReportService,
            $this->mockCategoryRepositoryInterface,
            $this->mockHashtagRepositoryInterface,
            $this->mockPostRepositoryInterface,
            $this->mockStatusRepositoryInterface,
            $this->mockReviewRepositoryInterface,
            $this->mockReportRepositoryInterface,
            $this->mockUserRepositoryInterface,
            $this->mockFollowRepositoryInterface,
            $this->mockNotificationRepositoryInterface
        );
    }

    public function tearDown(): void
    {
        Mockery::close();
        unset($this->controller);
        parent::tearDown();
    }

    public function test_follow()
    {
        $request = Request::create(
            route('follow'),
            'POST',
            [
                'userId' => 1,
                'followId' => 2,
            ]
        );

        $requestData = [
            'user_id' => $request->input('userId'),
            'follower_id' => $request->input('followId'),
        ];

        $this->mockFollowRepositoryInterface
            ->shouldReceive('followAction')
            ->once()
            ->with($requestData);

        $response = $this->controller->follow($request);

        $this->assertInstanceOf(JsonResponse::class, $response);
    }
}
