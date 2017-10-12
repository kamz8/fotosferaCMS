@extends('blog.master')

@push('stylesheet')
    <link href="{{asset('css/lightbox.css')}}" rel="stylesheet"></script>
    
@endpush

@section('content')
<article id="imageList" class="container-fluid col-xs-12" data-count="{{$album->photos->count()}}">
                    <header class="text-center lead page-header"> 
                        <h1>{{$album->title}}</h1> 
                    </header>    
    
    @foreach($album->photos as $photo)
                <figure class="col-sx-12 col-md-3 ">
                    <div class="thumbnail-img polaroid"><a href="/p/{{$photo->id}}" data-disable="false"><img class="center-block img-responsive" src="{{thumbnail($photo->media_id)}}" alt="miniaturka"></a></div>
                </figure>
    @endforeach
@include('layouts.lightbox')
@push('script')
<script src="{{asset('js/jquery.fullscreen.js')}}" type="text/javascript"></script>
<script src="{{asset('js/bootstrap.lightbox.js')}}" type="text/javascript"></script>
@endpush

@endsection
