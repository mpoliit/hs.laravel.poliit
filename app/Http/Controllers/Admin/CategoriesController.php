<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\Image;
use App\Services\Contract\ImageServicesInterface;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(5);

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/categories/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateCategoryRequest  $request
     * @param  \App\Http\Models\Category  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request, Category $category)
    {
        $newCategory = $category->create([
            'title' => $request->get('title'),
            'description' => $request->get('description')
        ]);

        if(!empty($request->file('image'))){
            $imageService = app()->make(ImageServicesInterface::class);
            $filePath = $imageService->upload($request->file('image'));
            $newCategory->image()->create(['path' => $filePath]);
        }

        return redirect(route('admin.categories.index'))->with(['status' => 'The category has been create!']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update([
            'title'         => $request->get('title'),
            'description'   => $request->get('description')
        ]);

        return redirect(route('admin.categories.index'))->with(['status' => 'The category was successfuly update!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Category $category)
    {
        $category->delete();

        return redirect(route('admin.categories.index'))->with(['status' => 'The category was successfuly delete!']);
    }
}
