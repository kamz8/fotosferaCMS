var $form = $('.box');
var progressBar = '<div class="progress">\
  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">\
    <span class="sr-only">45% Complete</span>\
  </div>\
</div>';
var isAdvancedUpload = function() {
  var div = document.createElement('div');
  return (('draggable' in div) || ('ondragstart' in div && 'ondrop' in div)) && 'FormData' in window && 'FileReader' in window;
}();
if (isAdvancedUpload) {

  var droppedFiles = false;

  $form.on('drag dragstart dragend dragover dragenter dragleave drop', function(e) {
    e.preventDefault();
    e.stopPropagation();
  })
  .on('dragover dragenter', function() {
    $form.addClass('is-dragover');
  })
  .on('dragleave dragend drop', function() {
    $form.removeClass('is-dragover');
  })
  .on('drop', function(e) {
                  
    droppedFiles = e.originalEvent.dataTransfer.files;
                
    var formFile = new FormData();
	formFile.append('droppedFiles', droppedFiles[0]);    
	$.ajax({
	url: "api/files",
	type: "POST",
	data: formFile,
	contentType:false,
	cache: false,
	processData: false,
        mimeType:"multipart/form-data",
        before: function() {

            
            
        },
	success: function(data){
                $('.success').removeClass('hide');
                $('#prosessing').addClass('hide');
                $('#dropFile').find('.progress-bar').removeClass('active').addClass('progress-bar-success');
                $('.box-image').remove();
                                
                var response = $.parseJSON(data);
                $('.success').html(response.message);
                $('.box-input').html('<div class="img-area">\
    <img src="'+response.path+'">\
    <button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>\
</div>');        
	},
        error: function(data) {
                        
        },
           complete: function(data){
           var response = $.parseJSON(data);    
    
        },
        xhr: function() {
                var xhr = new window.XMLHttpRequest();
                
                $('.box-input').append(progressBar);
                $('#prosessing').removeClass('hide');
                $('.box-input label').remove();
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = evt.loaded / evt.total;
                        //Do something with upload progress here
                        $('#dropFile').find('.progress-bar').css({'width':(percentComplete*100)+'%'});
                        console.log(percentComplete);
                    }
               }, false);

               xhr.addEventListener("progress", function(evt) {
                   if (evt.lengthComputable) {
                       var percentComplete = evt.loaded / evt.total;
                       //Do something with download progress
                       console.log(percentComplete);
                   }
               }, false);

               return xhr;
            }     
    
      });
  });


}

$(document).on('click','button.close',function () {
    $('.img-area').remove();
});