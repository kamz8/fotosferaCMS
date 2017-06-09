<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Albums;
use App\Http\Requests\AlbumRequest;

use Illuminate\Support\Facades\Response;


class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.albums.show');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax()){
            $album = Albums::create($request->all());
            
            return $album;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        if ($request->ajax()){ 
            $album = Albums::findOrFail($id);
   
        }  
        return Response::json($album);        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->ajax()){ 
            $album = Albums::findOrFail($id);
            if($album){
                $album->update($request->all());
            }
                
        }  
        return Response::json($album);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        if ($request->ajax()){ 
            if(Albums::findOrFail($id))
                $album = Albums::destroy($id);
        }  
        return Response::json($album);
    }

      public function serch(Request $request)
      {
          if ($request->ajax()){
          
              $keyword = $request->keyword;
              
                  $albums = new Albums();
                  $serch_result = $albums->serch($keyword);
                  
                  if(count($serch_result)==0) return Response::json([
                      'success' => false,
                      'message' => 'Nie znaleziono szukanej frazy.'
                  ]);
                  return Response::json($serch_result);
                  
             
          }else    
           return false;
         
      }   
      
    public function jsonGet(Request $request)
    {
        if ($request->ajax()){
                $albums = Albums::with('photos')->get();
                
                if($albums->count() === 0) return Response::json([
                    'success' => true,
                    'message' => 'Nie utworzono jeszcze wpisu na blogu.'
                ],200);
                    return $albums->makeHidden('photos')->toJson();
                                  
        }else return '';        
    }      
}
