@extends('layouts.bootstrap')

@section('content')
<div class="container">
    <div class="row">
       
        <div class="col-md-10 col-md-offset-1">
            @if (session('status'))
            <div class="alert alert-danger">{{session('status')}}</div>
            @endif             
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    Your Application's Landing Page.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
