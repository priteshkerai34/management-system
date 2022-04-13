<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateitemsAPIRequest;
use App\Http\Requests\API\UpdateitemsAPIRequest;
use App\Models\items;
use App\Repositories\itemsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class itemsController
 * @package App\Http\Controllers\API
 */

class itemsAPIController extends AppBaseController
{
    /** @var  itemsRepository */
    private $itemsRepository;

    public function __construct(itemsRepository $itemsRepo)
    {
        $this->itemsRepository = $itemsRepo;
    }

    /**
     * Display a listing of the items.
     * GET|HEAD /items
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $items = $this->itemsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($items->toArray(), 'Items retrieved successfully');
    }

    /**
     * Store a newly created items in storage.
     * POST /items
     *
     * @param CreateitemsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateitemsAPIRequest $request)
    {
        $input = $request->all();

        $items = $this->itemsRepository->create($input);

        return $this->sendResponse($items->toArray(), 'Items saved successfully');
    }

    /**
     * Display the specified items.
     * GET|HEAD /items/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var items $items */
        $items = $this->itemsRepository->find($id);

        if (empty($items)) {
            return $this->sendError('Items not found');
        }

        return $this->sendResponse($items->toArray(), 'Items retrieved successfully');
    }

    /**
     * Update the specified items in storage.
     * PUT/PATCH /items/{id}
     *
     * @param int $id
     * @param UpdateitemsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateitemsAPIRequest $request)
    {
        $input = $request->all();

        /** @var items $items */
        $items = $this->itemsRepository->find($id);

        if (empty($items)) {
            return $this->sendError('Items not found');
        }

        $items = $this->itemsRepository->update($input, $id);

        return $this->sendResponse($items->toArray(), 'items updated successfully');
    }

    /**
     * Remove the specified items from storage.
     * DELETE /items/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var items $items */
        $items = $this->itemsRepository->find($id);

        if (empty($items)) {
            return $this->sendError('Items not found');
        }

        $items->delete();

        return $this->sendSuccess('Items deleted successfully');
    }
}
