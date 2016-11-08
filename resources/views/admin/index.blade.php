@extends('admin.master')


@section('content')
    @include('admin.header',['header' => 'Panel Główny', 'Subheading' => 'Przegląd Statystyk'])

    
@endsection

@section('script')
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>

@endsection