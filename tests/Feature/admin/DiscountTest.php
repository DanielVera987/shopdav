<?php

namespace Tests\Feature\admin;

use Tests\TestCase;
use App\Models\Discount;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DiscountTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_admin_can_be_renderd_screen_list_discounts()
    {
        $this->admin_authenticate();

        $discount = Discount::factory()->create();
        $response = $this->get(route('admin.discounts.index'));

        $response->assertSee($discount->name)
            ->assertStatus(200);
    }

    public function test_admin_can_be_renderd_screen_create_new_discounts()
    {
        $this->admin_authenticate();

        $response = $this->get(route('admin.discounts.create'));
        $response->assertStatus(200)
            ->assertSee('Crear Nuevo Descuento');

    }

    public function test_admin_can_be_renderd_create_new_discounts()
    {
        $this->admin_authenticate();

        $response = $this->post(route('admin.discounts.store', [
            "name" => "New discount",
            "description" => "Desc description",
            "discount_percent" => 50,
            "active" => true
        ]));
        $response->assertStatus(302)
            ->assertSessionHas("success");

        $this->assertDatabaseHas('discounts',[
            "name" => "New discount",
            "description" => "Desc description",
            "discount_percent" => 50,
            "active" => true
        ]);
    }

    public function test_admin_can_be_renderd_edit_discounts()
    {
        $this->admin_authenticate();

        $discount = Discount::factory()->create();

        $response = $this->get(route('admin.discounts.edit', $discount->id));
        $response->assertStatus(200)
            ->assertSee('Actualizar Descuento');
    }

    public function test_admin_can_be_renderd_update_discounts()
    {
        $this->admin_authenticate();

        $discount = Discount::factory()->create();

        $response = $this->get(route('admin.discounts.update', $discount->id), [
            "name" => "New discount update",
            "description" => "Desc description",
            "discount_percent" => 50
        ]);

        $response->assertStatus(200)
            ->assertSee('Descuento actualizado');

        $this->assertDatabaseHas('discounts',[
            "name" => "New discount update",
        ]);
    }

    public function test_admin_can_be_renderd_delete_discounts()
    {
        $this->admin_authenticate();
        $discount = Discount::factory()->create();

        $response = $this->delete(route('admin.discounts.destroy', $discount->id));
        $response->assertStatus(302)
            ->assertSessionHas("success");

        $this->assertDatabaseMissing('discounts',[
            "name" => $discount->name,
        ]);
    }

    public function admin_authenticate()
    {
        $this->post('/login', [
            'email' => 'test@correo.com',
            'password' => 'password',
        ]);
    }
}
