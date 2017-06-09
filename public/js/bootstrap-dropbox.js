/*!
 * jQuery drag & drop file plugin with boostrap UI
 * author: Kamil Żmijowski
 * version: 1.0 pre alpha
 * Licensed under the MIT license
 */

;(function ( $, window, document, undefined ) {
    
    // undefined is used here as the undefined global 
    // variable in ECMAScript 3 and is mutable (i.e. it can 
    // be changed by someone else). undefined isn't really 
    // being passed in so we can ensure that its value is 
    // truly undefined. In ES5, undefined can no longer be 
    // modified.

    // Create the defaults once
    var pluginName = 'dropbox',
        defaults = {
            url: '',
            multiple: false,
            typeAllowed: '', //mimetype allowed
            show: function(id) {}
        };

    // The actual plugin constructor
    function Plugin( element, options ) {
        this._element = element
        this.$element = $(element);

        this.options = $.extend( {}, defaults, options) ;
        
        this._defaults = defaults;
        this._name = pluginName;
        this._isDisabled = false;
        this._droppedFiles = undefined;
        this._boxBploadingClass = ".box-uploading";
        this.wrapperClass = ".wrapper";
        this.uploadMessage = $('<div class="box-uploading">Pobieranie&hellip;</div>');
        this.progressBar = $('<div class="progress"><div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%"> </div></div>');
        
        this.$wrapper = $('<div class="wrapper"></div>');
        this.$messageBox = $('<div class="message-box" role="message"></div>');
        this.$templateInit = $('<input class="box-file" type="file" name="files[]" /> \n\
        <i class="fa fa-image fa-5x image-placeholder"></i>\n\
        <div class="clearfix"></div>\n\
        <label for="file"><button class="btn btn-default btn-sm"><strong>Wybierz obrazek</strong></button><span class="dragndrop"> lub przeciągnij go tutaj</span>.</label>\n\
        ').appendTo(this.$wrapper);
        
        this.init();
        this.remove();
        
    }

    Plugin.prototype.init = function () {
        var self = this;
        var $element = this.$element
           
        this.$element.append(this.$wrapper);
        if(self.options.url.slice(-1) != '/') self.options.url = self.options.url + '/';
        
        $('.wrapper button').click(function(e) {
            e.preventDefault();
            $('input[type=file]').trigger('click');
        });
        
        this.$element.on('drag dragstart dragend dragover dragenter dragleave drop', this.$element  ,function(e) {
            e.preventDefault();
            e.stopPropagation();
          })
          .on('dragover dragenter', this.$element, function(e) {
            self.$element.addClass('is-dragover');
          })
          .on('dragleave dragend drop',this.$element, function(e) {
            self.$element.removeClass('is-dragover');
          }).on('drop change',this.$element.add('input[type="file"]'), function(e) {
              if(!self._isDisabled){ 
                  var formFile = new FormData();
                  if(e.type === "change") formFile.append('droppedFiles', $('input[type="file"]')[0].files[0] );
                    else {
                      self._droppedFiles = e.originalEvent.dataTransfer.files;
                      formFile.append('droppedFiles', self._droppedFiles[0]); 
                  };

                    $.ajax({
                    url: self.options.url,
                    type: "POST",
                    data: formFile,
                    async: true,
                    contentType:false,
                    cache: false,
                    processData: false,
                    mimeType:"multipart/form-data",

                  success: function(data){
                            $element.find('.progress-bar').removeClass('active').addClass('progress-bar-success');
                            $('.box-image').remove();

                            var response = $.parseJSON(data);
                            $element.find(self._boxBploadingClass).html(response.message);
                            
                            $('.wrapper').html('<div class="img-area">\
                <img class="img-responsive" src="'+response.path+'">\
                <button type="button" class="close" aria-label="Close" title="usuń"><span aria-hidden="true">×</span></button>\
            </div>');     
                        $element.attr('data-id',response.media_id);
                        $('input[name=media_id]').val(response.media_id);
                        console.log($element.attr('data-id'));
                    },
                    error: function(data) {
                        $element.find('.progress-bar').removeClass('active').addClass('progress-bar-danger');     
                        self.uploadMessage.html('Coś poszło nie tak, proszę spróbować później. Kod ' + data.status);
                        console.log(data.status);
                    },

                    xhr: function() {
                            var xhr = new window.XMLHttpRequest();
                            self._isDisabled = true;
                            $('.wrapper label').remove();
                            $('.wrapper').append(self.progressBar);
                             self.$messageBox.appendTo(self.$wrapper).html('Pobieranie&hellip;');
                            xhr.upload.addEventListener("progress", function(evt) {
                                if (evt.lengthComputable) {
                                    var percentComplete = (evt.loaded / evt.total)*100;
                                    //Do something with upload progress here
                                    $element.find('.progress-bar').css({'width':(percentComplete)+'%'}).text(percentComplete.toFixed(0) +'%');

                                }
                           }, false);
                           return xhr;
                        }     

                  });                    
                    
                }
          });
    };
    Plugin.prototype.remove = function (){

        var self = this;
        
        this.$element.on('click','.close',function (e) {
            var itemId = self.$element.attr('data-id');
            $.ajax({
                url: self.options.url+itemId,
                type: "DELETE",
                dataType: "json",
                success: function (data){
                    if(data.success===true){
                        $('.img-area').remove();
                        self._isDisabled = false;
                        self.$wrapper.html(self.$templateInit);
                        self.init();
                    }
                }
            });            
        });
    };
    Plugin.prototype.show = function (options) { // show saved image 
        var self = this;
        var $element = this.$element
        if(typeof  options ==='object'){
            if(options.url.slice(-1) != '/') options.url =+ '/';
            self.options.url = options.url;    
                $('.wrapper').html('<div class="img-area">\
                    <img class="img-responsive" src="'+options.imageSrc+'">\
                    <button type="button" class="close" aria-label="Close" title="usuń"><span aria-hidden="true">×</span></button>\
                </div>');     
                            $element.attr('data-id',options.id);
                            $('input[name=media_id]').val(options.id);
        } else throw console.log('Method arguments is undefinded or is not object');                
    };
    
    Plugin.prototype.prewiev = function (options) { // show saved image 
        var self = this;
        var $element = this.$element
        if(typeof  options ==='object'){
                $('.wrapper').html('<div class="img-area">\
                    <img class="img-responsive" src="'+options.imageSrc+'"></div>');     
                            $element.attr('data-id',options.id);
                            $('input[name=media_id]').val(options.id);
        } else throw console.log('Method arguments is undefinded or is not object');                
    };    
    // A really lightweight plugin wrapper around the constructor, 
    // preventing against multiple instantiations
    $.fn[pluginName] = function ( options, arg ) {
        return this.each(function () {
             var $this = $(this);
            var $plugin = $.data(this, 'plugin_' + pluginName);
            
            if (!$plugin) {
                 var $plugin = new Plugin( this, options )
                $this.data("plugin", $plugin);
               
            }
            
            if (typeof options == 'string') {
                  $plugin[options](arg);
                }
        });
    }
    

    
})( jQuery, window, document );