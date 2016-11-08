<?php
namespace App\Http;
use Illuminate\Support\Facades\Request;

class Helpers {
    
    public static function is_active($uri)
    {
        return Request::is($uri) ? ' class="active" ' : '';
    }
}


