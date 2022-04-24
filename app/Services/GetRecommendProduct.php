<?php

namespace App\Services;

class GetRecommendProduct {

    public function getProduct($productName){
        $path = storage_path('python\RecommendSimilarProduct.py');

        // change to array first
        // eg: Chicken breast
        $input = [
            '"selected_product"'=> '"'.$productName.'"'
        ];

        // make it as a json
        // purpose: to make sure data is passed to python completely
        // eg: {"selected_product":"Chicken breast"}
        $input = json_encode($input);

        /**
         * Sample output:
         * [
         *  "Chicken wings", "Chicken carcass", "Diced chicken",
         *  "Chicken drumsticks", "Potato", "Curry leaf",
         *  "Eggs", "Salmon", "Curry powder", "Onion"
         * ]
         */
        $output = shell_exec(
            "python $path $input"
        );

        // output is a json string, using json_decode will switch back to php array
        // or else just give me back empty array
        return json_decode($output) ?? [];
    }

}
