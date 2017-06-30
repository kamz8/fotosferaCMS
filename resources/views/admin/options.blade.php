@extends('admin.master')


@section('content')
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Ustawienia 
                            <small>Konfiguracja strony</small>
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
                <div class="col-lg-12 col-sx-12">
                    <div id="flash"></div>

                    <div class="row">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif 
                        @if (Session::has('updated'))
                        <div class="col-md-4 col-md-offset-3">
                            <div class="alert alert-success">
                                <p>Zmiany zostały zapisane...</p>
                            </div>
                        </div>    
                        @endif
                        </div>                        
                        <ul id="myTab" class="nav nav-tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#general">Ogólne</a></li>
                          <li role="presentation"><a href="#notification">Powiadomienia</a></li>
                          <li role="presentation"><a href="#reading">Czytanie</a></li>
                          <li role="presentation"><a href="#coments">Komentarze</a></li>
                          <li role="presentation" hidden=""><a href="#socialmedia">Media społecznościowe</a></li>
                        </ul>
                    
                    <div class="tab-content" id="myTabContent">    
<!--                        general settings tab-->
                        <div class="tab-pane fade in active " role="tabpanel" id="general" aria-labelledby="general-tab"> 
                                <h2 class="text-center">Ustawienia ogólne</h2>
                                <div class="container">
                            {!! Form::model($options,['method' => 'PATCH', 'class' => 'form-horizontal', 'action' => ['admin\SettingsController@update']]) !!}
                              <div class="form-group">
                                <label for="" class="col-md-2 col-sm-12 control-label ">Nazwa bloga:</label>
                                <div class="col-sm-12 col-md-8">
                                   {!! Form::text('site_name', null, ['class'=>'form-control','placeholder' => 'Tytuł bloga wyświetlany na pasku', ]) !!}
                                </div>
                              </div> 
                              <div class="form-group">
                                <label for="" class="col-md-2 col-sm-4 control-label ">Opis:</label>
                                <div class="col-sm-12 col-md-8">
                                   {!! Form::text('meta_description', null, ['class'=>'form-control','placeholder' => 'Kródki opis twojej strony', ]) !!}
                                </div>
                              </div>  
                              <div class="form-group">
                                <label for="" class="col-md-2 col-sm-4 control-label ">Słowa kluczowe:</label>
                                <div class="col-sm-12 col-md-8">
                                   {!! Form::text('meta_keywords', null, ['class'=>'form-control','placeholder' => 'Słowa kluczowe - "tagi"', ]) !!}
                                </div>
                              </div>  
                              <div class="form-group">
                                <label for="" class="col-md-2 col-sm-4 control-label ">Email administracyjny:</label>
                                <div class="col-sm-12 col-md-8">
                                   {!! Form::email('superadmin_email', null, ['class'=>'form-control','placeholder' => 'example@example.com', 'required' =>'']) !!}
                                </div>
                              </div>           
                             
                       
                              <div class="form-group">
                                <div class="col-md-offset-2 col-md-6 col-md-push-1">
                                    <button type="submit" class="btn btn-md btn-gray btn-block container">Zapisz</button>
                                </div>
                              </div>
                                {!! Form::close() !!}                                
                            </div>
                            

                        </div>
                        
<!--reading tab-->
                        <div class="tab-pane fade" role="tabpanel" id="reading" aria-labelledby="reading-tab"> 
                            <h2 class="text-center">Ustawienia czytania</h2>
                            {!! Form::model($options,['method' => 'PATCH', 'class' => 'form-horizontal', 'action' => ['admin\SettingsController@update']]) !!}
                              <div class="form-group">
                                  <label for="" class="col-md-2 col-sm-12 control-label ">Ilość wpisów na stronie:</label>
                                <div class="col-sm-12 col-md-8">
                                   {!! Form::number('posts_per_page', null, ['class'=>'form-control','placeholder' => 'Tytuł bloga wyświetlany na pasku',  ]) !!}
                                </div>
                              </div> 
        
                             
                       
                              <div class="form-group">
                                <div class="col-md-offset-2 col-md-6 col-md-push-1">
                                    <button type="submit" class="btn btn-md btn-gray btn-block container">Zapisz</button>
                                </div>
                              </div>
                                {!! Form::close() !!}                              
                        </div>
<!--comments tab-->
                        <div class="tab-pane fade" role="tabpanel" id="coments" aria-labelledby="coments-tab"> 
                            <h2 class="text-center">Ustawienia komentarze</h2>
                        </div>     
<!--socialmedia tab-->
                        <div class="tab-pane fade" role="tabpanel" id="socialmedia" aria-labelledby="coments-tab"> 
                            <h2 class="text-center">Połącz z mediami społecznościowymi</h2>
                        </div>   
                        <div class="tab-pane fade" role="tabpanel" id="notification" aria-labelledby="writing-tab"> 
                            <div class="tab-pane fade in active " role="tabpanel" id="general" aria-labelledby="general-tab"> 

                                    <h2 class="text-center">Ustawienia powiadomień</h2>
                                    <div class="container" hidden="">
                                {!! Form::model($options,['method' => 'PATCH', 'class' => 'form-horizontal', 'action' => ['admin\SettingsController@update']]) !!}
                                  <div class="form-group">
                                    <label for="" class="col-md-2 col-sm-12 control-label ">Nazwa bloga:</label>
                                    <div class="col-sm-12 col-md-8">
                                       {!! Form::text('', null, ['class'=>'form-control','placeholder' => 'Tytuł bloga wyświetlany na pasku', 'required' =>'']) !!}
                                    </div>
                                  </div> 

                                
                               

                                  <div class="form-group">
                                    <div class="col-md-offset-2 col-md-6 col-md-push-1">
                                        <button type="submit" class="btn btn-md btn-gray btn-block container">Zapisz</button>
                                    </div>
                                  </div>
                                    {!! Form::close() !!}                                
                                </div>


                            </div>                                
                        </div>                        
                    </div>    

                </div>                       

@endsection
@section('script')

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
    <script>
        $('#myTab a').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
        })
        $('[data-toggle="tooltip"]').tooltip();
    </script>

@endsection                        
