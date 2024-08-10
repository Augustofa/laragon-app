<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateCategoryRequest;
use App\Models\Category;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Category $category)
    {
        $categories = $category->all();
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateCategoryRequest $request)
    {
        // Cria um nova categoria
        $pd = Category::create($request->validated());
        // Redireciona para a página de categoria
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find((int)$id);
        if(!isset($category)){
            return back();
        }

        return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find((int)$id);
        if(!isset($category)){
            return back();
        }

        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateCategoryRequest $request, string $id)
    {
        $category = Category::find((int)$id);
        if(!isset($category)){
            return back();
        }
       
        //$product->name = $request->name;
        //$product->save();
        $category->update($request->validated());
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find((int)$id);
        if(!isset($category)){
            return back();
        }

        $category->delete();
        return redirect()->route('category.index');
    }
}
