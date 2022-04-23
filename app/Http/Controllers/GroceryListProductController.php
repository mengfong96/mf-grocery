<?php

namespace App\Http\Controllers;

use App\Models\GroceryList;
use App\Models\GroceryListProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroceryListProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $lists = $user->groceryList->products; //eloquent
        return view('grocerylist.index', compact('lists'));
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
        $validated = $request->validate([
            'quantity' => 'required',
            'product_id' => 'required',
        ]);

        $user = $request->user();
        $groceryListId = $user->groceryList->id;

        $list = GroceryList::find($groceryListId);
        $list->products()->attach(
            $validated['product_id'],
            [
                'quantity'=>$validated['quantity']
            ]
        );

        return redirect(route('grocery-lists.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GroceryListProduct  $groceryListProduct
     * @return \Illuminate\Http\Response
     */
    public function show(GroceryListProduct $groceryListProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GroceryListProduct  $groceryListProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(GroceryListProduct $groceryListProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GroceryListProduct  $groceryListProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GroceryListProduct $groceryListProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GroceryListProduct  $groceryListProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(GroceryListProduct $groceryListProduct)
    {
        //
    }
}
