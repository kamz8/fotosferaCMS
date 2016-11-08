@extends('admin.master')


@section('content')
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Blog
                            <small>Wszytkie wpisy</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="./">Panel Główny</a>
                            </li>
                            
                            <li>
                                <i class="fa fa-thumb-tack active"></i>  Wszytkie wpisy
                            </li>                            
                            
                        </ol>
                    </div>
                </div>
                <!-- /.row -->   
                <div class="col-lg-10 col-lg-offset-1 col-sx-12">
                    <div id="flash"></div>
                    <h2>Lista wpisów</h2>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-4 col-md-6 col-md-offset-5">
                            <div class="input-group stylish-input-group">
                                <input id="search" type="text" class="form-control"  placeholder="Wyszukaj..." >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-search"></span>
                                </span>
                            </div>
                            
                        </div>                        
                        <div id="create" class="col-sm-2 col-md-1"><a href="{{action('admin\PostController@create')}}" class="btn btn-success" style="float: right"><i class="fa fa-plus"></i>&nbsp;Dodaj</a></div>
                        <div class="clearfix"></div>
                    </div>
                    
                    
                    <div class="table-responsive">
                        <table id="posts" class="table table-striped  table-hover text-center">
                            <thead> <tr> <th>#</th> <th>Tytuł</th> <th>autor</th> <th>data</th> <th>akcja</th> </tr> </thead>
                            <tbody>                   
                            </tbody>
                        </table>
                        
                     </div>
                    
                    
                </div>                       
                
                @include('admin.users.modal')
@endsection
@section('script')

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>

    <script>
        $(document).ready(function(){
                var $this = '#posts';
                var row = ''; 
    $.ajax({
        
        type: "get",
        url: "../admin/api/posts",
        dataType: 'json',
        cache: false,
        beforeSend: function(html){
            
            $($this + " tbody").append('<tr><td class="spinner" colspan="7" style="position:relative;">Wczytywanie danych <i class="fa fa-spinner fa-spin" style="font-size: 64px;"></i></td></tr>');
        },
        success: function(data)
        {
          $($this + " tbody").html(' ');  
          $(".spinner").remove();  
                 $.each(data, function(i, element) {
                     
                    row += '<tr id="item' + i + '"><td>' + (i+=1) + '</td>';
                    row += '<td>' + element.title + '</td>';           
                    row += '<td>' + element.author + '</td>';
                    row += '<td>' + element.created_at + '</td>';
                    row += '<td><button value="' + data.id + '" data-action="edit" class="btn btn-gray"><i class="fa fa-pencil"></i>&nbsp; edytuj</button> ';
                    row += '<button value="' + data.id + '" data-action="delete" class="btn btn-danger "><i class="fa fa-remove"></i>&nbsp; usuń</button></td></tr>';    
                    
                });                
                $($this + " tbody").append(row);            
                console.log(data);
        },
        
        error: function()
        {
          alert('500 internal server error - błąd po stronie servera przepraszamy! :(');  
        }        
    });                
 });    
    </script>
@endsection                        
