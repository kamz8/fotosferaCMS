<?php
namespace App\Http;
use Illuminate\Support\Facades\Request;
use Carbon\Carbon;

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
        $monthNames = ['Styczeń', 'Luty', 'Marzec', 'Kwiecień', 'Maj', 'Czerwiec', 'Lipiec', 'Sierpień', 'Wrzesień', 'Październik', 'Listopad', 'Grudzień'];
        $Mname = null;
        foreach ($monthNames as $i => $name) {
            if ($i+1 == $monthNumber) return $name;
        }
        
    }    
}

