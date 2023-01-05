<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::whereActive(1)
            ->get();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::whereActive(1 or 0)
            ->get();
        return view('upload.index', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'price' => 'required',
        'image' => 'required|image',
        'description' => 'required',
        'active' => 'required'
    ]);

    $product = new Product();
    $product->name = $request->input('name');
    $product->price = $request->input('price');
    $product->description = $request->input('description');
    $product->active = $request->input('active');

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = str_replace(' ', '_', $product->name) . '.' . $image->getClientOriginalExtension();
        $path = 
        $request->image->storeAs('productimage',$filename);
        $product->image = asset('storage/app/' . $path);
    }
    

    $product->save();

    return redirect()->route('products.index');
}




    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     *
     *     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
{
    $request->validate([
        'name' => 'required',
        'price' => 'required',
        'image' => 'nullable|image',
        'description' => 'required',
        'active' => 'required'
    ]);

    $product->name = $request->input('name');
    $product->price = $request->input('price');
    $product->description = $request->input('description');
    $product->active = $request->input('active');

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $path = $request->image->storeAs('productimage', $filename);
        $product->image = asset($path);
    }

    $product->save();

    return redirect()->route('products.index');
}



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
    $product = Product::findOrFail($id);
    $product->delete();

    return redirect()->route('products.index');
}

}


