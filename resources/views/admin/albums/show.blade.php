@extends('admin.master')


@section('content')
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Galeria zdjęć
                            <small>Wszytkie albymy</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="./">Panel Główny</a>
                            </li>
                            
                            <li>
                                <i class="fa fa-thumb-tack active"></i>  Wszytkie albymy
                            </li>                            
                            
                        </ol>
                    </div>
                </div>
                <!-- /.row -->   
                <div class="col-lg-10 col-lg-offset-1 col-sx-12">
                    <div id="flash"></div>
                    <h2>Lista albymów w galerii</h2>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-4 col-md-6 col-md-offset-5">
                            <div class="input-group stylish-input-group">
                                <input id="search" type="text" class="form-control"  placeholder="Wyszukaj..." >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-search"></span>
                                </span>
                            </div>
                            
                        </div>                        
                        <div id="create" class="col-sm-2 col-md-1"><button type="button" data-toggle="modal" data-target="#albumsModal" class="btn btn-success bootstrap-modal-form-open" style="float: right"><i class="fa fa-plus"></i>&nbsp;Dodaj</button></div>
                        <div class="clearfix"></div>
                    </div>
                    
                    
                    <div class="table-responsive">
                        <table id="posts" class="table table-striped  table-hover text-center">
                            <thead> <tr> <th>#</th> <th>Tytuł</th> <th>Zdjęcia w albumie</th> <th>data</th> <th>akcja</th> </tr> </thead>
                            <tbody>                   
                            </tbody>
                        </table>
                        
                     </div>
                    
                    
                </div>                       
<div id="albumsModal" class="modal fade in" aria-labelledby="albumsModalLabel" aria-hidden="false" tabindex="-1" role="dialog" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Tworzenie nowego albumu.</h4>
            </div>
            <form accept-charset="UTF-8" id="albumsForm" role="form" class="bootstrap-modal-form">
                
                <div class="modal-body" id="albumsModalBody">

                    <div class="form-group">
                            <label for="title">Tytuł albumu</label>
                            <input class="form-control" placeholder="Wpisz nazwę urzytkownika" name="title" type="text">
                         </div>
        
                        <input id="item_id" value="0" type="hidden">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
                    <button id="btn-save" class="btn btn-primary" value="add">Zapisz</button>
                </div>
</form>
                        

        </div>
    </div>
</div>                
                @include('admin.users.modal')
@endsection
@section('script')

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
    <script src="{{asset('./js/ajaxAction.js')}}"></script>
    <script>
        
        $(document).ready(function(){
                var $this = '#posts';
                
                function PostView(data){
                     var row = '';
                    $.each(data, function(i, element) {
                    var action = "{{ url('admin/posts') }}/" + element.id + "/edit";
                    row += '<tr id="item' + element.id + '"><td>' + (i+=1) + '</td>';
                    row += '<td>' + element.title + '</td>';           
                    row += '<td>' + element.photos_count + '</td>';
                    row += '<td>' + element.created_at + '</td>';
                    row += '<td><a href="#" data-action="edit" class="btn btn-gray"><i class="fa fa-pencil"></i>&nbsp; edytuj</a> ';
                    row += '<button value="' + element.id + '" data-action="delete" class="btn btn-danger "><i class="fa fa-remove"></i>&nbsp; usuń</button></td></tr>';  
                    
                    });
                    return row;
                }
    $.ajax({
        
        type: "get",
        url: "../admin/api/albums",
        dataType: 'json',
        cache: false,
        beforeSend: function(html){
            
            $($this + " tbody").append('<tr><td class="spinner" colspan="7" style="position:relative;">Wczytywanie danych <i class="fa fa-spinner fa-spin" style="font-size: 64px;"></i></td></tr>');
        },
        success: function(data)
        {
          $($this + " tbody").html(' ');  
          $(".spinner").remove();  
                   var view = PostView(data);
            if(data.success == 'true') $($this + " tbody").append('<tr><td class="bg-warning" colspan="7" style="position:relative;">'+data.message+'</td></tr>');       
                else $($this + " tbody").append(view);            
                
        },
        
        error: function()
        {
          alert('500 internal server error - błąd po stronie servera przepraszamy! :(');  
        }        
    }); 
    
    $('#search').serch({
     tableID: '#posts',
     url: 'api/albums/serch',
     model: PostView
     
    });
//delete user and remove it from list
    $(document).on("click", '[data-action="delete"]',function(){
        var id = $(this).val();
        var url = "posts";
        $.ajax({

            type: "DELETE",
            url: url + '/' + id,
            success: function (data) {
                $('#posts').find("#item" + id).remove();
                
            },
            error: function (data) {
                alert('Error:', data);
            }
        });
    });        
    
 });    
    </script>
@endsection                        
