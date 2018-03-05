<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=width-device, initial-scale=1">
    <title>CHARGEBACK - @yield('title')</title>
    <!-- css -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style_geral.css')}}">
    <link rel="stylesheet" href="{{asset('jquery-toast-plugin/dist/jquery.toast.min.css')}}">
    <link rel="stylesheet" href="{{asset('datatables.net-dt/css/jquery.dataTables.min.css')}}">
    <!-- js -->
    <script src="{{asset('jquery/dist/jquery.min.js')}}" charset="utf-8"></script>
    <script src="{{asset('js/bootstrap.min.js')}}" charset="utf-8"></script>
    <script src="{{asset('js/jquery.mask.min.js')}}" charset="utf-8"></script>
    <script src="{{asset('js/script_geral.js')}}" charset="utf-8"></script>
    <script src="{{asset('jquery-toast-plugin/dist/jquery.toast.min.js')}}" charset="utf-8"></script>
    <script src="{{asset('datatables.net/js/jquery.dataTables.min.js')}}" charset="utf-8"></script>
    <script src="{{asset('sweetalert2/dist/sweetalert2.all.min.js')}}" charset="utf-8"></script>
  </head>
  <body>

    <nav class="navbar navbar-default navbar-fixed-top">
     <div class="container-fluid">
       <div class="navbar-header">
         <a class="navbar-brand" href="#">CHARGEBACK</a>
       </div>
       <ul class="nav navbar-nav">
         <li class="active"><a href="{{route('sistemas')}}"> <i class="glyphicon glyphicon-home"></i> </a></li>
       </ul>
       <ul class="nav navbar-nav navbar-right">
         @guest
         <li><a href="{{route('register')}}"><span class="glyphicon glyphicon-user"></span> Cadastro</a></li>
         @else
         <li class="nav-item dropdown">
             <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 {{ Auth::user()->name }} <span class="caret"></span>
             </a>

             <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                 <li>
                   <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                       Sair
                   </a>
                 </li>
                 <li> <a href="{{route('redefinir_senha')}}">Redefinir Senha</a> </li>

                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                     @csrf
                 </form>
             </ul>
         </li>
         @endguest
       </ul>
     </div>
    </nav>

    <div class="container-fluid" style="margin-top: 60px;">
      <div class="col-md-2">

        @guest

        @else

        <div class="menu-lateral">
          <div class="panel panel-info panel-menu-lateral" >
            <div class="panel-heading">
              Sistemas
            </div>
          </div>
          <ul>
            <li> <a href="{{route('sistemas')}}" class="btn btn-sm btn-menu"> Sistemas </a> </li>
            <li> <a href="#" class="btn btn-sm btn-menu"> Novo Sistema </a> </li>
          </ul>

          <div class="panel panel-info panel-menu-lateral">
            <div class="panel-heading">Desenvolvedores</div>
          </div>
          <ul>
            <li> <a href="{{route('desenvolvedores')}}" class="btn btn-sm btn-menu">Desenvolvedores</a> </li>
          <li> <a href="{{route('desenvolvedor_cadastro')}}" class="btn btn-sm btn-menu">Novo Desenvolvedor</a> </li>
          </ul>

          <div class="panel panel-info panel-menu-lateral">
            <div class="panel-heading">Banco de Dados</div>
          </div>
          <ul>
            <li> <a href="{{route('bancos_dados')}}" class="btn btn-sm btn-menu">Bancos de Dados</a> </li>
            <li> <a href="{{route('banco_dados_cadastro')}}" class="btn btn-sm btn-menu">Novo Banco de Dados</a> </li>
          </ul>

          <div class="panel panel-info panel-menu-lateral">
            <div class="panel-heading">Ambientes de Sistema</div>
          </div>
          <ul>
            <li> <a href="{{route('ambientes')}}" class="btn btn-sm btn-menu"> Ambientes</a> </li>
            <li> <a href="{{route('ambiente_cadastro')}}" class="btn btn-sm btn-menu">Novo Ambiente</a> </li>
          </ul>

        </div>

        @endguest

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

    @if(session('alerta'))
      <script type="text/javascript">
        toastAlert('{{session('alerta')['msg']}}', '{{session('alerta')['tipo']}}');
      </script>
    @endif

  </body>
</html>
