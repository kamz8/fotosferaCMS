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
        $Mname = null;
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