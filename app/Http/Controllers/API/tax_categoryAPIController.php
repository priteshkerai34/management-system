<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createtax_categoryAPIRequest;
use App\Http\Requests\API\Updatetax_categoryAPIRequest;
use App\Models\tax_category;
use App\Repositories\tax_categoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class tax_categoryController
 * @package App\Http\Controllers\API
 */

class tax_categoryAPIController extends AppBaseController
{
    /** @var  tax_categoryRepository */
    private $taxCategoryRepository;

    public function __construct(tax_categoryRepository $taxCategoryRepo)
    {
        $this->taxCategoryRepository = $taxCategoryRepo;
    }

    /**
     * Display a listing of the tax_category.
     * GET|HEAD /taxCategories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $taxCategories = tax_category::get();

        return $this->sendResponse($taxCategories->toArray(), 'Tax Categories retrieved successfully');
    }

    /**
     * Store a newly created tax_category in storage.
     * POST /taxCategories
     *
     * @param Createtax_categoryAPIRequest $request
     *
     * @return Response
     */
    public function store(Createtax_categoryAPIRequest $request)
    {
        $input = $request->all();

        $taxCategory = $this->taxCategoryRepository->create($input);

        return $this->sendResponse($taxCategory->toArray(), 'Tax Category saved successfully');
    }

    /**
     * Display the specified tax_category.
     * GET|HEAD /taxCategories/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var tax_category $taxCategory */
        $taxCategory = $this->taxCategoryRepository->find($id);

        if (empty($taxCategory)) {
            return $this->sendError('Tax Category not found');
        }

        return $this->sendResponse($taxCategory->toArray(), 'Tax Category retrieved successfully');
    }

    /**
     * Update the specified tax_category in storage.
     * PUT/PATCH /taxCategories/{id}
     *
     * @param int $id
     * @param Updatetax_categoryAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updatetax_categoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var tax_category $taxCategory */
        $taxCategory = $this->taxCategoryRepository->find($id);

        if (empty($taxCategory)) {
            return $this->sendError('Tax Category not found');
        }

        $taxCategory = $this->taxCategoryRepository->update($input, $id);

        return $this->sendResponse($taxCategory->toArray(), 'tax_category updated successfully');
    }

    /**
     * Remove the specified tax_category from storage.
     * DELETE /taxCategories/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var tax_category $taxCategory */
        $taxCategory = $this->taxCategoryRepository->find($id);

        if (empty($taxCategory)) {
            return $this->sendError('Tax Category not found');
        }

        $taxCategory->delete();

        return $this->sendSuccess('Tax Category deleted successfully');
    }
}
