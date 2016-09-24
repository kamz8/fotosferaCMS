@extends('admin.master')


@section('content')
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Ustawienia serwisu
                            <small>Lista urzytkowników</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="admin">Panel Główny</a>
                            </li>
                            
                            <li>
                                <i class="fa fa-cog active"></i>  Ustawienia
                            </li>                            
                            
                        </ol>
                    </div>
                </div>
                <!-- /.row -->   
                <div class="col-lg-10 col-lg-offset-1 col-sx-12">
                    <div id="flash"></div>
                    <h2>Ustawienia serwisu</h2>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-4 col-md-6 col-md-offset-5">
                            <div class="input-group stylish-input-group">
                                <input id="search" type="text" class="form-control"  placeholder="Wyszukaj..." >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-search"></span>
                                </span>
                            </div>
                            
                        </div>                        

                    </div>

                    
                    
                </div>                       

@endsection
@section('script')
    <script src="{{ asset('js/liveserch.js')}}"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>

@endsection                        
