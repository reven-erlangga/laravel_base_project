<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StockOpnameRequest;
use App\Models\StockOpname;
use App\Models\Product;
use App\Models\Unit;
use App\Models\Brand;

class StockOpnameController extends Controller
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
        $units = Unit::all();
        $brands = Brand::all();
        
        $data = [
            'title' => $title,
            'all_product' => $products->count(),
            'all_unit' => $units->count(),
            'all_brand' => $brands->count(),
        ];

        return view('stock_opnames.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create Brands';
        $products = Product::all();
        
        $data = [
            'title' => $title,
            'action' => 'create',
            'products' => $products
        ];
        
        return view('stock_opnames.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StockOpnameRequest $request)
    {
        StockOpname::create($request->all());

        return redirect()->route('stock_opnames.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StockOpname  $stockOpname
     * @return \Illuminate\Http\Response
     */
    public function show(StockOpname $stockOpname)
    {
        $title = 'Show Brands';
        
        $data = [
            'title' => $title,
            'action' => 'show',
            'stock_opname' => $stockOpname
        ];
        
        return view('stock_opnames.form', $data);
    }
}
