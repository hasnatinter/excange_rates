<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_currency()
    {
        $response = $this->get('/api/products?currency=USD');
        $response->assertStatus(200);
    }

    public function test_wrong_currency()
    {
        $response = $this->get('/api/products?currency=nothng');
        $response->assertStatus(302);
    }

    public function test_euro_default()
    {
        $response = $this->get('/api/products');
        $this->assertEquals($response[0]['price'], $response[0]['currency_price']);
        $response->assertStatus(200);
    }
}
