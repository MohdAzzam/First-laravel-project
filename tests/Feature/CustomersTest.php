<?php

namespace Tests\Feature;

use App\Customer;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class CustomersTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        Event::fake();
    }

    /** @test */
    public function OnlyLoggedUserSeeCustomerList()
    {
        $response = $this->get('/customers')
            ->assertRedirect('/login');
    }

    /** @test */
    public function authenticatedUserCanSeeCustomerList()
    {
        $this->actingAs(factory(User::class)->create());
        $response = $this->get('/customers')
            ->assertOk();
    }

    /** @test */
    public function aCustomerCanBeAddedThroughTheForm()
    {
        //$this->withoutExceptionHandling();
        $this->actingAsAdmin();
        $response = $this->post('/customers', $this->data());
        $this->assertCount(1, Customer::all());
    }

    /** @test */
    public function aNameIsAtLeast3Char()
    {
        //$this->withoutExceptionHandling();
        $this->actingAsAdmin();
        $response = $this->post('/customers', array_merge($this->data(), ['name' => 'ab']));
        $response->assertSessionHasErrors('name');
        $this->assertCount(0, Customer::all());


    }

    private function data()
    {
        return [
            'name' => 'user',
            'email' => 'a@a.c',
            'phoneNumber' => '0791212120',
            'active' => 'active',
            'company_id' => 1,

        ];
    }

    /** @test */
    public function aNameIsRequired()
    {
        //$this->withoutExceptionHandling();
        $this->actingAsAdmin();
        $response = $this->post('/customers', array_merge($this->data(), ['name' => '']));
        $response->assertSessionHasErrors('name');
        $this->assertCount(0, Customer::all());


    }
    /** @test */
    public function aEmailIsRequired()
    {
        //$this->withoutExceptionHandling();
        $this->actingAsAdmin();
        $response = $this->post('/customers', array_merge($this->data(), ['email' => '']));
        $response->assertSessionHasErrors('email');
        $this->assertCount(0, Customer::all());


    }

    /** @test */
    public function aValidEmailIsRequired()
    {
        //$this->withoutExceptionHandling();
        $this->actingAsAdmin();
        $response = $this->post('/customers', array_merge($this->data(), ['email' => 'tesetrerer']));
        $response->assertSessionHasErrors('email');
        $this->assertCount(0, Customer::all());


    }


    private function actingAsAdmin()
    {
        $this->actingAs(factory(User::class)->create([
            'email' => 'admin@admin.com',
        ]));
    }

}
