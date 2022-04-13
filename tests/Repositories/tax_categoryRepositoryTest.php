<?php namespace Tests\Repositories;

use App\Models\tax_category;
use App\Repositories\tax_categoryRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class tax_categoryRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var tax_categoryRepository
     */
    protected $taxCategoryRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->taxCategoryRepo = \App::make(tax_categoryRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_tax_category()
    {
        $taxCategory = tax_category::factory()->make()->toArray();

        $createdtax_category = $this->taxCategoryRepo->create($taxCategory);

        $createdtax_category = $createdtax_category->toArray();
        $this->assertArrayHasKey('id', $createdtax_category);
        $this->assertNotNull($createdtax_category['id'], 'Created tax_category must have id specified');
        $this->assertNotNull(tax_category::find($createdtax_category['id']), 'tax_category with given id must be in DB');
        $this->assertModelData($taxCategory, $createdtax_category);
    }

    /**
     * @test read
     */
    public function test_read_tax_category()
    {
        $taxCategory = tax_category::factory()->create();

        $dbtax_category = $this->taxCategoryRepo->find($taxCategory->id);

        $dbtax_category = $dbtax_category->toArray();
        $this->assertModelData($taxCategory->toArray(), $dbtax_category);
    }

    /**
     * @test update
     */
    public function test_update_tax_category()
    {
        $taxCategory = tax_category::factory()->create();
        $faketax_category = tax_category::factory()->make()->toArray();

        $updatedtax_category = $this->taxCategoryRepo->update($faketax_category, $taxCategory->id);

        $this->assertModelData($faketax_category, $updatedtax_category->toArray());
        $dbtax_category = $this->taxCategoryRepo->find($taxCategory->id);
        $this->assertModelData($faketax_category, $dbtax_category->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_tax_category()
    {
        $taxCategory = tax_category::factory()->create();

        $resp = $this->taxCategoryRepo->delete($taxCategory->id);

        $this->assertTrue($resp);
        $this->assertNull(tax_category::find($taxCategory->id), 'tax_category should not exist in DB');
    }
}
