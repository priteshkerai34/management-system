<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\items;

class itemsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_items()
    {
        $items = items::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/items', $items
        );

        $this->assertApiResponse($items);
    }

    /**
     * @test
     */
    public function test_read_items()
    {
        $items = items::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/items/'.$items->id
        );

        $this->assertApiResponse($items->toArray());
    }

    /**
     * @test
     */
    public function test_update_items()
    {
        $items = items::factory()->create();
        $editeditems = items::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/items/'.$items->id,
            $editeditems
        );

        $this->assertApiResponse($editeditems);
    }

    /**
     * @test
     */
    public function test_delete_items()
    {
        $items = items::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/items/'.$items->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/items/'.$items->id
        );

        $this->response->assertStatus(404);
    }
}
