
<?php $index = 1; ?>
@foreach($posts as $post)
    
<tr id="item{{$post->id}}"> <td>{{$index}}</td> <td>{{$post->title}}</td> <td>{{$post->author}}</td> <td>{{$post->created_at}}</td> <td> <a href="{{}}" class="btn btn-gray"><i class="fa fa-pencil"></i>&nbsp; edytuj</a> <button value="{{$post->id}}" data-action="delete" class="btn btn-danger "><i class="fa fa-remove"></i>&nbsp; usuń</button> </td>  </tr>
<?php ++$index ?>

@endforeach