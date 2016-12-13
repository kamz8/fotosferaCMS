<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
      
// if( $request->hasFile('droppedFiles') ) {
        $file = $request->file('droppedFiles');
        $extension = $file->getClientOriginalExtension();
        $path = $file->move(public_path().'/upload/',$file->getClientOriginalName());
        //Storage::disk('local')->put($file->getClientOriginalName(), file_get_contents($file));  
        return Response::json([
                    'success' => true,
                    'message' => 'Dodano nowy plik!',
                    'path'=>asset('upload/'.$file->getClientOriginalName())
                ],200);        
//    }  else return Response::json([
//                    'success' => false,
//                    'message' => 'Nie zapisano pliku!',
//
//                ],500);            
       
        
                      
    }
}
