<?php
namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Woord;
use Illuminate\Foundation\Testing\RefreshDatabase;

//kan je alle woorden correct ophalen?
class WoordTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_retrieve_all_woorden()
    {
        Woord::factory()->count(3)->create();

        $response = $this->get('/api/woorden');

        $response->assertStatus(200);
        $response->assertJsonCount(3);
    }
}
