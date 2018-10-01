<?php

namespace successus\helpers;

class Helper{
    /**
    * удаляет переносы
    */
    public static function mtrim($str) {
        return preg_replace("/(^\s|\s$)/mu", "", $str);
    }
}
