<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroceryList extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function products(){
        return $this->belongsToMany(
            Product::class,
            'grocery_list_products',
            'grocery_list_id',
            'product_id'
        )->withPivot('quantity');
    }

    /**
     * This one no need also can
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
