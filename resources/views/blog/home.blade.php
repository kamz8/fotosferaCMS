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
                        <article class="row post">
                            <div class="col-xs-12 col-sm-5">
                                <img class="img-responsive polaroid" src="https://static.pexels.com/photos/126792/pexels-photo-126792.jpeg" />
                            </div>
                            <aside class="col-xs-12 col-sm-7">
                                <h1>Title Lorem ipsum </h1>
                                <p  class="text-left">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                <a class="btn btn-default">czytaj dalej...</a>
                            </aside>
                        </article>

                    </div>    
                </div>
            </div>
@endsection
