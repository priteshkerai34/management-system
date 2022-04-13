<?php namespace Tests\Repositories;

use App\Models\items;
use App\Repositories\itemsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class itemsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var itemsRepository
     */
    protected $itemsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->itemsRepo = \App::make(itemsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_items()
    {
        $items = items::factory()->make()->toArray();

        $createditems = $this->itemsRepo->create($items);

        $createditems = $createditems->toArray();
        $this->assertArrayHasKey('id', $createditems);
        $this->assertNotNull($createditems['id'], 'Created items must have id specified');
        $this->assertNotNull(items::find($createditems['id']), 'items with given id must be in DB');
        $this->assertModelData($items, $createditems);
    }

    /**
     * @test read
     */
    public function test_read_items()
    {
        $items = items::factory()->create();

        $dbitems = $this->itemsRepo->find($items->id);

        $dbitems = $dbitems->toArray();
        $this->assertModelData($items->toArray(), $dbitems);
    }

    /**
     * @test update
     */
    public function test_update_items()
    {
        $items = items::factory()->create();
        $fakeitems = items::factory()->make()->toArray();

        $updateditems = $this->itemsRepo->update($fakeitems, $items->id);

        $this->assertModelData($fakeitems, $updateditems->toArray());
        $dbitems = $this->itemsRepo->find($items->id);
        $this->assertModelData($fakeitems, $dbitems->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_items()
    {
        $items = items::factory()->create();

        $resp = $this->itemsRepo->delete($items->id);

        $this->assertTrue($resp);
        $this->assertNull(items::find($items->id), 'items should not exist in DB');
    }
}
