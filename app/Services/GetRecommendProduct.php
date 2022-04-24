<?php

namespace App\Services;

class GetRecommendProduct {

    public function getProduct($productName){
        $path = storage_path('python\RecommendSimilarProduct.py');

        // change to array first
        // eg: Chicken breast
        $input = [
            'selected_product'=> $productName
        ];

        // make it as a json
        // purpose: to make sure data is passed to python completely
        // eg: {"selected_product":"Chicken breast"}
        $input = json_encode($input);

        info($input);
        die();
        $output = shell_exec(
            "python $path $input"
        );
        info('input;'.$productName);
        /**
         * Sample output:
            1         Chicken breast
            2     Chicken drumsticks
            3        Chicken carcass
            17         Diced chicken
            18                Salmon
            8                 Bhendi
            16          Curry powder
            15            Lemongrass
            13                Garlic
            9                Spinach
            Name: Product_Name, dtype: object
         */
        info($output);
        die();
        return (int) trim($output);
    }

}
