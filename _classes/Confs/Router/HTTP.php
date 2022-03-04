<?php 

namespace Confs\Router;

class HTTP 
{
    static $base = "http://localhost:8000/store";

    static function redirect($path, $query = ""){
        $url = static::$base . $path;
        if($query) $url .= "?$query";

        header("location:$url");
        exit();
    }
}