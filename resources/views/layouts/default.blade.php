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
	
	    body{
	      background-color: #c0c0c0;
	     
	      
	    }
  /*  	.jumbotron {*/
  /* 			 background-color: #00420c;*/
		/*    padding-top: 5%;*/
		    /*margin-top: 5%;*/
		    /*margin-right: 15%;*/
		    /*margin-left: 15%;*/
		/*    padding-bottom: 5%;*/
		/*    margin-bottom: 5%;*/
		    /*min-width:50%;*/
		/*}*/
		.footer {
         
      margin-top: 5%;
      /*margin-right: 15%;*/
      /*margin-left: 15%;*/
      bottom: 0;
      background-color: #00420c;
    }
    
    .form-group{
       padding-left :35%;
       padding-right: 35%;
       
       border-radius:1%;
    }
    .well{
      text-align:left;
      
      /*margin-left: -100%;*/
      /*margin-right: -100%;*/
    }
    .yield{
      text-align:center;
    }
    
    </style>
</head>
<body>
	  <div class="jumbotron" style="background-color:#00420c;padding-bottom: 5%;padding-top: 5%;">
      <div class="banner">
        
     
        <h1 style="color:white; text-align: center" style="float:right;">Campus JP - EVENTOS</h1>  
        
        
      </div>
    </div>

	<!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" > 
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
			@if(@$adm == true)
			<li class="active"><a href="\eventos">Eventos</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Coordenações <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/coords">Listar Coordenações</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="/form_coord">Cadastrar Coordenações</a></li>
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
            </li>-->
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
            
            @elseif(session('tcoord'))
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Eventos <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/eventos">Listar Eventos</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Eventos da Coordenação <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/coorduser">Listar Eventos da Coordenação</a></li>
              </ul>
            </li>
            @else
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Eventos <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/eventos">Listar Eventos</a></li>
                @if(session('logado')==1)
                <li role="separator" class="divider"></li>
                <li><a href="/form_evento">Cadastrar Eventos</a></li>
                @endif
              </ul>
            </li>
            @endif
          </ul>
          <ul class="nav navbar-nav navbar-right" style="color:white">
  	     	<?php @$email = session('email'); @$logado = session('logado'); ?>
      	     	<li role="presentation" class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          			{{ isset($email) ? $email : 'Visitante'}}<span class="caret"></span>
          			</a>
          			<ul class="dropdown-menu">
          			  
            			@if($email && session('logado')==1 && session('tcoord') != 1)
            			  <li><a href="/myacc" <span class="glyphicon glyphicon-user"></span>Perfil</a></li>
            			  <li class="divider"></li>
            			@endif
            			@if ($logado == true)
            		    <li><a href="/sair" <span class="glyphicon glyphicon-log-out"></span>Sair</a></li>
            			@else
            		    <li><a href="/mlogin"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            			@endif
                </ul>
              </li>
  			
  	     	 
	    </ul>
          
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	<div class="yield">
	<!--<?php// @$email = session('email'); @$logado = session('logado'); ?>-->
	<!--{{ isset($email) ? $email : 'Default'}}-->
	<!--@if ($logado == true)-->
	<!--<a href="/sair">Sair</a><br>-->
	<!--@else-->
	<!--<a href="/">Voltar</a><br>-->
	<!--@endif-->
	
	 @yield('content')
	 </div>
	 <footer class="footer">
      <div class="container">
        <a href="http://www.ifpb.edu.br"><h5 style="color:white; text-align: center">IFPB - Instituto Federal da Paraiba</h5></a>
      </div>
    </footer>
	 
</body>
</html>