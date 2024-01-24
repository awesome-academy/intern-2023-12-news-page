<?php

namespace Tests\Unit\Controller;

use App\Http\Controllers\DashboardController;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\ProfileRequest;
use App\Models\User;
use App\Repository\FollowRepository;
use App\Repository\PostRepository;
use App\Repository\UserRepository;
use App\Services\PostService;
use App\Services\ReportService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Mockery;
use Tests\TestCase;

class DashboardControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $controller;
    protected $mockPostRepository;
    protected $mockReportService;
    protected $mockUserRepository;
    protected $mockFollowRepository;
    protected $mockPostService;

    public function setUp(): void
    {
        parent::setUp();
        $this->mockPostRepository = Mockery::mock(PostRepository::class);
        $this->mockReportService = Mockery::mock(ReportService::class);
        $this->mockUserRepository = Mockery::mock(UserRepository::class);
        $this->mockFollowRepository = Mockery::mock(FollowRepository::class);
        $this->mockPostService = Mockery::mock(PostService::class);

        $this->app->instance('App\Repository\PostRepository', $this->mockPostRepository);
        $this->app->instance('App\Repository\FollowRepository', $this->mockFollowRepository);
        $this->app->instance('App\Services\ReportService', $this->mockReportService);
        $this->app->instance('App\Services\PostService', $this->mockPostService);

        $this->artisan('db:seed', ['--class' => 'CategoriesSeeder', '--database' => 'testing']);
        $this->artisan('db:seed', ['--class' => 'RolesSeeder', '--database' => 'testing']);
        $this->artisan('db:seed', ['--class' => 'StatusesSeeder', '--database' => 'testing']);

        $this->controller = new DashboardController(
            $this->mockPostRepository,
            $this->mockReportService,
            $this->mockUserRepository,
            $this->mockFollowRepository,
            $this->mockPostService
        );
    }

    public function tearDown(): void
    {
        Mockery::close();
        unset($this->controller);
        parent::tearDown();
    }

    public function test_dashboard_if_false()
    {
        $user = User::factory()->create(['role_id' => 1]);
        Auth::shouldReceive('user')->andReturn($user);
        $userId = $user->id;
        $role = $user->role->slug;
        $arrayValueTime = config('constants.dayQuery.dataQueryValue');
        $request = Request::create(
            route('dashboard'),
            'GET',
            ['time' => $arrayValueTime[array_rand($arrayValueTime)]]
        );

        $mockedData = new Collection([]);
        $this->mockPostService->shouldReceive('getDataDateQuery')
            ->once()
            ->with($request['time'], $userId)
            ->andReturn($mockedData);
        $this->mockPostRepository->shouldReceive('countViews')->once()
            ->with($userId)->andReturn(5);
        $this->mockPostRepository->shouldReceive('countPosts')->once()
            ->with($userId)->andReturn(5);
        $this->mockFollowRepository->shouldReceive('countFollower')->once()
            ->with($userId)->andReturn(5);
        $this->mockPostRepository->shouldReceive('getHighestViewPost')->once()
            ->with($userId);
        $this->mockPostRepository->shouldReceive('getHighestCommentPost')
            ->once()->with($userId);
        $this->mockPostRepository->shouldReceive('getNewestPost')->once()
            ->with($userId);

        if (in_array($role, config('constants.modSlug'))) {
            $this->mockReportService->shouldReceive('countReports')->once()
                ->andReturn(5);
        }

        $response = $this->controller->dashboard($request);

        $this->assertInstanceOf(View::class, $response);
    }

    public function test_dashboard_if_true()
    {
        $user = User::factory()->create(['role_id' => rand(2, 3)]);
        Auth::shouldReceive('user')->andReturn($user);
        $userId = $user->id;
        $role = $user->role->slug;
        $arrayValueTime = config('constants.dayQuery.dataQueryValue');
        $request = Request::create(
            route('dashboard'),
            'GET',
            ['time' => $arrayValueTime[array_rand($arrayValueTime)]]
        );

        $mockedData = new Collection([
            (object) ['created_at' => '2024-01-08 05:55:53','updated_at' => '2024-01-23 14:25:30'],
            (object) ['created_at' => '2024-01-08 05:55:53','updated_at' => null],
        ]);
        $this->mockPostService->shouldReceive('getDataDateQuery')
            ->once()
            ->with($request['time'], $userId)
            ->andReturn($mockedData);
        $this->mockPostRepository->shouldReceive('countViews')->once()
            ->with($userId)->andReturn(5);
        $this->mockPostRepository->shouldReceive('countPosts')->once()
            ->with($userId)->andReturn(5);
        $this->mockFollowRepository->shouldReceive('countFollower')->once()
            ->with($userId)->andReturn(5);
        $this->mockPostRepository->shouldReceive('getHighestViewPost')->once()
            ->with($userId);
        $this->mockPostRepository->shouldReceive('getHighestCommentPost')
            ->once()->with($userId);
        $this->mockPostRepository->shouldReceive('getNewestPost')->once()
            ->with($userId);

        if (in_array($role, config('constants.modSlug'))) {
            $this->mockReportService->shouldReceive('countReports')->once()
                ->andReturn(5);
        }

        $response = $this->controller->dashboard($request);

        $this->assertInstanceOf(View::class, $response);
    }

    public function test_profile()
    {
        $response = $this->controller->profile();

        $this->assertInstanceOf(View::class, $response);
    }

    public function test_updateProfile_upload_avatar()
    {
        $user = User::factory()->create();
        Auth::shouldReceive('user')->andReturn($user);

        $file = UploadedFile::fake()->create('fake_image.jpg');
        $request = ProfileRequest::create(
            route('update.profile'),
            'PATCH',
            ['name' => 'abc', 'file' => $file],
        );

        $this->mockUserRepository
            ->shouldReceive('updateProfile')
            ->once()
            ->with(Mockery::type('int'), Mockery::type('array'));

        $this->controller->updateProfile($request);

        $response = $this->controller->profile();

        $this->assertInstanceOf(View::class, $response);
    }

    public function test_updateProfile_not_upload_avatar()
    {
        $user = User::factory()->create();
        Auth::shouldReceive('user')->andReturn($user);

        $request = ProfileRequest::create(
            route('update.profile'),
            'PATCH',
            ['name' => 'abc', 'default' => 'default.jpg'],
        );

        $this->mockUserRepository
            ->shouldReceive('updateProfile')
            ->once()
            ->with(Mockery::type('int'), Mockery::type('array'));

        $this->controller->updateProfile($request);

        $response = $this->controller->profile();

        $this->assertInstanceOf(View::class, $response);
    }

    public function test_updatePassword()
    {
        $user = User::factory()->create(['password' => Hash::make('123')]);
        Auth::shouldReceive('user')->andReturn($user);

        $request = PasswordRequest::create(
            route('update.profile'),
            'PATCH',
            ['new_password' => '123']
        );

        $this->mockUserRepository
            ->shouldReceive('updateProfile')
            ->once()
            ->with(Mockery::type('int'), Mockery::type('array'));

        $this->controller->updatePassword($request);

        $response = $this->controller->profile();

        $this->assertInstanceOf(View::class, $response);
    }
}
