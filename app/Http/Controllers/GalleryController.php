<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Albums;
use App\Photos;
use Image;
class GalleryController extends Controller
{
    /*****
     * Show idndex page of gallery
     * list all albums
     * 
     * return view('blog.gallery')->with($gallery)
     */
    function index() {
        $albums = Albums::all();
        $albums->makeHidden(['photos']);
        
        return $albums;
    }
    
    function showAlbum($id) {
        $album = Albums::with('photos')->findOrFail($id);
        $album->makeHidden('cover_img');
        
        return $album;
    } 

    function showPhoto($album_id,$photo_id) {
        $photos = new Photos;
        $photo = $photos->findOrFail($photo_id);
        $image = Image::make($photo->media->path);
        $imageExif = [
            'Model' =>  $image->exif('Model'),
             'FNumber' => $image->exif('FNumber'),
            'ExposureTime'=> $image->exif('ExposureTime'),
            'ISO' => $image->exif('ISOSpeedRatings'),
            'FocalLength' => $image->exif('FocalLength'),       
       ];
        $photo->exif = $imageExif;
        return $photo;
    }    
}
