

              
              <div class="form-group">
                <label for="title" class="col-sm-2 control-label">Tytuł:</label>
                <div class="col-sm-10">
                   {!! Form::text('title',null,['class' => 'form-control', 'placeholder' => 'Wprowadź tytuł',]) !!} 
                </div>
              </div>
              <div class="form-group">
                <label for="tags" class="col-sm-2 control-label">Tagi:</label>
                <div class="col-sm-10">
                   {!! Form::text('tags',null,['class' => 'form-control', 'value' =>'', 'data-role' => 'tagsinput', 'id' => 'tags' ]) !!} 
                </div>
              </div>
              <div class="form-group">
                <label for="image" class="col-sm-2 control-label">Obrazek wyróżniający</label>
                <div class="col-sm-10">
                  <div class="box input-file col-xs-12">
                      <div class="box-input text-center">
                          <i class="fa fa-image fa-5x box-image"></i> <div class="clearfix"></div> 
                        <input class="box-file" type="file" name="files[]" id="file" data-multiple-caption="{count} files selected" multiple />
                        <label for="file"><strong>Wybierz obrazek</strong><span class="box-dragndrop"> lub przeciągnij go tutaj</span>.</label>
                        <div class="box-uploading">Uploading&hellip;</div>
                          <div class="box-success">Done!</div>                       
                      </div>

                  </div>                    
                   
                </div>
              </div>
              <div class="form-group">
                <label for="image" class="col-sm-2 control-label"></label>
                <div class="col-sm-10">
                   {!! Form::textarea('content',null,['class' => 'form-control', ]) !!} 
                </div>
              </div>
                            
              

              <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <button type="submit" class="btn btn-md btn-gray btn-block container">Zapisz</button>
                </div>
              </div>

              {!! Form::close() !!}
                        
                              
