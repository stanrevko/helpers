<?php
/**
 * User: successus
 * Author: Stanislav Revko
 * Date: 15.04.2017
 * Time: 23:51
 */

namespace successus\helpers;


class Arrays
{
    /**
     * Creates an array by using one array for keys and another for its values
     * Example: print_r(array_combine(Array('a','a','b'), Array(1,2,3)));  Result: Array([a] => 2, [b] => 3)
     * @param $keys
     * @param $values
     * @return array
     */
    public static function combine(array $keys, array $values ){
        $res = [];
        foreach($keys as $i => $key){
            $res[$key] = isset($values[$i])? $values[$i] : null;
        }
        return $res;
    }

}