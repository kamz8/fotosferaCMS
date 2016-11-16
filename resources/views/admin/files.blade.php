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
              </div>
              <div class="form-group">
                <label for="image" class="col-sm-2 control-label">Obrazek wyróżniający</label>
                <div class="col-sm-10">
                  <div class="box input-file col-xs-12">
                      <div class="box-input text-center">
                          <i class="fa fa-image fa-5x box-image"></i> <div class="clearfix"></div> 
                        <input class="box-file" type="file" name="files[]" id="file" data-multiple-caption="{count} files selected" multiple />
                        <label for="file"><strong>Wybierz obrazek</strong><span class="box-dragndrop"> lub przeciągnij go tutaj</span>.</label>
                        <div class="box-uploading">Uploading&hellip;</div>
                          <div class="box-success">Done!</div>                       
                      </div>

                  </div>                    
                   
                </div>
              </div>
              <div class="form-group">
                <label for="image" class="col-sm-2 control-label"></label>
                <div class="col-sm-10">
                   {!! Form::textarea('content',null,['class' => 'form-control', ]) !!} 
                </div>
              </div>
                            
              

              <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <button type="submit" class="btn btn-md btn-gray btn-block container">Zapisz</button>
                </div>
              </div>

              {!! Form::close() !!}
                          </div>
                    </div>                    
                   
@endsection
@section('script')

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
   <script src="{{ asset('js/plugins/bootstrap-tagsinput.js')}}"></script>
   <script src="{{ asset('js/draggablezone.js')}}"></script>
       <script>
$(document).ready(function(e){
$('#tags').tagsinput({
  maxTags: 3
}); 

 $(document).find('.bootstrap-tagsinput').addClass('form-control');
});       
   </script>    
@endsection                        
