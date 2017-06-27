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

                        </div>                        
                        <ul id="myTab" class="nav nav-tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#general">Ogólne</a></li>
                          <li role="presentation"><a href="#writing">Pisanie</a></li>
                          <li role="presentation"><a href="#reading">Czytanie</a></li>
                          <li role="presentation"><a href="#coments">Komentarze</a></li>
                          <li role="presentation" hidden=""><a href="#">Media społecznościowe</a></li>
                        </ul>
                    
                    <div class="tab-content" id="myTabContent">    
                        <div class="tab-pane fade in active " role="tabpanel" id="general" aria-labelledby="general-tab"> 

                                <h2 class="text-center">Ustawienia ogólne</h2>
                                <div class="container">
                            {!! Form::open(array('url' => 'admin/settings', 'method' => 'PATCH', 'class' => 'form-horizontal' )) !!}
                              <div class="form-group">
                                <label for="" class="col-md-2 col-sm-12 control-label ">Nazwa bloga:</label>
                                <div class="col-sm-12 col-md-8">
                                   {!! Form::text('sitetitle', null, ['class'=>'form-control','placeholder' => 'Tytuł bloga wyświetlany na pasku', 'required' =>'']) !!}
                                </div>
                              </div> 
                              <div class="form-group">
                                <label for="" class="col-md-2 col-sm-4 control-label ">Opis:</label>
                                <div class="col-sm-12 col-md-8">
                                   {!! Form::text('meta_description', null, ['class'=>'form-control','placeholder' => 'Kródki opis twojej strony', 'required' =>'']) !!}
                                </div>
                              </div>  
                              <div class="form-group">
                                <label for="" class="col-md-2 col-sm-4 control-label ">Słowa kluczowe:</label>
                                <div class="col-sm-12 col-md-8">
                                   {!! Form::text('meta_description', null, ['class'=>'form-control','placeholder' => 'Słowa kluczowe - "tagi"', 'required' =>'']) !!}
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
                        
                        <div class="tab-pane fade" role="tabpanel" id="writing" aria-labelledby="writing-tab"> 
                                
                        </div>
                        <div class="tab-pane fade" role="tabpanel" id="reading" aria-labelledby="reading-tab"> 

                        </div>
                        <div class="tab-pane fade" role="tabpanel" id="coments" aria-labelledby="coments-tab"> 

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
    </script>

@endsection                        
