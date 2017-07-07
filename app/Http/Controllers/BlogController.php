<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use \App\Tag;
use Carbon\Carbon;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = new Post;
        $tag = new Tag;
        $posts = $post->where('published_at', '<=', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->paginate(config('settings.posts_per_page'));
        $archiveList = $post->archiveList();
        $tagList = $tag->with('post')->orderBy('created_at','desc')->get();
        return view('blog.home', compact('posts', 'archiveList','tagList'));
    }

    public function showPost($slug)
    {
        $post = Post::with('tag')->whereSlug($slug)->firstOrFail();
        $comments=[
            'closed'=>true,
            'count'=>0
            ];
        return view('blog.post')->with(compact('post','comments'));
    }  
    
    public function archive($year, $month) {
        $post = new Post;
        
        return $post->whereYear('published_at', '=',$year )
            ->WhereMonth('published_at', '=',$month)
            ->orderBy('published_at', 'desc')->get(); 
    }
    
    public function tag($tag) {
        return Tag::with('post')->where('name','=',$tag)->get();
    }
}
