<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CartRepository;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartContent = (new CartRepository())->content();
        return response()->json([
            'cartContent' => $cartContent,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::where('id',$request->productId)->first();
        $count = (new CartRepository())->add($product);
        return response()->json([
            'count' => $count
        ]);
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
        (new CartRepository())->remove($id);
    }

    public function increase($id) {
        (new CartRepository())->increase($id);

    }

    public function decrease($id) {
        (new CartRepository())->decrease($id);

    }

    public function count()
    {
        $count = (new CartRepository())->count();
        return response()->json([
            'count' => $count
        ]);
    }
}
