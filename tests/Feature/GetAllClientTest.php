<?php


namespace Tests\Feature;

use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetAllClientTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function return_all_clients()
    {
        $this->withoutExceptionHandling();

        Client::factory()->count(3)->create();

        $this->assertCount(3, Client::all());

        $this->json('GET', '/api/client')
            ->assertStatus(200)
            ->assertJson(["data" => []]);
    }

}
