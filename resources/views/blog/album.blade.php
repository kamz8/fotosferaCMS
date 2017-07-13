@extends('blog.master')

@section('content')
<article class="container-fluid col-xs-12">
                    <header class="text-center lead page-header"> 
                        <h1>{{$album->title}}</h1> 
                    </header>    
    
    @foreach($album->photos as $photo)
                <figure class="col-sx-12 col-md-3 ">
                                       
                    <div class="thumbnail-img polaroid"><a href="#{{$photo->id}}"><img class="center-block img-responsive" src="{{thumbnail($photo->media_id)}}" alt=""></a></div>
                    
                </figure>
    @endforeach
    
@endsection
