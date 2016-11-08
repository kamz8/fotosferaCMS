<div id="userModal" class="modal fade" aria-labelledby="userModalLabel" aria-hidden="false" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Tworzenie nowego urzytkownika</h4>
            </div>
<form accept-charset="UTF-8" id="userForm" role="form">
                
                <div class="modal-body" id="userModalBody">

                    <div class="form-group">
                            <label for="name">Nazwa</label>
                            {!! Form::text('name',null,['class' => 'form-control', 'placeholder' => 'Wpisz nazwę urzytkownika']) !!}
                         </div>
                    
                        <div class="form-group">
                            <label for="email">Email</label>
                            {!! Form::text('email',null,['class' => 'form-control', 'placeholder' => 'Wpisz adres email']) !!}
                        </div>   
                    
                        <div class="form-group">
                            <label for="password">Hasło</label>
                            {!! Form::password('password', ['class'=>'form-control', 'placeholder' => 'Wpisz nowe hasło']) !!}
                        </div>  
                        <div class="form-group">
                            <label for="password_confirmation">Potwierdź hasło</label>
                            {!! Form::password('password_confirmation', ['class'=>'form-control', 'placeholder' => 'Powtórz nowe hasło']) !!}                            
                            
                        </div>   
                    
                        <div class="form-group">
                            <label for="role">Rola urzytkownika</label>
                            {{ Form::select('role',[
                                'admin' => 'Admin',
                                'moderator' => 'Moderator',
                                'normal' => 'Normalny'],
                                null,
                                ['class' => 'form-control selectpicker','placeholder' => '-- Wybierz rolę --'] 
                           ) }}                            
                        </div>   
                        <input type="hidden" id="item_id" value="0" />
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
                <button id="btn-save" class="btn btn-primary">Zapisz</button>
                </div>
</form>
                        

        </div>
    </div>
</div>


            

 