<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\Media;
use App\Tag;
use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdatePostRequest;

use Auth;
use Validator;
use Purifier;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Response;
use Illuminate\Foundation\Validation\ValidatesRequests;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.posts.show');
    }

    public function jsonGet(Request $request)
    {
        if ($request->ajax()){
                $posts = Post::with('user','tag')->get();
                
                if($posts->count() === 0) return Response::json([
                    'success' => true,
                    'message' => 'Nie utworzono jeszcze wpisu na blogu.'
                ],200);
                    return $posts->toJson();
                                  
        }else return '';        
    }    

    
            /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = new Post($request->all());
        $post->content = Purifier::clean($request->get('content') );
        $tags = new Tag;
        $tagNames = explode(',', $request->tags);
        Auth::user()->post()->save($post);
        $tagIds = $tags->addList($tagNames);
        
        $post->tag()->attach($tagIds);
        
        return redirect('admin/posts/create');
        
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
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        
        return view('admin.posts.edit')->with(['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $tags = new Tag;
        $tagNames = explode(',', $request->tags);
        $tagsIds = $tags->addList($tagNames);
        $request->replace(['content', Purifier::clean($request->input('content') ) ]);
        $post->update($request->all());
        $post->tag()->sync($tagsIds);
        
        return redirect('admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        if ($request->ajax()){ 
            if(Post::findOrFail($id))
                $post = Post::destroy($id);
        }  
        return Response::json($post);
    }
    
      public function serch(Request $request)
      {
          if ($request->ajax()){
          
              $keyword = $request->keyword;
              
                  $post = new Post();
                  $serch_result = $post->serch($keyword);
                  
                  if(count($serch_result)==0) return Response::json([
                      'success' => false,
                      'message' => 'Nie znaleziono szukanej frazy.'
                  ]);
                  return Response::json($serch_result);
                  
             
          }else    
           return false;
         
      }
}
