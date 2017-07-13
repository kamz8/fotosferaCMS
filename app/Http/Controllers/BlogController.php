<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use \App\Tag;
use Carbon\Carbon;
use SEO;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        SEO::setTitle('Strona główna');

        SEO::setDescription(config('settings.site_name'));
        SEO::opengraph()->setUrl('http://fotosfera.org.pl');
        
        $post = new Post;
        $tag = new Tag;
        $posts = $post->where('published_at', '<=', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->paginate(config('settings.posts_per_page'));
        $archiveList = $post->archiveList();
        $tagList = $tag->with('post')->get()
        ->sortByDesc(function($tag){
            return $tag->post->count();
        })->take(20);
        return view('blog.home', compact('posts', 'archiveList','tagList'));
    }

    public function showPost($slug)
    {
        

        SEO::setDescription(config('settings.site_name'));
        SEO::opengraph()->setUrl('http://fotosfera.org.pl');
        
        $post = Post::with('tag')->whereSlug($slug)->firstOrFail();
        $comments=[
            'closed'=>true,
            'count'=>0
            ];
        
        SEO::setTitle($post->title);
        return view('blog.post')->with(compact('post','comments'));
    }  
    
    public function archive($year, $month) {
        $post = new Post;
        
        $archive = new \Illuminate\Support\Collection;
        $archive->title = getMonthName($month).' '.(string)$year;
        $archive->post = $post->whereYear('published_at', '=',$year )
            ->WhereMonth('published_at', '=',$month)
            ->orderBy('published_at', 'desc')->get();
        SEO::setTitle($archive->title);
        return view('blog.archive')->with('archive', $archive); 
    }
    /**
     * Display a listing of post with $tag
     *
     * @return \Illuminate\Http\Response
     */    
    public function tag($tag) {
        $tag = Tag::with(['post'=> function ($query){
            $query->where('published_at', '<=', Carbon::now())
            ->orderBy('published_at', 'desc')->get();
            
        }])->where('name','=',$tag)->get();
        $tag->makeVisible('slug');
        SEO::setTitle('#'.$tag[0]->name);
        return view('blog.tag')->with('tag',$tag[0]);
    }
}
