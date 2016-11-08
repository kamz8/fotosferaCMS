@extends('admin.master')

@section('style')
<link href="{{ asset('css/plugins/bootstrap-tagsinput.css')}}" rel="stylesheet">
<link href="{{ asset('css/inputbox.css')}}" rel="stylesheet">
@endsection

@section('content')
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dodaj Wpis
                            <small>Utwórz nowy wpis na blogu.</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="./">Panel Główny</a>
                            </li>
                            
                            <li>
                                <i class="fa fa-thumb-tack active"></i>  Dodaj Wpis
                            </li>                            
                            
                        </ol>
                    </div>
                </div>
                <!-- /.row -->   
                <div class="col-lg-10 col-lg-offset-1 col-sx-12">
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
                            <h3 class="panel-title">Dodanie nowego subskrybenta.</h3>
                        </div>
                    <div class="panel-body ">
                        {!! Form::open(array('url' => action('admin\PostController@store'), 'method' => 'post', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data' )) !!}
                        @include('admin.posts.create_form')
                          </div>
                    </div>                    
                   
@endsection
@section('script')

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
   <script src="{{ asset('js/plugins/bootstrap-tagsinput.js')}}"></script>
       <script>
$(document).ready(function(e){
$('#tags').tagsinput({
  maxTags: 3
}); 

$('bootstrap-tagsinput').addClass('form-control');
});       
   </script>    
@endsection                        
