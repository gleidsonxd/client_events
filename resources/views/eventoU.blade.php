<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Coord</title>
</head>
<body>
	<?php 
		// var_dump(json_decode($result));
		// echo "<br><br>";
		$eventos = json_decode($result);
		$serv = $eventos->servicos;
		$lug = $eventos->lugars;
		
		$eve =  "Nome: ".$eventos->nome."- Descrição: ".$eventos->descricao." - Data Inicial: ".$eventos->data_ini." - Data Final: ".$eventos->data_fim;
		$s = " - Servicos:";
		 foreach ($serv as $se) {
		 	$s.= " Nome: ".$se->nome." - Tempo: ".$se->tempo;
		 	
		 }
		 $l = " - Lugares:";
		 foreach ($lug as $lu) {
		 	$l.= " Nome: ".$lu->nome." - Quant: ".$lu->quantidade;
		 }
		 
		echo "Evento: ".$eve."<br>".$s."<br>".$l;
		

	 ?>
	
	<form action="\editar_evento" method="POST">
		<input type="hidden" name="eventoid" value="{{ $eventos->id }}">
		{{ csrf_field() }}
		<input type="submit" value="Editar">
		
	</form>

	<br><br><a href="/">Volta</a>
</body>
</html>