<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\tax_category;

class tax_categoryApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_tax_category()
    {
        $taxCategory = tax_category::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/tax_categories', $taxCategory
        );

        $this->assertApiResponse($taxCategory);
    }

    /**
     * @test
     */
    public function test_read_tax_category()
    {
        $taxCategory = tax_category::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/tax_categories/'.$taxCategory->id
        );

        $this->assertApiResponse($taxCategory->toArray());
    }

    /**
     * @test
     */
    public function test_update_tax_category()
    {
        $taxCategory = tax_category::factory()->create();
        $editedtax_category = tax_category::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/tax_categories/'.$taxCategory->id,
            $editedtax_category
        );

        $this->assertApiResponse($editedtax_category);
    }

    /**
     * @test
     */
    public function test_delete_tax_category()
    {
        $taxCategory = tax_category::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/tax_categories/'.$taxCategory->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/tax_categories/'.$taxCategory->id
        );

        $this->response->assertStatus(404);
    }
}
