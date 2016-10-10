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
		$lugars = json_decode($result);
		
		echo "Nome: ".$lugars->{'nome'}."-"." Quantidade de Pessoas: ".$lugars->{'quantidade'};
		

	 ?>
	
	<form action="\editar_lugar" method="POST">
		<input type="hidden" name="lugarid" value="{{ $lugars->{'id'} }}">
		{{ csrf_field() }}
		<input type="submit" value="Editar">
		
	</form>

	<br><br><a href="/">Volta</a>
</body>
</html>