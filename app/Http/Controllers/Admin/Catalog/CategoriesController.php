<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\CreateRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Shop\Category;
use App\Repositories\Shop\CategoriesRepository;
use App\Services\Shop\Catalog\CategoriesService;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * @var CategoriesRepository
     */
    private $categoriesRepository;

    /**
     * @var CategoriesService
     */
    private $categoriesService;

    public function __construct()
    {
        $this->categoriesRepository = app(CategoriesRepository::class);
        $this->categoriesService = app(CategoriesService::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categoriesRepository->getCategoriesAsTree();

        return view('admin.catalog.categories.index')->with([
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $parentCategories = $this->categoriesRepository
            ->getCategoriesAsTree();

        return view('admin.catalog.categories.create')->with([
            'parentCategories' => $parentCategories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateRequest $request)
    {
        $category = $this->categoriesService
            ->create($request);

        return redirect()->route('admin.categories.index')->with([
            'status' => "Category {$category->title} has been created"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $categoryChildren = $this->categoriesRepository
            ->getChildrenForCategoryAsTree($category);

        return view('admin.catalog.categories.show')->with([
            'category' => $category,
            'categoryChildren' => $categoryChildren
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Category $category)
    {
        $parentCategories = $this->categoriesRepository
            ->getCategoriesAsTree();

        return view('admin.catalog.categories.edit')->with([
            'category' => $category,
            'parentCategories' => $parentCategories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request, Category $category)
    {
        $result = $this->categoriesService
            ->update($category, $request);

        if ($result) {
            return redirect()->route('admin.categories.edit', ['category' => $category, 'parent_id' => $category->parent_id])->with([
                'status' => "Category {$category->title} has been updated"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $category)
    {
        $result = $this->categoriesService->delete($category);
;
        if ($result) {
            return redirect()->route('admin.categories.index')->with([
                'status-danger' => "Category {$category->title} has been deleted"
            ]);
        }
    }
}
