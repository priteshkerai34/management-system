<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateitemsRequest;
use App\Http\Requests\UpdateitemsRequest;
use App\Repositories\itemsRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\category;
use App\Models\item_images;
use App\Models\itemactivity;
use App\Models\tax_category;
use Illuminate\Http\Request;
use Flash;
use Response;
use Illuminate\Support\Carbon;

class itemsController extends AppBaseController
{
    /** @var itemsRepository $itemsRepository*/
    private $itemsRepository;

    public function __construct(itemsRepository $itemsRepo)
    {
        $this->itemsRepository = $itemsRepo;
    }

    /**
     * Display a listing of the items.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $items = $this->itemsRepository->all();

        return view('items.index')
            ->with('items', $items);
    }

    /**
     * Show the form for creating a new items.
     *
     * @return Response
     */
    public function create()
    {
        $category = category::pluck('name','id');
        $tax_category = tax_category::pluck('name','id');
        return view('items.create', compact('category','tax_category'));
    }

    /**
     * Store a newly created items in storage.
     *
     * @param CreateitemsRequest $request
     *
     * @return Response
     */
    public function store(CreateitemsRequest $request)
    {
        $input = $request->all();

        $items = $this->itemsRepository->create($input);

        foreach($input['images'] as $images) {
            $image = new item_images;
            $image->images = $images;
            $image->item_id = $items->id;
            $image->save();
        }
        
        Flash::success('Items saved successfully.');

        return redirect(route('items.index'));
    }

    /**
     * Display the specified items.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $items = $this->itemsRepository->find($id);

        if (empty($items)) {
            Flash::error('Items not found');

            return redirect(route('items.index'));
        }

        return view('items.show')->with('items', $items);
    }

    /**
     * Show the form for editing the specified items.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $items = $this->itemsRepository->find($id);

        $category = category::pluck('name','id');
        $tax_category = tax_category::pluck('name','id');

        if (empty($items)) {
            Flash::error('Items not found');

            return redirect(route('items.index'));
        }

        return view('items.edit',compact('category','tax_category'))->with('items', $items);
    }

    /**
     * Update the specified items in storage.
     *
     * @param int $id
     * @param UpdateitemsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateitemsRequest $request)
    {
        $items = $this->itemsRepository->find($id);

        if (empty($items)) {
            Flash::error('Items not found');

            return redirect(route('items.index'));
        }

        $items = $this->itemsRepository->update($request->all(), $id);

        Flash::success('Items updated successfully.');

        return redirect(route('items.index'));
    }

    /**
     * Remove the specified items from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $items = $this->itemsRepository->find($id);

        if (empty($items)) {
            Flash::error('Items not found');

            return redirect(route('items.index'));
        }

        $this->itemsRepository->delete($id);

        Flash::success('Items deleted successfully.');

        return redirect(route('items.index'));
    }
}
