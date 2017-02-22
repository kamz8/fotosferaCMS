/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* global el */

(function($){
    
    $.fn.tableAction = function(options) {
        
        var $this = this;
        options = $.extend({
            //...parametry
            url: '',            
            dataType: 'json',   //json or html
            columns: [],
            load: function(url){},
            update: function(url){},
            delete: function(url){},
            create: function(url){}
        }, options);
        
        var renderRow = function(data){
                var lastId = $($this + 'tbody > tr').length + 1;
                var row = '';
                $.each(data, function(i, item) {
                    if (i<=0) row += '<tr id="item' + item + '"><td>' + lastId + '</td>';
                    row += '<td>' + item + '</td>';
                });                

                row += '<td><button value="' + data.id + '" data-action="edit" class="btn btn-gray"><i class="fa fa-pencil"></i>&nbsp; edytuj</button> ';
                row += '<button value="' + data.id + '" data-action="delete" class="btn btn-danger "><i class="fa fa-remove"></i>&nbsp; usuń</button></td></tr>';    
                
                return row;
        };
        
        var spiner = function(){
                return '<tr><td class="spinner" colspan="7" style="position:relative;">Wczytywanie danych <i class="fa fa-spinner fa-spin" style="font-size: 64px;"></i></td></tr>';
        }
        
        return this.each(function() {
           var $t = $(this);
           
           options.load = function (){
            $.ajax({

                type: "get",
                url: options.url,
                dataType: options.dataType,
                cache: false,
                beforeSend: function(data){

                    $($t+" tbody").append(spiner());
                },
                success: function(data)
                {
                  $($t+"tbody").html(' ');  
                  $(".spinner").remove();  
                  $($t+"tbody").append(renderRow());
                  if(options.dataType === 'json'){
                      
                  }

                },

                error: function()
                {
                  alert('500 internal server error - błąd po stronie servera przepraszamy! :(');  
                }        
                });               

               };
        });
       
    };
    
    $.fn.serch = function(options) {
        options = $.extend({
            //...parametry
            url: '', 
            tableID: '',
            model: function(data) {},
            dataType: 'json'   //json or html
        }, options);
       
function noMatches(html)
{

 $(options.tableID+" tbody").append('<tr class="danger"><td colspan="7" style="font-size: 34px;"> <i class="fa fa-meh-o" aria-hidden="true"></i> Oops!  Nic nie znaleziono.</td></tr>');
    
 }        
        return this.each(function() {
            var $t = this;
        
        $(this).keyup(function(e) {
        var keyword = $(this).val();
        keyword = $.trim(keyword);
            
            $(options.tableID+" > tbody").html('');
            $.ajax({
                type: "post",
                url: options.url,
                data: {
                    'keyword': keyword
                    
                },
                
                dataType: options.dataType,
                cache: false,
                beforeSend: function(html){
                    $(options.tableID+" tbody").html('');
                    $(options.tableID+" tbody").append('<tr><td class="spinner" colspan="7" style="position:relative;">Wczytywanie danych <i class="fa fa-spinner fa-spin" style="font-size: 64px;"></i></td></tr>');
                },
                success: function(dataResponse)
                {
                            
                     $(".spinner").remove();
                     $(options.tableID+" tbody").html('');
                    if(options.dataType=='json'){
                         if(dataResponse.success===false){
                            noMatches(dataResponse.message);
                                console.log(dataResponse.message);
                         }  
                        else{
                            
                            $(options.tableID+" tbody .danger").remove();
                            $(options.tableID+" tbody").append(options.model(dataResponse));
                        }                        
                    } 

                        
                }
            });

    });            
        });      
        
    };
})(jQuery);