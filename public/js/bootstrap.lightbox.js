/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


(function ($) {
    $('.lightbox [data-role="fullscreen"]').on('click', function(e) {
        e.preventDefault();
        
        $('[fullsceenEnable]').fullScreen({'callback' : function() {
               $(document).find('.fullScreen').prepend('<a href="#" class="close expand" aria-label="Fullscreen" data-dissmis="fullscreen" title="Zamknij tryb pełnoekranowy"><i class="fa fa-close"></i></a>');
       } });

    });
    $(document).on('click','.fullScreen .close', function(e) {
        e.preventDefault();
        this.remove(); 
        $('[fullsceenEnable]').fullScreen();
    }); 
    
    
}(jQuery));
