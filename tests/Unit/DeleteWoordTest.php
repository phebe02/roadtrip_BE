<?php
namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Woord;
use Illuminate\Foundation\Testing\RefreshDatabase;

//Een bestaand woord correct kunt verwijderen.
class DeleteWoordTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_delete_a_woord()
    {
        $woord = Woord::factory()->create();

        $response = $this->delete('/api/woorden/' . $woord->id);

        $response->assertStatus(204);
        $this->assertDatabaseMissing('woorden', ['id' => $woord->id]);
    }
}
