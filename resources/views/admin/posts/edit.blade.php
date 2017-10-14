@extends('admin.master')

@section('style')
<link href="{{ asset('css/plugins/bootstrap-tagsinput.css')}}" rel="stylesheet">
<link href="{{ asset('css/bs-dropbox.css')}}" rel="stylesheet">
<link href="{{ asset('css/plugins/bootstrap-datepicker3.min.css')}}" rel="stylesheet">
<link href="{{ asset('css/plugins/trumbowyg.min.css')}}" rel="stylesheet">
@endsection

@section('content')
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Edytuj Wpis
                            <small>Edytuj wpis na blogu.</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="./">Panel Główny</a>
                            </li>
                            
                            <li>
                                <i class="fa fa-thumb-tack active"></i>  Edytuj Wpis
                            </li>                            
                            
                        </ol>
                    </div>
                </div>
                <!-- /.row -->   
                <div class="col-lg-10 col-md-2 col-sx-12">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edytuj swój wpis.</h3>
                        </div>
                    <div class="panel-body ">
                        {!! Form::model($post,['method' => 'PATCH', 'class' => 'form-horizontal', 'action' => ['admin\PostController@update',$post->id]]) !!}
                        @include('admin.posts.create_form')
                          </div>
                    </div>                    
                </div>         
                <div class="col-lg-2 col-md-2 col-sx-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Opublikuj o.</h3>
                        </div>
                        <div class="panel-body ">
                            <div class="center-block">
                                <div id="datepicker" data-date="{{Carbon\Carbon::now()}}"></div>
                            </div>
                        </div>
                    </div>  
                </div>                
                   
                   
@endsection
@section('script')

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
   <script src="{{ asset('js/plugins/bootstrap-tagsinput.js')}}"></script>
   <script src="{{ asset('js/bootstrap-dropbox.js')}}"></script>
   <script src="{{ asset('js/plugins//bootstrap-datepicker.min.js')}}"></script>
   <script src="{{ asset('js/trumbowyg/trumbowyg.min.js')}}"></script>   
   <script type="text/javascript" src="{{ asset('js/trumbowyg/langs/pl.min.js')}}"></script>
       <script>

$(document).ready(function(e){
           @foreach($post->tag as $tag)
            $('#tags').tagsinput('add',"{{$tag->name}}");
           @endforeach    
$(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
    return false;
  }
});    
$('#tags').tagsinput({
  maxTags: 3
}); 

 $('#tags').tagsinput('items');


 $(document).find('.bootstrap-tagsinput').addClass('form-control');
 $('#myDropbox').dropbox('prewiev', {imageSrc: "{{url($post->media->path)}}", id: {{$post->media->id}}});
  $('#datepicker').datepicker({
        startDate: "now",
        maxViewMode: 2,
        language: "pl",    
        leftArrow: '<i class="fa fa-long-arrow-left"></i>',
        rightArrow: '<i class="fa fa-long-arrow-right"></i>'
});       
    $('#datepicker').on('changeDate', function() {
        $('#public_at').val(
            $('#datepicker').datepicker('getFormattedDate')
        );
    });
    $('#editor').trumbowyg({
        svgPath: "{{ asset('img/icons.svg')}}",
        lang: 'pl'
    });
});       
   </script>    
@endsection   