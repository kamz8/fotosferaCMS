@extends('admin.master')


@section('content')
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Urzytkownicy
                            <small>Lista urzytkowników</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="admin">Panel Główny</a>
                            </li>
                            
                            <li>
                                <i class="fa fa-cog active"></i>  Urzytkownicy
                            </li>                            
                            
                        </ol>
                    </div>
                </div>
                <!-- /.row -->   
                <div class="col-lg-10 col-lg-offset-1 col-sx-12">
                    <div id="flash"></div>
                    <h2>Lista urzytkowników</h2>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-4 col-md-6 col-md-offset-5">
                            <div class="input-group stylish-input-group">
                                <input id="search" type="text" class="form-control"  placeholder="Wyszukaj..." >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-search"></span>
                                </span>
                            </div>
                            
                        </div>                        
                        <div id="create" class="col-sm-2 col-md-1"><button class="btn btn-success" data-action="create" style="float: right"><i class="fa fa-plus"></i>&nbsp;Dodaj</button></div>
                        <div class="clearfix"></div>
                    </div>
                    
                    
                    <div class="table-responsive">
                        <table id="subcribers" class="table table-striped  table-hover text-center">
                            <thead> <tr> <th>#</th> <th>Nazwa</th> <th>Email</th> <th>Rola</th> <th>akcja</th> </tr> </thead>
                            <tbody>                   
                            </tbody>
                        </table>
                        
                     </div>
                    
                    
                </div>                       
                
                @include('admin.users.modal')
@endsection
@section('script')
    <script src="{{ asset('js/liveserch.js')}}"></script>
    <script src="{{ asset('js/user-action.js')}}"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>

@endsection                        
