@extends('admin.master')


@section('content')
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Ustawienia
                            <small></small>
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
                <div class="col-md-8 col-md-offset-2">
                    <div id="flash">
                        @if(Session::has('alert-success'))
                        <div class="alert alert-success">{{Session::get('alert-success')}}</div>
                        @endif
                    </div>
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif                      
                </div>   
                
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-gray">
                        <div class="panel-heading">
                            <h3 class="panel-title">Zmiana hasła urzytkownika.</h3>
                        </div>
                    <div class="panel-body ">
                        {!! Form::open(array('url' => 'admin/settings', 'method' => 'PATCH', 'class' => 'form-horizontal' )) !!}
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">stare hasło:</label>
                        <div class="col-sm-10">
                           {!! Form::password('old_password', ['class'=>'form-control','placeholder' => 'Podaj stare hasło', 'required' =>'']) !!}
                        </div>
                      </div> 
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">nowe hasło:</label>
                        <div class="col-sm-10">
                           {!! Form::password('password', ['class'=>'form-control', 'placeholder' => 'Wpisz nowe hasło', 'required' =>'']) !!}
                        </div>
                      </div> 
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Powtórz nowe hasło:</label>
                        <div class="col-sm-10">
                           {!! Form::password('password_confirmation', ['class'=>'form-control', 'placeholder' => 'Powtórz nowe hasło', 'required' =>'']) !!}
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
                </div>                               
                
                
 
@endsection
@section('script')
    
@endsection   