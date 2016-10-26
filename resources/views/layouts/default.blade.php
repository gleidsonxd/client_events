<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Eventos</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<style type="text/css">
    	.jumbotron {
   			 background-color: #00420c;
		    padding-top: 5%;
		    margin-top: 5%;
		    margin-right: 5%;
		    margin-left: 5%;
		    padding-bottom: 5%;
		    margin-bottom: 10%;
		}
    </style>
</head>
<body>
	<div class="jumbotron" style="background-color:#00420c">
      <div class="banner">
        <h1 style="color:white; text-align: center">IFPB - EVENTOS</h1>
      </div>
    </div>

	<!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="\eventos">Eventos API</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <?php @$adm = session('adm'); ?>
			@if($adm == true)
			<li class="active"><a href="\eventos">Eventos</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Coords <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/coords">Listar Coords</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="/form_coord">Cadastrar Coords</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Lugares <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/lugars">Listar Lugars</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="/form_lugar">Cadastrar Lugars</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuarios <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/usuarios">Listar Usuarios</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="/form_usuario">Cadastrar Usuarios</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Servicos <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/servicos">Listar Servicos</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="/form_servico">Cadastrar Servicos</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Eventos <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/eventos">Listar Eventos</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="/form_evento">Cadastrar Eventos</a></li>
              </ul>
            </li>
            @else
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Eventos <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/eventos">Listar Eventos</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="/form_evento">Cadastrar Eventos</a></li>
              </ul>
            </li>
            @endif
          </ul>
          <ul class="nav navbar-nav navbar-right" style="color:white">
	     	<?php @$email = session('email'); @$logado = session('logado'); ?>
			{{ isset($email) ? $email : 'Default'}}
			@if ($logado == true)
			<a href="/sair" <span class="glyphicon glyphicon-log-out"></span>Sair</a><br>
			@else
			<a href="/">Voltar</a><br>
			<li><a href="/mlogin"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			@endif
			
	     	 
	    </ul>
          
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	<div class="yield" style="text-align:center">
	<!--<?php// @$email = session('email'); @$logado = session('logado'); ?>-->
	<!--{{ isset($email) ? $email : 'Default'}}-->
	<!--@if ($logado == true)-->
	<!--<a href="/sair">Sair</a><br>-->
	<!--@else-->
	<!--<a href="/">Voltar</a><br>-->
	<!--@endif-->
	
	 @yield('content')
	 </div>
</body>
</html>