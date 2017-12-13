<?php
/**
 * Created by PhpStorm.
 * User: Stas
 * Date: 08.12.2017
 * Time: 19:46
 */

namespace successus\helpers;


class UrlFile
{

    public static function getContent($url, array $postdata = array()){

        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($postdata),
            )
        );

        $context  = stream_context_create($options);

        return file_get_contents($url, false, $context);
    }

}