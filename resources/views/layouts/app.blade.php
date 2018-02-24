<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=width-device, initial-scale=1">
    <title>CHARGEBACK - @yield('title')</title>
    <!-- css -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- js -->
    <script src="jquery/dist/jquery.min.js" charset="utf-8"></script>
    <script src="{{asset('js/bootstrap.min.js')}}" charset="utf-8"></script>
  </head>
  <body>

    <nav class="navbar navbar-default navbar-fixed-top">
     <div class="container-fluid">
       <div class="navbar-header">
         <a class="navbar-brand" href="#">CHARGEBACK</a>
       </div>
       <ul class="nav navbar-nav">
         <li class="active"><a href="{{route('home')}}"> <i class="glyphicon glyphicon-home"></i> </a></li>
         <li><a href="#">Sistemas</a></li>
       </ul>
       <ul class="nav navbar-nav navbar-right">
         <li><a href="#"><span class="glyphicon glyphicon-user"></span> Cadastro</a></li>
       </ul>
     </div>
    </nav>

    <div class="container-fluid" style="margin-top: 60px;">
      <div class="col-md-2">

      </div>

      <div class="col-md-10">
        @yield('content')
      </div>
    </div>

    <nav class="navbar navbar-default navbar-fixed-bottom">
     <div class="container-fluid">
       <div class="" style="margin-top:15px;">
         <center>CHARGEBACK - 2018</center>
       </div>
     </div>
    </nav>

  </body>
</html>
