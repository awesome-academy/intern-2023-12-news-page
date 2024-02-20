<?php

namespace Tests\Feature\Controller;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class DashboardControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create([
            'role_id' => 1,
            'status_id' => 1,
            'password' => Hash::make('current_password'),
        ]);

        $this->artisan('db:seed', ['--class' => 'CategoriesSeeder', '--database' => 'testing']);
        $this->artisan('db:seed', ['--class' => 'RolesSeeder', '--database' => 'testing']);
        $this->artisan('db:seed', ['--class' => 'StatusesSeeder', '--database' => 'testing']);
    }

    public function tearDown(): void
    {
        unset($this->user);
        parent::tearDown();
    }

    public function test_authenticated_user_role_un_permission_can_access_dashboard()
    {
        $this->user->update(['status_id' => 1]);
        $response = $this->actingAs($this->user)->get('/dashboard');

        $response->assertStatus(200);
    }

    public function test_authenticated_user_role_permission_can_access_dashboard()
    {
        $this->user->update(['role_id' => rand(2, 3), 'status_id' => 1]);
        $response = $this->actingAs($this->user)->get('/dashboard');

        $response->assertStatus(200);
    }

    public function test_unauthenticated_user_access_dashboard()
    {
        $response = $this->get('/dashboard');

        $response->assertRedirect('/login');
        $response->assertStatus(302);
    }

    public function test_ban_user_access_dashboard()
    {
        $this->user->update(['status_id' => 2]);
        $response = $this->actingAs($this->user)->get('/dashboard');

        $response->assertRedirect('/login');
        $response->assertStatus(302);
        $response->assertSessionHas('reason');
    }

    public function test_authenticated_user_can_access_profile()
    {
        $this->user->update(['status_id' => 1]);
        $response = $this->actingAs($this->user)->get('/profile');

        $response->assertStatus(200);
    }

    public function test_unauthenticated_user_access_profile()
    {
        $response = $this->get('/profile');

        $response->assertRedirect('/login');
        $response->assertStatus(302);
    }

    public function test_ban_user_access_profile()
    {
        $this->user->update(['status_id' => 2]);
        $response = $this->actingAs($this->user)->get('/profile');

        $response->assertRedirect('/login');
        $response->assertStatus(302);
        $response->assertSessionHas('reason');
    }

    public function test_authenticated_user_can_update_file_profile()
    {
        $this->user->update(['status_id' => 1]);
        $file = UploadedFile::fake()->create('fake_image.jpg');

        $response = $this->actingAs($this->user)->patch('/update-profile', [
            'name' => 'New Name',
            'file' => $file,
        ]);

        $response->assertRedirect(route('profile'));
        $response->assertSessionHas('success');
    }

    public function test_authenticated_user_can_update_not_file_profile()
    {
        $this->user->update(['status_id' => 1]);
        $response = $this->actingAs($this->user)->patch('/update-profile', [
            'name' => 'New Name',
            'default' => 'uploads/profile/avatar/fake_image.jpg',
        ]);

        $response->assertRedirect(route('profile'));
        $response->assertSessionHas('success');
    }

    public function test_unauthenticated_user_update_profile()
    {
        $response = $this->patch('/update-profile');

        $response->assertRedirect('/login');
        $response->assertStatus(302);
    }

    public function test_ban_user_update_profile()
    {
        $this->user->update(['status_id' => 2]);
        $response = $this->actingAs($this->user)->patch('/update-profile');

        $response->assertRedirect('/login');
        $response->assertStatus(302);
        $response->assertSessionHas('reason');
    }

    public function test_authenticated_user_can_update_password()
    {
        $this->user->update(['status_id' => 1]);
        $response = $this->actingAs($this->user)->patch('/update-password', [
            'current_password' => 'current_password',
            'new_password' => 'new_password',
            'confirm_password' => 'new_password',
        ]);

        $response->assertRedirect(route('profile'));
        $response->assertSessionHas('success');
    }

    public function test_unauthenticated_user_update_password()
    {
        $response = $this->patch('/update-password');

        $response->assertRedirect('/login');
        $response->assertStatus(302);
    }

    public function test_ban_user_update_password()
    {
        $this->user->update(['status_id' => 2]);
        $response = $this->actingAs($this->user)->patch('/update-password');

        $response->assertRedirect('/login');
        $response->assertStatus(302);
        $response->assertSessionHas('reason');
    }
}
