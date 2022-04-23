<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function groceryList()
    {
        return $this->belongsToMany(
            GroceryList::class,
            'grocery_list_products',
            'product_id',
            'grocery_list_id'
        )->withPivot('quantity');
    }
}
