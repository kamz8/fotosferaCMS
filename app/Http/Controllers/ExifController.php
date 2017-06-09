<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Exif;

class ExifController extends Controller
{
    public function index (){
        Exif::exif(public_path('img/DSC_0703.jpg'));
        $image = Exif::get(['Model','ApertureFNumber', 'ExposureTime', 'ISOSpeedRatings', 'FocalLength', 'Lens']);
        return view('exif')->with('data',$image);

    }
}
