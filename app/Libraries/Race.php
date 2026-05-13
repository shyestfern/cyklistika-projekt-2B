<?php

namespace App\Libraries;

class Race {

public function __construct()
{
    
}
/**
 * @param array $races - všechny závody, které chci zobrazit
 * @param string $column - sloupec v tabulce, kterou joinuji
 */
public function getRaces($races, $column){

    $result = [];
    foreach($races as $row){
        $id = $row->$column;
        if(!in_array($id, $result)){
         
            $result[] = $id;
        }
    }

    return $result;
}



}