/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


(function ($) {
    $.fn.dataContent = function (val) {
        return $(this).find(`[data-content='${val}']`);
    };
    var _dataFn = $.fn.data;
        $.fn.data = function(key, val){
            if (typeof val !== 'undefined'){ 
                $.expr.attrHandle[key] = function(elem){
                    return $(elem).attr(key) || $(elem).data(key);
                };
            }
            return _dataFn.apply(this, arguments);
        };    
    
    $('.lightbox [data-role="fullscreen"]').on('click', function(e) {
        e.preventDefault();
        
        $('[fullsceenEnable]').fullScreen({'callback' : function() {
               $(document).find('.fullScreen').prepend('<a href="#" class="close expand" aria-label="Fullscreen" data-dissmis="fullscreen" title="Zamknij tryb pełnoekranowy"><i class="fa fa-close"></i></a>');
       } });

    });
    $.fn.Datatemplate = function(json){
        let $self = $(this);
        $.each(json,function (key, value) {
            $self.dataContent(key).text(value);
        });
    };
    let getNext = function ($this) {
        return $($this).closest('figure').next().find('a');
    };
    let getPrev = function ($this) {
        return $($this).closest('figure').prev().find('a');
    };    
    
    let DataView = function (href, $this) {
        var imgUrl = "/media/image/";
        var lightbox = $('#lightbox');
        var next = getNext($this).attr('href');
        var prev = getPrev($this).attr('href');
        console.log(next+" "+prev);
        
            $.get(href,function(data, status){
            lightbox.find('.lightbox-control').hide();    
            lightbox.find('img').attr('src', imgUrl+data.media_id );
            lightbox.dataContent('exif-FocalLength').text(data.exif.FocalLength);
            lightbox.dataContent('exif-model').text(data.exif.Model);
            lightbox.dataContent('exif-FNumber').text(data.exif.FNumber);
            lightbox.dataContent('exif-ExposureTime').text(data.exif.ExposureTime);
            lightbox.dataContent('exif-ISO').text(data.exif.ISO);
            lightbox.Datatemplate(data);
            if(typeof prev != "undefined") lightbox.find('[data-action="prev"]').attr('href',prev).parent().show();
            if(typeof next != "undefined" && next !=="#" ) lightbox.find('[data-action="next"]').attr('href',next).parent().show();
            lightbox.modal('show');                  
            
            },'json')
            .complete(function () {
                $this.data('disable',false);
                
            });         
    };

    $(document).on('click','.fullScreen .close', function(e) {
        e.preventDefault();
        this.remove(); 
        $('[fullsceenEnable]').fullScreen();
    }); 
    
    $('#imageList a').on('click',function (e) {
        e.preventDefault();
        var $this = $(this); 
        
        if($this.data('disable')=== false){
            $this.data('disable',true);
           DataView($this.attr('href'),$this);
        }     
        
  
    });
    
    $('.lightbox-control').on(' click','a',function (e) {
           e.preventDefault(); 
           var $self = $(this);
           var $this = $('#imageList').find(`a[href="${$self.attr('href')}"]`);
            if($this.data('disable')=== false){
                $this.data('disable',true);
               DataView($self.attr('href'),$this);
            }            
           
        });   
//$(document).on('keypress',function (e){ 
//    console.log($('.lighbox').find('.left'));
//    if((e.keyCode || e.which)== 37) // left arrow
//    {
//        $('.lighbox').find('.left').click();
//        console.log('sss');
//    }
//    else if((e.keyCode || e.which) == 39)    // right arrow
//    { 
//        $('.lighbox').find('.right').click();
//        console.log('ssxxx');
//    }
//});        
}(jQuery));
