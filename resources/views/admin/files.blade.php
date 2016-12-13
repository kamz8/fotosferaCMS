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
                                         

                            <div class="col-sx-12 col-sm-10 col-sm-push-1">
                                <div id="dropFile" class="box input-file col-xs-12">
                                  <div class="box-input text-center">
                                      <i class="fa fa-image fa-5x box-image"></i> <div class="clearfix"></div> 

                                    <label for="file"><strong>Wybierz obrazek</strong><span class="box-dragndrop"> lub przeciągnij go tutaj</span>.</label>
                                    <div id="prosessing" class="hide" >Pobieranie&hellip;</div>
                                      <div class="hide success"></div>                       
                                  </div>

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
