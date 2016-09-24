
<?php $index = 1; ?>
@foreach($users as $user)
    
<tr id="item{{$user->id}}"> <td>{{$index}}</td> <td>{{$user->name}}</td> <td>{{$user->email}}</td> <td>{{$user->role}}</td> <td> <button value="{{$user->id}}" data-action="edit" class="btn btn-gray"><i class="fa fa-pencil"></i>&nbsp; edytuj</button> <button value="{{$user->id}}" data-action="delete" class="btn btn-danger "><i class="fa fa-remove"></i>&nbsp; usuń</button> </td>  </tr>
<?php ++$index ?>

@endforeach