<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

class UrlServiceTest extends TestCase
{
    protected $urlService;

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testEncode()
    {
        $url = 'https://example.com';
        $response = $this->postJson(route('url.encode'), ['url' => $url]);

        $response->assertStatus(200);
        $encodedUrl = $response->json('encoded_url');

        $this->assertNotEmpty($encodedUrl);
        $this->assertEquals($url, Cache::get($encodedUrl));
    }

    public function testEncodeInvalidUrl()
    {
        $response = $this->postJson(route('url.encode'), ['url' => 'invalid']);

        $response->assertStatus(422);
        $this->assertNull($response->json('encoded_url'));
    }

    public function testDecode()
    {
        $url = 'https://example.com';
        $encodedUrl = $this->postJson(route('url.encode'), ['url' => $url])->json('encoded_url');
        $response = $this->postJson(route('url.decode'), ['url' => $encodedUrl]);

        $response->assertStatus(200);
        $decodedUrl = $response->json('decoded_url');

        $this->assertEquals($url, $decodedUrl);
    }

    public function testDecodeInvalidUrl()
    {
        $response = $this->postJson(route('url.decode'), ['encoded_url' => 'invalid']);

        $response->assertStatus(404);
        $this->assertNull($response->json('url'));
    }
}
