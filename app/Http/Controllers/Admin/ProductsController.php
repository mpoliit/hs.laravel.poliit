<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Services\Contract\ImageServicesInterface;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = Product::with('category')->paginate(5);

        return view('admin/products/index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->toArray();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateProductRequest $request
     * @return void
     */
    public function store(CreateProductRequest $request)
    {
        $product = $request->all();
        unset($product['product_images']);
        unset($product['thumbnail']);
        unset($product['_token']);

        if(!empty($request->file('thumbnail'))){
            $imageService   = app()->make(ImageServicesInterface::class);
            $filePath       = $imageService->upload($request->file('thumbnail'));
            $product['thumbnail'] = $filePath;
        }
        $product = Product::create($product);

        if(!empty($request->file('product_images'))){
            foreach ($request->file('product_images') as $image){
                $filePath       = $imageService->upload($image);
                $product->image()->create(['path' => $filePath]);
            }
        }

        return redirect(route('admin.products.index'))->with(['status' => 'The product has been create!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all()->toArray();
        $images = $product->image;
        return view('admin.products.edit', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
