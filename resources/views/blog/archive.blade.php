@extends('blog.master')

@section('content')

            <div class="col-xs-12 col-lg-12">
                <div class="container">
                    <header class="text-center lead page-header"> 
                        <h1>Archiwum:&nbsp;{{$archive->title}}</h1> 
                        <span class="subttitle">Wpisy: <span class="count">{{$archive->post->count()}}</span></span>
                    </header>
                    <div class="row">
                        <div class="col-sx-12">
                            @if(count($archive->post) > 0)
                            @foreach($archive->post as $post)

                            <article class="row post">
                                <div class="col-xs-12 col-sm-5">
                                    <img class="img-responsive polaroid" src="{{route('thumbnail', $post->media_id)}}" />
                                </div>
                                <aside class="col-xs-12 col-sm-7">
                                    <h1>{{$post->title}} </h1>
                                    <p  class="text-left">{{str_limit($post->content, 400, '...')}}</p>
                                    <a class="btn btn-default" href="{{url($post->slug)}}">czytaj dalej...</a>
                                </aside>
                            </article>
                            @endforeach
                            @endif
                        </div>                        
                    </div>                    
                </div>

            </div>
   
@endsection
