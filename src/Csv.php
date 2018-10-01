<?php
/**
 * Created by PhpStorm.
 * User: Stas
 * Date: 15.04.2017
 * Time: 23:58
 */

namespace successus\helpers;


class Csv
{
    /**
     * Парсить csv файл в список объектов или массивов данных
     * @param string $file -  content of csv file
     * @param string $delimiter
     * @return array
     */
    static function parse($file='', $delimiter=',')
    {
        $result = [];
        $rows = explode("\n", $file);

        $header = explode($delimiter,array_shift($rows));
        $countOfColums = count($header);
        foreach ($rows as $k=>$row){
            $values = explode($delimiter, $row);
            if($values){
                $result[] = Arrays::combine($header, $values);
            }
        }

        return $result;
    }

    static function saveRows($file, array $rows){
        $fp = fopen($file, 'w');
        foreach ($rows as $row){
            fputcsv($fp, $row);
        }
        fclose($fp);
    }

}