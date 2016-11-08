<ul class="page-breadcrumb">
<li>
  <i class="fa fa-home"></i>
  <a href="{{route('home')}}">Home</a>
  <i class="fa fa-angle-right"></i>
</li>
@for($i = 0; $i <= count(Request::segments()); $i++)
<li>
  <a href="">{{Request::segment($i)}}</a>
  @if($i < count(Request::segments()) & $i > 0)
    {!!'<i class="fa fa-angle-right"></i>'!!}
  @endif
</li>
@endfor
</ul>