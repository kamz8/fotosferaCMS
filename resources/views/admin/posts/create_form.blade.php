

              
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
                    <div id="myDropbox" class="dropbox" ></div>                   
                   
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
              {!! Form::hidden('media_id', '') !!}
              {!! Form::close() !!}
                        
                              
