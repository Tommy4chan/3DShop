<?php

namespace App\Services;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductsService {
 
    public function store(ProductRequest $request)
    {
        $fileName = Str::uuid()->toString() . '.' . $request->image->extension();
        $request->image->storeAs('public/images', $fileName);
        
        $product = new Product();
        
        $product->title = $request->title;
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->image = $fileName;
        $product->price = $request->price;
        $product->is_active = $request->boolean('is_active');
        
        $product->save();
    }

    public function update(ProductRequest $request, Product $product)
    {
        $product->title = $request->title;
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        
        $product->price = $request->price;
        $product->is_active = $request->boolean('is_active');

        if($request->hasFile('image')){
            $fileName = Str::uuid()->toString() . '.' . $request->image->extension();
            $request->image->storeAs('public/images', $fileName);
            Storage::delete('public/images/' . $product->image);
            $product->image = $fileName;
        }

        $product->update();
    }

    public function destroy(Product $product)
    {
        //Storage::delete('public/images/' . $product->image);
        $product->delete();
    }
}