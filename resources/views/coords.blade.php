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
		$coords = json_decode($result);
		foreach ($coords as $c) {
			echo "<li><a href=".'"/coords/'.$c->{'id'}.'"'."> Nome: ".$c->{'nome'}." Email: ".$c->{'email'}."</a></li>";
		}

	 ?>
		
	</ul>
	<a href="/">Volta</a>
</body>
</html>
