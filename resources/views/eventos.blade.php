<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Lista de Eventos</title>
	<!--Bootstrap-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<!--Bootstrap-->
	<!--Fullcallendar-->
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.3/fullcalendar.min.css" />
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.3/moment.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.3/fullcalendar.js"></script>
	<!--Fullcalendar-->
	
	
	<script>
		$(document).ready(function() {
		    // page is now ready, initialize the calendar...
		    $('#calendar').fullCalendar({
		    	header: {
		            left: 'prev,next today',
		            center: 'title',
		            right: 'month,agendaWeek,agendaDay'
		        },
		        editable: true,
		        events: 'feed'
		     

		    });
		});
	</script>

 	<style type="text/css">
 	    body{
	      background-color: #c0c0c0;
	    }
    	.jumbotron {
   			 background-color: #00420c;
		    padding-top: 5%;
		    /*margin-top: 5%;*/
		    margin-right: 5%;
		    margin-left: 5%;
		    padding-bottom: 5%;
		    margin-bottom: 5%;
		}
		#calendar{
		  margin-left:5%;
		  margin-right:5%;
		  background-color:#FFFFFF;
		}
		.footer {
      /*position: absolute;*/
      margin-top: 5%;
      margin-right: 5%;
		  margin-left: 5%;
      bottom: 0;
      /*width: 100%;*/
      /* Set the fixed height of the footer here */
      height: 60px;
      background-color: #00420c;
    }
    </style>
</head>
<body>
	<!--Banner-->
	
	<div class="jumbotron" style="background-color:#00420c">
      <div class="banner">
        <h1 style="color:white; text-align: center">IFPB - EVENTOS</h1>
      </div>
    </div>
    <!--Banner-->

			<!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" style="margin-left:5%;margin-right:5%;">
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
			<a href="/mlogin"><span class="glyphicon glyphicon-log-in"></span> Login</a>
			@endif
	   	 </ul>
          
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    

	<!--<?php //@$email = session('email'); @$logado = session('logado'); ?>-->
	<!--{{ isset($email) ? $email : 'Default'}}-->
	<!--@if ($logado == true)-->
	<!--<a href="/sair">Sair</a><br>-->
	<!--@else-->
	<!--<a href="/">Voltar</a><br>-->
	<!--@endif-->
	<!--Div do fullcallendar-->
	<div id='calendar'></div>
	<!--<h1>Lista</h1>-->
	
	
	<!--<ul>-->
	<!--<?php 
		// //var_dump(json_decode($result,true));
		// // echo "<br><br>";
		// $eventos = json_decode($result);
		// foreach ($eventos as $e) {
		// 	echo "<li><a href=".'"/eventos/'.$e->id.'"'."> Nome: ".$e->nome."- Descrição: ".$e->descricao." - Data Inicial: ".$e->data_ini." - Data Final: ".$e->data_fim."</a></li>";
		// }
	 ?>-->
	<!--</ul>-->
	<a href="/index">Volta</a>
	  <footer class="footer">
      <div class="container">
        <h1 style="color:white; text-align: center">Footer</h1>
      </div>
    </footer>
</body>
</html>
