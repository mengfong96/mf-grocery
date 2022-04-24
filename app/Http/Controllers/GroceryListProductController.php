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
        $groceryLists = $user->groceryList->products ?? null;
        return view('grocerylist.index', compact('groceryLists'));
    }

    /**
     * Copy from yen's old proj
     * Ignore this
     * For reference purpose only
     */
    public function old()
    {
        $groceryLists = DB::table('grocerylist_products')
        ->join('grocerylists', 'grocerylist_products.grocerylist_id', '=' ,'grocerylists.id')
        ->get();
        return $groceryLists;
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
        $groceryListId = $user->groceryList->id ?? null;

        if(!$groceryListId) {
            GroceryList::create([
                'user_id'=>$user->id
            ]);

            $groceryListId = GroceryList::latest('id')->first()->id;
        }
        $groceryList = GroceryList::find($groceryListId);

        // how if user already got that product in grocery list
        // but adding it again in shopping list there?
        $groceryList->products()->attach(
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
}
