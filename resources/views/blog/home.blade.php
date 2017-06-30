@extends('blog.master')

@section('content')
            <div class="row">
                <!-- sidebar navigation -->
                <nav id="sidebar" class="col-xs-9 col-md-2 sidebar-offcanvas">
                    <button class="btn btn-toggle visible-xs visible-sm"><i class="fa fa-bars"></i></button>
                    <aside class="sidebar-module">
                        <h4><i class="fa fa-archive"></i> Archives</h4>
                        <ol class="list-unstyled">
                            <li><a href="#">March 2014</a></li>
                            <li><a href="#">February 2014</a></li>
                            <li><a href="#">January 2014</a></li>
                            <li><a href="#">December 2013</a></li>
                            <li><a href="#">November 2013</a></li>
                            <li><a href="#">October 2013</a></li>
                            <li><a href="#">September 2013</a></li>
                            <li><a href="#">August 2013</a></li>
                            <li><a href="#">July 2013</a></li>
                            <li><a href="#">June 2013</a></li>
                            <li><a href="#">May 2013</a></li>
                            <li><a href="#">April 2013</a></li>
                        </ol>
                    </aside>
                    <aside id="tags" >
                        <h4><i class="fa fa-tags"></i>Tags</h4>
                        <a href="">#foto</a>
                        <a href="">#nikon</a>
                        <a href="">#foto</a>
                        <a href="">#nikon</a>
                        <a href="">#foto</a>
                        <a href="">#nikon</a>
                        <a href="">#foto</a>
                        <a href="">#nikon</a>
                        <a href="">#foto</a>
                        <a href="">#nikon</a>
                        <a href="">#foto</a>
                        <a href="">#nikon</a>
                    </aside>  
                </nav>
                <!--end sidebar-->
                <div class="col-xs-12 col-md-9">
                    <div class="container">
                        @if(count($posts) > 0)
                        @foreach($posts as $post)
                        
                        <article class="row post">
                            <div class="col-xs-12 col-sm-5">
                                <img class="img-responsive polaroid" src="{{url('media/image/'.$post->media_id)}}" />
                            </div>
                            <aside class="col-xs-12 col-sm-7">
                                <h1>{{$post->title}} </h1>
                                <p  class="text-left">{{str_limit($post->content, 400, '...')}}</p>
                                <a class="btn btn-default" href="{{$post->slug}}">czytaj dalej...</a>
                            </aside>
                        </article>
                        @endforeach
                        @endif
                    </div>    
                </div>
            </div>
@endsection
