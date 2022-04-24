<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\UserPreference;
use App\Services\GetRecommendProduct;
use App\Services\GetRecommendQuantity;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product /** this is product id*/)
    {
        $user = Auth::user()->id;

        // get product id
        $productId = $product->id;

        // get product name
        $productName = $product->name;

        // get user preference
        $preference = UserPreference::select('user_pax', 'meal_num')
        ->where('user_id', $user)
        ->first();

        // get recommended quantity
        $quantity = (new GetRecommendQuantity())->getQuantity(
            $preference->user_pax,
            $preference->meal_num,
            $productId
        );

        // get recommended product
        $productList = (new GetRecommendProduct())->getProduct(
            $productName
        );

        die();
        return view('product.show', [
            'product'=>$product,
            'quantity'=>$quantity
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
