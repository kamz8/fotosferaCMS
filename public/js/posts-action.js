/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function (){
    var url = './api/users';
    var modal = $('#userModal');

    //display modal form for user editing
    $(document).on("click", '[data-action="edit"]', function() {
        var id = $(this).val();
        //clear error state
        $('form .form-group').removeClass('has-error');
        $('.help-block').remove();
        
        $('#userModal').find('.modal-title').text('Edycja danych urzytkownika');
        
        $.get(url + '/' + id + '/edit', function (data) {
            //success data
            console.log(data);
            $.each(data, function (index, value){
                $('[name="'+index+'"]').val(value);
                
            });
            $('.selectpicker').selectpicker('refresh');
            $('#item_id').val(data.id);
            $('#btn-save').val("update");
           $('#userModal').modal('show');
           
        }); 
        console.error;
    });
//end

  //display modal form for creating new user
    $('[data-action="create"]').click(function(){
        $('#btn-save').val("add");
        $('#userForm').trigger("reset");
        $('.selectpicker').selectpicker('refresh');
        //clear error state
        $('form .form-group').removeClass('has-error');
        $('.help-block').remove();
        $('#userModal').find('.modal-title').text('Tworzenie nowego urzytkownika');
        modal.modal('show');
    });
    
    //delete user and remove it from list
    $(document).on("click", '[data-action="delete"]',function(){
        var id = $(this).val();

        $.ajax({

            type: "DELETE",
            url: url + '/' + id,
            success: function (data) {
                $("#item" + id).remove();
                
            },
            error: function (data) {
                alert('Error:', data);
            }
        });
    });    
    
    //create new user / update existing user
    $("#btn-save").click(function (e) {
        e.preventDefault(); 
        var formData = {};
        $("form").find("[name]").each(function(){
        formData[ $(this).attr("name")] = $(this).val();
        });

        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save').val();

        var type = "POST"; //for creating new resource
        var id = $('#item_id').val();
        var my_url = url;

        if (state == "update"){
            type = "PUT"; //for updating existing resource
            my_url += '/' + id;

        }

        console.log(formData);

        $.ajax({

            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {

                var lastId = $('tbody > tr').length + 1;
    
                var user = '<tr id="item' + data.id + '"><td>' + lastId + '</td><td>' + data.name + '</td><td>' + data.email + '</td><td>' + data.role + '</td>';
                user += '<td><button value="' + data.id + '" data-action="edit" class="btn btn-gray"><i class="fa fa-pencil"></i>&nbsp; edytuj</button> ';
                user += '<button value="' + data.id + '" data-action="delete" class="btn btn-danger "><i class="fa fa-remove"></i>&nbsp; usuń</button></td></tr>';

                if (state == "add"){ //if user added a new record
                    $('tbody').append(user);
                }else{ //if user updated an existing record

                    $("#item" + id).replaceWith( user );
                }

                $('#userForm').trigger("reset");
                
                $('#userModal').modal('hide')
            },
            error: function (data) {
                    
                    switch (data.status)
                    {
                        case 400:
                            //clear error state
                            $('form .form-group').removeClass('has-error');
                            $('.help-block').remove(); 
                            //write error message
                            $.each( data.responseJSON.errors, function( key, value ) {
                                $("form").find('[name]').each(function (){
                                if($(this).attr("name") == key  ){

                                  $(this).parent().addClass('has-error');
                                  $(this).parent().append(' <span class="help-block">'+value+'</span>');   
                                }                                    
                                });                                

                            });            

                            break;
                        case 500:
                                alert('something went wrong!');
                            break;
                    }                
            }
        });
    });
   

    
   
});

