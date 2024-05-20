<?php

namespace App\Http\Controllers;

use App\Models\variants;
use App\Models\products;
use Illuminate\Http\Request;

class VariantsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Products $product)
    {
        $variant = $product->variants;
        return view('variants.index', compact('product', 'variant'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Products $product)
    {
        return view('variants.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Products $product)
    {
        $variant = new Variants ($request->all());
        $product->variants()->save($variant);
        $product->updateStock();
        
        return redirect()->route('products.index', $product->id)->with('success', 'Variant created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Variants $variant)
    {
        return view('variants.show', compact('variant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Variants $variant)
    {
        return view('variants.edit', compact('variant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, variants $variant)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0'
        ]);

        $variant->update($request->all());

        return redirect()->route('products.variants.index', $variant->product_id)
                         ->with('success', 'Variant updated successfully.');
        
    }

    public function updateStock(Request $request, Variants $variant)
    {
        $request->validate([
            'stock' => 'required|integer|min:0',
        ]);

        $variant->stock = $request->stock;
        $variant->save();

        //update stock product
        $product = $variant->products;
        $product->stock = $product->variants->sum('stock');
        $product->save();

        return redirect()->route('products.variants.index', $product->id)->with('success', 'Stock update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Variants $variant)
    {
        $product = $variant->products;
        
        $variant->delete();
        $product->updateStock();

        return redirect()->route('products.variants.index', $product->id)
            ->with('success', 'Variant deleted successfully');
    }
}
