<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Services\ProductsService;
use Illuminate\Http\Request;
use App\Services\UtilsService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    private UtilsService $utilsService;
    private ProductsService $productsService;
 
    public function __construct(UtilsService $utilsService, ProductsService $productsService)
    {
        $this->utilsService = $utilsService;
        $this->productsService = $productsService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(10);

        return view('admin.product.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $this->productsService->store($request);

        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = $this->utilsService->isProductExistOrActive($id, 'На жаль цей продукт не існує');

        return view('product')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = $this->utilsService->isProductExistOrActive($id, 'На жаль цей продукт не існує');

        return view('admin.product.form')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $this->productsService->update($request, $product);

        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $this->productsService->destroy($product);

        return redirect()->route('admin.product.index');
    }
}
