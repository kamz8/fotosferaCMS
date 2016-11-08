@extends('layouts.bootstrap')

@section('content')
<div class="col-md-5 col-md-offset-3"> 
<table class="table">
    <thead><td>Name Atrr</td><td>Value</td></thead>
    <tbody>
        @foreach($data as $key => $value)
        <tr><td>{{$key}}</td> <td>{{$value}}</td></tr>
        @endforeach
    </tbody>
</table>
</div>    
@endsection
