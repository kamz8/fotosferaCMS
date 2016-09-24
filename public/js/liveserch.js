/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



function spinner()
{
    return '<tr><td class="spinner" colspan="7" style="position:relative;">Wczytywanie danych <i class="fa fa-spinner fa-spin" style="font-size: 64px;"></i></td></tr>';
}

function noMatches(html)
{
 $("#subcribers tbody .danger").remove();
 $("#subcribers tbody").append('<tr class="danger"><td colspan="7" style="font-size: 34px;"> <i class="fa fa-meh-o" aria-hidden="true"></i> Oops!  Nic nie znaleziono.</td></tr>');
    
}



function load(){
    
    $.ajax({
        
        type: "get",
        url: "api/users",
        dataType: 'text',
        cache: false,
        beforeSend: function(html){
            
            $("#subcribers tbody").append(spinner());
        },
        success: function(html)
        {
          $("#subcribers > tbody").html(' ');  
          $(".spinner").remove();  
          $("#subcribers tbody").append(html);
             

        },
        
        error: function()
        {
          alert('500 internal server error - błąd po stronie servera przepraszamy! :(');  
        }        
    });
 return false; 
}


function loadState(state){
      if(!$('button i.fa').length && state===true){
        $('button[type="submit"]').html('<i class="fa fa-spinner fa-spin fa-2x fa-fw"></i>');
        $('button[type="submit"]').toggleClass('disabled');
        $('.form-control').attr('disabled');
    }  if(state===false){
    
        $('button[type="submit"]').html('Send Mail');
        $('button[type="submit"]').toggleClass('disabled');
        
    
    }
}

$(document).ready(function(){
    var url = './api/users';
$(function() {


    $("#search").keyup(function() {
        var keyword = $("#search").val();
        keyword = $.trim(keyword);
        if(keyword=='') {
               load();
        } else {
            
            $("#subcribers > tbody").html('');
            $.ajax({
                type: "post",
                url: "api/users/serch",
                data: {
                    'keyword': keyword
                    
                },
                
                dataType: 'text',
                cache: false,
                beforeSend: function(html){
                    $("#subcribers > tbody").html('');
                    $("#subcribers tbody").append(spinner());
                },
                success: function(html)
                {
                     $(".spinner").remove();
                     $("#subcribers > tbody").html('');
                     if(html=='no_result')
                        noMatches(html);
                    else{
                        $("#subcribers tbody .danger").remove();
                        $("#subcribers tbody").append(html);
                    }
                        
                }
            });
        } return false;
    });
        
        load();   
   
});    


});





