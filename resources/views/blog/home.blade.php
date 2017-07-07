@extends('blog.master')

@section('content')
            <div class="row">
                <!-- sidebar navigation -->
                @include('blog.sidebar')
                <!--end sidebar-->
                <div class="col-xs-12 col-md-9">
                    <div class="container">
                        @if(count($posts) > 0)
                        @foreach($posts as $post)
                        
                        <article class="row post">
                            <div class="col-xs-12 col-sm-5">
                                <img class="img-responsive polaroid" src="{{route('thumbinal', $post->media_id)}}" />
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
