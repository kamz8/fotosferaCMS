<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        {!! SEO::generate(true) !!}
        <link rel="icon" href="favicon.ico">

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Main template -->
        <link href="css/main.css" rel="stylesheet">
        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="js/vendor/ie-emulation-modes-warning.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>   
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/bootstrap-social.css">        
        <meta name="csrf-token" content="{{ csrf_token() }}" />
    </head>

    <body>

        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{route('home')}}"><img class="img-responsive" style="position: absolute;top: -12px;" src="img/logo.png"></a>
                </div>
                <div id="navbar" class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li {!! Helpers::is_active('/') !!} ><a href="./">Główna</a></li>
                        <li {!! Helpers::is_active('galeria') !!} ><a href="galeria">Galeria</a></li>
                        <li {!! Helpers::is_active('o_mnie') !!} ><a href="o_mnie">O mnie</a></li>
                        <li {!! Helpers::is_active('kontakt') !!} ><a href="kontakt">Kontakt</a></li>                        
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <header class="blog-header">
            <img src="img/IMAG4999-2.jpg">
        </header> 

        <div id="main-content" class="container-fluid">
    @yield('content')
        </div><!-- /.container -->

        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 text-left">2016 Copyright © <span class="grey">|</span>&nbsp;Created by <a href="http://www.webbooster.pl" target="_blank">webbooster</a> <span class="grey">|</span></div>
                    <div id="social-media" class="col-md-4 pull-right col-xs-12 text-right"> 
                        <span id="tellus">Powiedz o nas!</span>
                        <a class="btn btn-social-icon btn-facebook"><span class="fa fa-facebook"></span></a>
                        <a class="btn btn-social-icon btn-twitter" href=""><i class="fa fa-twitter"></i></a>
                        <a class="btn btn-social-icon btn-google" href=""><i class="fa fa-google-plus"></i></a>
                    </div>
                </div>
            </div>
        </footer>

        <svg xmlns="http://www.w3.org/2000/svg" version="1.1">
        <defs>
    <filter id="blur">
        <feGaussianBlur stdDeviation="5" />
    </filter>
    </defs>
    </svg>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script>
            $(document).ready(function () {
                $(".btn-toggle").click(function (e) {
                    e.preventDefault();
                    $("#sidebar").toggleClass("toggled");
                });
            });

$(document).ready(function(e){
   $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }); 
});            
    </script>    
</body>
</html>

