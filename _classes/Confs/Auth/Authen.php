<?php 

namespace Confs\Auth;
use Confs\Router\HTTP;

class Authen
{
    static $loginUrl = "/admin/index.php";
        
    static function check(){
        session_start();
        if(!isset($_SESSION['auth']))
        {
            HTTP::redirect(static::$loginUrl);
        }
    }
}

