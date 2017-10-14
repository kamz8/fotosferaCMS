<!DOCTYPE html>
<html lang="pl">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Kamil Żmijowski WebBooster">
    <meta name="_token" content="{{ csrf_token() }}">
    <title>CMS Panel Administracyjny</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/sb-admin.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">
@yield('style')


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
  
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/admin"><i class="fa fa-image"></i> &nbsp;Admin CMS</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>&nbsp; {{Auth::User()->name}} &nbsp;<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{url('admin/settings')}}"><i class="fa fa-fw fa-gear"></i> Ustawienia</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="{{url('/logout')}}"><i class="fa fa-fw fa-power-off"></i> Wyloguj</a>
                            </li>
                        </ul>
                    </li> 
                
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li  class="{{ Request::is('admin') ? 'active' : '' }}">
                        <a href="{{url('admin')}}"><i class="fa fa-fw fa-dashboard"></i> Panel Główny</a>
                    </li>
                    <li  class="{{ Request::is('admin/users') ? 'active' : '' }}">
                        <a href="{{url('admin/users')}}"><i class="fa fa-fw fa-users"></i> Urzytkownicy</a>
                    </li>    
                  
                    <li  class="{{ Request::is('admin/posts') ? 'active' : '' }}">
                        <a href="#" data-toggle="collapse" data-target="#blog" ><i class="fa fa-fw fa-thumb-tack" ></i> Blog <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="blog" class="collapse">
                            <li class="{{ Request::is('admin/posts') ? 'active' : '' }}" >
                                <a href="{{url('admin/posts')}}">Wszytkie Wpisy</a>
                            </li>
                            <li class="{{ Request::is('admin/posts/create') ? 'active' : '' }}">
                                <a href="{{url('admin/posts/create')}}">Dodaj</a>
                            </li>
                        </ul>
                    </li>   
                    <li  class="{{ Request::is('admin/posts') ? 'active' : '' }}">
                        <a href="#" data-toggle="collapse" data-target="#gallery" ><i class="fa fa-fw fa-picture-o" ></i> Galeria Zdjęć <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="gallery" class="collapse">
                            <li class="{{ Request::is('admin/albums') ? 'active' : '' }}" >
                                <a href="{{url('admin/albums')}}">Albumy</a>
                            </li>
                            <li class="{{ Request::is('admin/photos') ? 'active' : '' }}">
                                <a href="{{url('admin/photos')}}">Zdjęcia</a>
                            </li>
                        </ul>
                    </li>   
                    
                    <li  class="{{ Request::is('admin/options') ? 'active' : '' }}">
                        <a href="{{url('admin/options')}}"><i class="fa fa-fw fa-gears"></i> Ustawienia</a>
                    </li>                       
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

               @yield('content')
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('js/jquery.js')}}"></script>
    @yield('script')

        
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
     <script src="{{ asset('js/plugins/laravel-bootstrap-modal-form.js')}}"></script>
        <script>
$(document).ready(function(e){
   $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }); 
    $('#blog-toggle').dropdown('toggle');
});        

 </script> 

</body>

</html>
