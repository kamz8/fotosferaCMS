<?php
namespace App\Http;
use Illuminate\Support\Facades\Request;

class Helpers {
    
    public static function is_active($uri)
    {
        return Request::is($uri) ? ' class="active" ' : '';
    }
    
    public static function tagSize($count) {
        if($count > 1) return (1+(0.1 * $count));
            else return $count;
    }

    public static function postImage($id) {
        return route('thumbinal',$id);
    }    
}

if(!function_exists('getMonthName')){
    function getMonthName($monthNumber)
    {
        return date("F", mktime(0, 0, 0, $monthNumber, 1));
    }    
}

