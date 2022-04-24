<?php

use App\Models\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Services\ReadCsvFile;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // only works for windows :(
        $path = storage_path('data\GroceryProductData.csv');

        $outputArr = (new ReadCsvFile())->getCsvData($path); //array

        array_shift($outputArr);

        foreach($outputArr as $value) {
            Product::create([
                'name' => trim($value[0]),
                'overview' => trim($value[1]),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
