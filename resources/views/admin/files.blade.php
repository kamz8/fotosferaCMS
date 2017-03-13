@extends('admin.master')

@section('style')
<link href="{{ asset('css/plugins/bootstrap-tagsinput.css')}}" rel="stylesheet">
<link href="{{ asset('css/bs-dropbox.css')}}" rel="stylesheet">
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
                                <div id="myDropbox" class="dropbox col-xs-12"> </div>
          
                   
@endsection
@section('script')

    <!-- Latest compiled and minified JavaScript -->

   <script src="{{ asset('js/bootstrap-dropbox.js')}}"></script>
<script>
$(document).ready(function(e){

$('#myDropbox').dropbox({url:"{{  url('admin/api/files/') }}"});
});       
</script>    
@endsection                        
