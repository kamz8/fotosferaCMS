<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Albums;
use App\Photos;
use Image;
use Carbon\Carbon;
class GalleryController extends Controller
{
    protected $placeholder;


    public function __construct() {
        ini_set('memory_limit','512M');
        $this->placeholder = storage_path('app/public/default-placeholder.png');
    }    
    /*****
     * Show idndex page of gallery
     * list all albums
     * 
     * return view('blog.gallery')->with($gallery)
     */
    function index() {
        $albums = Albums::all();
        $albums->makeHidden(['photos']);
        
        return view('blog.gallery')->with('albums',$albums);
    }
    
    function showAlbum($id) {
        $album = Albums::with('photos')->findOrFail($id);
        $album->makeHidden('cover_img');
        
        return view('blog.album')->with('album',$album);
    } 

    function showPhoto($photo_id) {
        $photos = new Photos;
        $photo = $photos->findOrFail($photo_id);
        
        $image = Image::make($photo->media->path);
        
        $imageExif = [
            'Model' =>  $image->exif('Model'),
            'FNumber' => "f/".string_to_math($image->exif('FNumber')),
            'ExposureTime'=> ETime($image->exif('ExposureTime'))." s",
            'ISO' => 'ISO '.$image->exif('ISOSpeedRatings'),
            'FocalLength' => string_to_math($image->exif('FocalLength'))." mm",       
       ];
        $photo->user_name = $photo->user->name;
        $photo->published_at = $photo->created_at->diffForHumans();
        $photo->exif = $imageExif;
        $photo->makeHidden('updated_at')
                ->makeHidden('media')
                ->makeHidden('user');
        
        return $photo;
    }    
}
