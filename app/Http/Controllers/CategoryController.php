<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\KeywordResource;
use App\Models\Category;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function index()
    {
        return Inertia::render('Categories/Index', [
            'categories' => new CategoryCollection(Category::paginate(20)),
        ]);
    }

    public function create()
    {
        return Inertia::render('Categories/Create');
    }

    public function store(StoreCategoryRequest $request)
    {
        Category::create($request->validated());

        return to_route('categories.index');
    }

    public function edit(Category $category)
    {
        return Inertia::render('Categories/Edit', [
            'category' => new CategoryResource($category),
        ]);
    }
//
    public function update(StoreCategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        return to_route('categories.index');
    }
//
//    public function delete(Category $category)
//    {
//        $category->delete();
//
//        return to_route('categories.index');
//    }
}
