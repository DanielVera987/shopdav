<?php

namespace Tests\Feature\admin;

use App\Models\Coupon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CouponTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_admin_can_be_rendered_screen_list_coupon()
    {
        $this->admin_authenticate();

        $coupon = Coupon::factory()->create();

        $response = $this->get(route('admin.coupons.index'));

        $response->assertStatus(200)
            ->assertSee($coupon->name);
    }

    public function test_admin_can_be_rendered_screen_create_coupon()
    {
        $this->admin_authenticate();

        $response = $this->get(route('admin.coupons.create'));

        $response->assertSee('Crear Nuevo Cupon')
            ->assertSee(200);
    }

    public function test_admin_can_be_create_coupon()
    {
        $this->admin_authenticate();

        $response = $this->post(route('admin.coupons.store'), [
            'name' => 'PROMO',
            'code' => 'SUPER-PROMO',
            'active' => 1,
            'discount_percent' => '15',
            'start_date' => '2021-05-27',
            'end_date' => '2021-05-28'
        ]);

        $response->assertStatus(302)
            ->assertRedirect(route('admin.coupons.index'))
            ->assertSessionHas('success');
    }

    public function test_admin_can_be_rendered_screen_edit_coupon()
    {
        $this->admin_authenticate();

        $coupon = Coupon::factory()->create();
        $response = $this->get(route('admin.coupons.edit', $coupon->id));

        $response->assertSee('Actualizar Cupon')
            ->assertSee(200);
    }

    public function test_admin_can_be_update_coupon()
    {
        $this->admin_authenticate();

        $coupon = Coupon::factory()->create();

        $response = $this->put(route('admin.coupons.update', $coupon->id), [
            'name' => 'PROMO',
            'code' => 'SUPER-PROMO',
            'active' => 1,
            'discount_percent' => '15',
            'start_date' => '2021-05-27',
            'end_date' => '2021-05-28'
        ]);

        $response->assertStatus(302)
            ->assertRedirect(route('admin.coupons.index'))
            ->assertSessionHas('success');
    }

    public function admin_authenticate()
    {
        $this->post('/login', [
            'email' => 'test@correo.com',
            'password' => 'password',
        ]);
    }
}
