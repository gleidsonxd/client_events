<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Lista de Coords</title>
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.3/fullcalendar.min.css" />
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.3/moment.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.3/fullcalendar.js"></script>
	
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


</head>
<body>
	
<div id='calendar'></div>
	<h1>Lista</h1>
	
	
	<ul>


		
	<?php 
		//var_dump(json_decode($result,true));
		// echo "<br><br>";
		$eventos = json_decode($result);
		foreach ($eventos as $e) {
			echo "<li><a href=".'"/eventos/'.$e->id.'"'."> Nome: ".$e->nome."- Descrição: ".$e->descricao." - Data Inicial: ".$e->data_ini." - Data Final: ".$e->data_fim."</a></li>";
		}

	 ?>
		
	</ul>
	<a href="/">Volta</a>
</body>
</html>
