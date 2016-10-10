<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Lista de Coords</title>
</head>
<body>
		
	<h1>Lista</h1>
	<ul>
		
	<?php 
		// var_dump(json_decode($result,true));
		// echo "<br><br>";
		$servicos = json_decode($result);
		foreach ($servicos as $s) {
			echo "<li><a href=".'"/servicos/'.$s->id.'"'."> Nome: ".$s->nome."- Tempo: ".$s->tempo."</a></li>";
		}

	 ?>
		
	</ul>
	<a href="/">Volta</a>
</body>
</html>
