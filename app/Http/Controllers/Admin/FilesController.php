<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Media;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use App\Http\Requests;

class FilesController extends Controller
{
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
    
   public function destroy($id){
        
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
        
        
   } 
   
   public function image($id) {
       $image = Media::findOrFail($id);
       $file = File::get($image->path);
       $response = Response::make($file, 200);
       $response->header('Content-Type', $image->mimetype);
       return $response;
   }
}
