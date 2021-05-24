<?php

namespace Tests\Feature\admin;

use Tests\TestCase;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DashboardTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_redirect_in_login_without_authentication()
    {
        $response = $this->get(route('dashboard'));

        $response->assertRedirect('/login');
    }

    public function test_admin_can_authenticate_using_the_login_screen()
    {
        $user = User::factory()->create(['email' => 'admin@admin.com']);
        $user->assignRole('super-admin');

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function test_admin_can_using_the_list_category_screen()
    {
        $this->admin_authenticate();

        $response = $this->get(route('admin.categories.index'));
    
        $response->assertStatus(200);
    }

    public function test_user_with_role_user_not_can_using_the_list_category_screen()
    {   
        Role::create(['name' => 'user']);
        $user = User::factory()->create(['email' => 'user1@user.com']);
        $user->assignRole('user');

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response = $this->get(route('admin.categories.index'));
        $response->assertStatus(403);
    }

    public function test_admin_can_using_the_create_category_screen()
    {
        $this->admin_authenticate();
        $response = $this->get(route('admin.categories.create'));

        $response->assertStatus(200);
    }

    public function test_user_with_role_user_not_can_using_the_create_category_screen()
    {
        $this->user_authenticate();

        $response = $this->get(route('admin.categories.create'));

        $response->assertStatus(403);
    }

    public function admin_authenticate()
    {
        $response = $this->post('/login', [
            'email' => 'test@correo.com',
            'password' => 'password',
        ]);
    }

    public function user_authenticate()
    {
        $response = $this->post('/login', [
            'email' => 'user1@user.com',
            'password' => 'password',
        ]);
    }
}
