<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Woord;
use Illuminate\Foundation\Testing\RefreshDatabase;

//Een nieuw woord correct kunt aanmaken.
class CreateWoordTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_woord()
    {
        $data = ['woord' => 'testwoord'];

        $response = $this->post('/api/woorden', $data);

        $response->assertStatus(201);
        $this->assertDatabaseHas('woorden', $data);
    }
}

