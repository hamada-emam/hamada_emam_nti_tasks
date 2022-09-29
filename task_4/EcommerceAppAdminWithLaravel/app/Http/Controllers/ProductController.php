<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Services\HasMedia;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $brands = Brand::select('id', 'name_en')->orderBy('name_en')->get();
        $subcategories = Subcategory::select('id', 'name_en')->orderBy('name_en')->get();
        return view('products.create', compact('brands', 'subcategories'));
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $brands = Brand::select('id', 'name_en')->orderBy('name_en')->get();
        $subcategories = Subcategory::select('id', 'name_en')->orderBy('name_en')->get();
        return view('products.edit', compact('product', 'brands', 'subcategories'));
    }

    public function store(StoreProductRequest $request)
    {
        $imageName = HasMedia::upload($request->file('image'), public_path('images\products'));
        $data = $request->except('_token', 'image');
        $data['image'] = $imageName;
        Product::create($data);
        return redirect()->route('dashboard.products.index')->with('success', 'Product Created Successfully');
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::findOrFail($id); // select
        $data = $request->except('_token', 'image', '_method');
        // if request has image => upload new image , delete old image
        if ($request->hasFile('image')) {
            $imageName = HasMedia::upload($request->file('image'), public_path('images\products'));
            HasMedia::delete(public_path("images\products\\{$product->image}"));
            $data['image'] = $imageName;
        }

        $product->update($data);
        // update data into db
        return redirect()->route('dashboard.products.index')->with('success', 'Product Updated Successfully');
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id); // select
        HasMedia::delete(public_path("images\products\\{$product->image}"));
        $product->delete();
        return redirect()->route('dashboard.products.index')->with('success', 'Product Deleted Successfully');
    }
}
