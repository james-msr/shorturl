<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class UrlShortenTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->postJson('/url-shortener', [
            'real_url' => 'https://github.com/srclab/backend-test-task'
        ]);

        $response->assertJson(fn (AssertableJson $json) =>
            $json->has('short_url')
        );
    }
}
