<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Media;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Image;
use App\Http\Requests;

class FilesController extends Controller
{
//    protected function strToInt($x){
//          $x = explode('/',$image->exif($options));
//          if(count($x) !=1) $imageExif[] = (int)$x[0] / (int)$x[1];
//          else $imageExif[] = $options;
//       
//    }
    public function __construct() {
        ini_set('memory_limit','512M');
        
    }
    
    public function index(){
        return view('admin.files');
    }
    
    public function store(Request $request){
      
    if( $request->hasFile('droppedFiles') ) {
        $file = $request->file('droppedFiles');
        $mimetype = $file->getClientMimeType();
        $path = 'uploads/'.$file->getClientOriginalName();

        Storage::disk('public')->put($file->getClientOriginalName(), File::get($file));  

        $media = Media::firstOrCreate(['path'=>$path,'mimetype'=>$mimetype]);
                
        return Response::json([
                    'success' => true,
                    'message' => 'Dodano nowy plik!',
                    'path'=>asset($path),
                    'mimetype' => $mimetype,
                    'media_id' => $media->id
                ],200);        
    }  else return Response::json([
                    'success' => false,
                    'message' => 'Nie zapisano pliku!',

                ],500);            
                 
    }
    
   public function destroy($id, Request $request){
       
       if ($request->ajax()){ 
        $media = new Media();
        $fileInfo = $media->findOrFail($id);
         
        if(File::exists(public_path().'/'.$fileInfo->path)){
           File::delete(public_path().'/'.$fileInfo->path);  
           $media->destroy($id);
        
           return Response::json([
                    "success" => TRUE,
                    "message" => 'Usunięto plik!',               
           ],200);
        }
        
           return Response::json([
                    "success" => true,
                    "message" => 'coś poszło nie tak! ',
                    'log' => public_path().'/'.$fileInfo->path
           ],200);        
       }else return 'Brak dostępu'; 
        
   } 
   
   public function image($id) {
       $media = Media::findOrFail($id);
       $img = Image::cache(function($image) use ($media) {
          $image = $image->make($media->path);
       });

       return Response::make($img, 200, ['Content-Type'=>$media->mimetype])
               ->setMaxAge(604800) //seconds
               ->setPublic();
   }
   
    public function thumbnail($id) {
       $media = Media::findOrFail($id);
        $img = Image::cache(function($image) use ($media) {
           $image = $image->make($media->path);
           $image->fit(800, 600, function ($constraint) {
           $constraint->upsize();
        });            
        });       

        // create response and add encoded image data
       
       return Response::make($img, 200, ['Content-Type'=>$media->mimetype]);
   }  
   
    public function cover($id) {
       $media = Media::findOrFail($id);
        $imageCacheed = Image::cache(function($image) use($media) { 
           $image = $image->make($media->path); 
           $image->fit(400, 400, function ($constraint) {
           $constraint->upsize();
        });            
        });      

        // create response and add encoded image data
       
       return Response::make($imageCacheed, 200, ['Content-Type'=>$media->mimetype]);
   }

    public function exif($id) {
       $media = Media::findOrFail($id);
       $image = Image::make($media->path); 
       $ExifOptions = ['Model','FNumber', 'ExposureTime', 'ISOSpeedRatings', 'FocalLength'];
       $FNumber = "";
       $x = explode('/',$image->exif($image->exif('FNumber')));
       if(count($x)!=1) $FNumber = (string)((int)$x[0] / (int)$x[1]);
       
       $x = explode('/',$image->exif($image->exif('FocalLength')));
       $FocalLength = '';
       if(count($x)!=1) $FocalLength = (string)((int)$x[0] / (int)$x[1]).'mm';       
       
       $imageExif = [
        'Model' =>  $image->exif('Model'),
         'FNumber' => $FNumber,
        'ExposureTime'=> $image->exif('ExposureTime'),
        'ISO' => $image->exif('ISOSpeedRatings'),
        'FocalLength' => $FocalLength        
       ];

 

       return $imageExif;
   }   
}


