<?php

namespace App\Services;

class GetRecommendQuantity {

    public function getQuantity($userPax, $mealNum, $productId){
        $path = storage_path('python\RecommendQuantity.py');

        $output = shell_exec(
            "python $path $userPax $mealNum $productId"
        );

        return (int) trim($output);
    }

}
