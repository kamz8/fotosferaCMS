<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Post;
use SEO;

use App\Http\Controllers\Admin\PostController;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        SEO::setTitle('Fotosfera');

//        SEO::setDescription('This is my page description');
//        SEO::opengraph()->setUrl('http://fotosfera.org.pl');
//        SEO::setCanonical('https://codecasts.com.br/lesson');
//        SEO::opengraph()->addProperty('type', 'articles');
//        SEO::twitter()->setSite('@LuizVinicius73');        
        return view('blog.home');
    }
    
    public function about()
    {
        
    } 
    
    public function contact()
    {
        
    } 
    
}
