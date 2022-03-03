<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class UrlShortenFailTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->postJson('/url-shortener', [
            'real_url' => 'some string'
        ]);

        $response->assertJson(fn (AssertableJson $json) =>
            $json->has('error')
        );
    }
}
