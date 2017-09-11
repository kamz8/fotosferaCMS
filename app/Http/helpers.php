<?php

use Illuminate\Support\Facades\Request;
use Carbon\Carbon;


if(!function_exists('is_active')){    
    function is_active($uri)
    {
        return Request::is($uri) ? ' class="active" ' : '';
    }    
}    

if(!function_exists('tagSize')){    
    function tagSize($count) {
        if($count > 1) return (1+(0.1 * $count));
            else return $count;
    }
}    
if(!function_exists('postImage')){
    function postImage($id) {
        return route('thumbinal',$id);
    }    
}

if(!function_exists('getMonthName')){
    function getMonthName($monthNumber)
    {
        $monthNames = ['Styczeń', 'Luty', 'Marzec', 'Kwiecień', 'Maj', 'Czerwiec', 'Lipiec', 'Sierpień', 'Wrzesień', 'Październik', 'Listopad', 'Grudzień'];
        foreach ($monthNames as $i => $name) {
            if ($i+1 == $monthNumber) return $name;
        }
        
    }    
}
/*
 * Cover image Helper 
 * @var $image_id need id of image
 * @return rute to cover image
 */
if(!function_exists('cover_image')){
    function cover_image($image_id){
        return route('cover', $image_id);
    }
}

if(!function_exists('thumbnail')){
    function thumbnail($image_id){
        return route('thumbnail', $image_id);
    }
}

if(!function_exists('string_to_math')){
function callback1($m) {
    return string_to_math($m[1]);
}
function callback2($n,$m) {
    $o=$m[0];
    $m[0]=' ';
    return $o=='+' ? $n+$m : ($o=='-' ? $n-$m : ($o=='*' ? $n*$m : $n/$m));
}
function string_to_math($s){ 
    while ($s != ($t = preg_replace_callback('/\(([^()]*)\)/','callback1',$s))) $s=$t;
    preg_match_all('![-+/*].*?[\d.]+!', "+$s", $m);
    return array_reduce($m[0], 'callback2');
}
}



if(!function_exists('ETime')){
    function ETime($exposure){
        $parts = explode("/", $exposure);
        return implode("/", array(1, $parts[1]/$parts[0]));        
    }
}