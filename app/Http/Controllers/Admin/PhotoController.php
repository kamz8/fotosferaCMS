<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Photos;
use App\Media;
use App\Albums;
use App\Http\Requests\PhotoRequest;

use Auth;
use Validator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Response;
use Illuminate\Foundation\Validation\ValidatesRequests;

class PhotoController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        return view('admin.photos.show');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $albums = Albums::pluck('title','id');
        return view('admin.photos.create')->with('albums',$albums);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhotoRequest $request)
    {
        $album = Albums::find($request->album_id);
        $photo = new Photos($request->all());
        Auth::user()->photos()->save($photo);
        $album->photos()->save($photo);
        return redirect('admin/photos/create');
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
    public function edit($id,Request $request)
    {
        if ($request->ajax()){ 
            $photos = Photos::find($id);
            $albums = Albums::pluck('title','id');
        }  
        return Response::json(
        [

            'photos'=> $photos,
            'albums' => $albums
        ],
        200
    );        
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
            $photos = Photos::findOrFail($id);
            $album = Albums::find($request->album_id);
            if($photos){
                $photos->update($request->all());
                $photos->albums()->associate($album);
                $photos->save();
            }
                
        }  
        return Response::json($photos);
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
            if(Photos::findOrFail($id))
                $photo = Photos::destroy($id);
        }  
        return Response::json($photo);
    }

    public function jsonGet(Request $request)
    {
        if ($request->ajax()){
                $photos = Photos::with('albums','media')->get();
                
                if($photos->count() === 0) return Response::json([
                    'success' => true,
                    'message' => 'Nie dodano tu jeszcze nic...'
                ],200);
                    return $photos;
                                  
        }else return '';        
    }     
}
