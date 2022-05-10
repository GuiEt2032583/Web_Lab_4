<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use App\Models\User;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ApiTest extends TestCase
{
    use DatabaseTransactions;

    public function test_register()
    {
        $response = $this->postJson('/api/register',[
            'name' => 'Rejean',
            'email' => 'rejean2@gmail.com',
            'password' => '12345',
            'password_confirmation' => '12345'
        ]);

        $response
            ->assertStatus(201)
            ->assertJson(fn (AssertableJson $json) =>
                $json->hasAll(['user', 'token'])
        );
    }

    public function test_login()
    {   
        $response = $this->postJson('/api/login', [
            'email' => 'etienne@gmail.com',
            'password' => '1234'
        ]);

        $response
            ->assertStatus(201)
            ->assertJson(fn (AssertableJson $json) =>
                $json->hasAll(['user', 'token'])
        );
    }

    public function test_get_produit_not_authorized()
    {
        $response = $this->getJson('/api/produits');
        $response
        ->assertStatus(401);
    }

    public function test_get_produit_authorized()
    {
        Sanctum::actingAs(User::factory()->create());

        $response = $this->getJson('/api/produits');
        $response->assertStatus(200)->assertJson(fn (AssertableJson $json) =>
        $json->has('allProducts')
        );
    }
}
