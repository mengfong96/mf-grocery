<?php

namespace App\Services;

class ReadCsvFile {

    public function getCsvData($path) {
        $result = [];

        if(
            ($open = fopen($path, "r")) !== FALSE
        ) {
            while(
                ($data = fgetcsv($open)) !== FALSE
            ) {
                $result[] = $data;
            }

            fclose($open);
        }

        return $result;

    }

}



