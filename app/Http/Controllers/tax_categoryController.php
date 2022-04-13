<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createtax_categoryRequest;
use App\Http\Requests\Updatetax_categoryRequest;
use App\Repositories\tax_categoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class tax_categoryController extends AppBaseController
{
    /** @var tax_categoryRepository $taxCategoryRepository*/
    private $taxCategoryRepository;

    public function __construct(tax_categoryRepository $taxCategoryRepo)
    {
        $this->taxCategoryRepository = $taxCategoryRepo;
    }

    /**
     * Display a listing of the tax_category.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $taxCategories = $this->taxCategoryRepository->all();

        return view('tax_categories.index')
            ->with('taxCategories', $taxCategories);
    }

    /**
     * Show the form for creating a new tax_category.
     *
     * @return Response
     */
    public function create()
    {
        return view('tax_categories.create');
    }

    /**
     * Store a newly created tax_category in storage.
     *
     * @param Createtax_categoryRequest $request
     *
     * @return Response
     */
    public function store(Createtax_categoryRequest $request)
    {
        $input = $request->all();

        $taxCategory = $this->taxCategoryRepository->create($input);

        Flash::success('Tax Category saved successfully.');

        return redirect(route('taxCategories.index'));
    }

    /**
     * Display the specified tax_category.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $taxCategory = $this->taxCategoryRepository->find($id);

        if (empty($taxCategory)) {
            Flash::error('Tax Category not found');

            return redirect(route('taxCategories.index'));
        }

        return view('tax_categories.show')->with('taxCategory', $taxCategory);
    }

    /**
     * Show the form for editing the specified tax_category.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $taxCategory = $this->taxCategoryRepository->find($id);

        if (empty($taxCategory)) {
            Flash::error('Tax Category not found');

            return redirect(route('taxCategories.index'));
        }

        return view('tax_categories.edit')->with('taxCategory', $taxCategory);
    }

    /**
     * Update the specified tax_category in storage.
     *
     * @param int $id
     * @param Updatetax_categoryRequest $request
     *
     * @return Response
     */
    public function update($id, Updatetax_categoryRequest $request)
    {
        $taxCategory = $this->taxCategoryRepository->find($id);

        if (empty($taxCategory)) {
            Flash::error('Tax Category not found');

            return redirect(route('taxCategories.index'));
        }

        $taxCategory = $this->taxCategoryRepository->update($request->all(), $id);

        Flash::success('Tax Category updated successfully.');

        return redirect(route('taxCategories.index'));
    }

    /**
     * Remove the specified tax_category from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $taxCategory = $this->taxCategoryRepository->find($id);

        if (empty($taxCategory)) {
            Flash::error('Tax Category not found');

            return redirect(route('taxCategories.index'));
        }

        $this->taxCategoryRepository->delete($id);

        Flash::success('Tax Category deleted successfully.');

        return redirect(route('taxCategories.index'));
    }
}
