<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function index()
    {
        return Inertia::render('Categories/Index', [
            'categories' => CategoryResource::collection(Category::with('keyword')->get()),
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
//
//    public function edit(Category $category)
//    {
//        return view('categories.edit')->with('category', $category);
//    }
//
//    public function update(StoreCategoryRequest $request, Category $category)
//    {
//        $category->update($request->validated());
//
//        return to_route('categories.index');
//    }
//
//    public function delete(Category $category)
//    {
//        $category->delete();
//
//        return to_route('categories.index');
//    }
}
