<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Coord</title>
</head>
<body>
	<?php 
		// var_dump(json_decode($result,true));
		// echo "<br><br>";
		$servicos = json_decode($result);
		
		
		echo "Nome: ".$servicos->nome." - Tempo: ".$servicos->tempo." - Coord: ". $servicos->coord->nome;
		

	 ?>
	
	<form action="\editar_servico" method="POST">
		<input type="hidden" name="servicoid" value="{{ $servicos->id }}">
		{{ csrf_field() }}
		<input type="submit" value="Editar">
		
	</form>

	<br><br><a href="/">Volta</a>
</body>
</html>