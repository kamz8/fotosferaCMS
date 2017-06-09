

              
              <div class="form-group">
                <label for="title" class="col-sm-2 control-label">Tytuł:</label>
                <div class="col-sm-10">
                   {!! Form::text('title',null,['class' => 'form-control', 'placeholder' => 'Wprowadź tytuł',]) !!} 
                </div>
              </div>
              <div class="form-group">
                <label for="image" class="col-sm-2 control-label">Zdjęcie</label>
                <div class="col-sm-10">
                    <div id="myDropbox" class="dropbox" ></div>                   
                   
                </div>
              </div>
              <div class="form-group">
                <label for="image" class="col-sm-2 control-label"></label>
                <div class="col-sm-10">
                   {!! Form::textarea('description',null,['class' => 'form-control', ]) !!} 
                </div>
              </div>
                            
                <div class="form-group">
                    <label for="album" class="col-sm-2 control-label">Zapisz do albumu</label>
               
                    <div class="col-sm-10">
                     {{ Form::select('album_id',$albums,
                        null,
                        ['class' => 'form-control selectpicker','placeholder' => '-- Wybierz album --'] 
                   ) }}                
                   
                    </div>
                   
                </div>   
                             

              <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <button type="submit" class="btn btn-md btn-gray btn-block container">Zapisz</button>
                </div>
              </div>
              {!! Form::hidden('media_id', '') !!}
              {!! Form::close() !!}
                        
                              
