<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Unit;
use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Master Brand';
        $products = Product::all();
        $categories = Category::all();
        $units = Unit::all();
        $brands = Brand::all();
        
        $data = [
            'title' => $title,
            'all_product' => $products->count(),
            'all_category' => $categories->count(),
            'all_unit' => $units->count(),
            'all_brand' => $brands->count(),
        ];

        return view('brands.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create Brands';
        
        $data = [
            'title' => $title,
            'action' => 'create',
        ];
        
        return view('brands.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
        Brand::create($request->all());

        return redirect()->route('brands.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        $title = 'Show Brands';
        
        $data = [
            'title' => $title,
            'action' => 'show',
            'brand' => $brand,
        ];
        
        return view('brands.form', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        $title = 'Edit Brands';
        
        $data = [
            'title' => $title,
            'action' => 'edit',
            'brand' => $brand,
        ];
        
        return view('brands.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request, Brand $brand)
    {
        $brand->update($request->all());
        
        return redirect()->route('brands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        
        return redirect()->route('brands.index');
    }
}
