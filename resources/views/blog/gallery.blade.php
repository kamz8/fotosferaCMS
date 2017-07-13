@extends('blog.master')

@section('content')
<article class="container-fluid col-xs-12">
    @foreach($albums as $album)
                <figure class="col-sx-12 col-md-3 ">
                    <figcaption class="col-sx-12 text-center"><h1>{{$album->title}}</h1></figcaption>
                    
                    <div class="thumbnail-img polaroid"><a href=""><img class="center-block img-responsive" src="{{thumbnail($album->cover_img)}}" alt=""></a></div>
                    
                </figure>
    @endforeach
@endsection
<!--
https://static.pexels.com/photos/176816/pexels-photo-176816.jpeg
https://static.pexels.com/photos/176851/pexels-photo-176851.jpeg
https://static.pexels.com/photos/102572/pexels-photo-102572.jpeg
https://static.pexels.com/photos/61100/pexels-photo-61100.jpeg
--> 