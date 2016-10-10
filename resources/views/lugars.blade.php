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
		$lugars = json_decode($result);
		foreach ($lugars as $l) {
			echo "<li><a href=".'"/lugars/'.$l->{'id'}.'"'."> Nome: ".$l->{'nome'}." Quantidade de Pessoas: ".$l->{'quantidade'}."</a></li>";
		}

	 ?>
		
	</ul>
	<a href="/">Volta</a>
</body>
</html>
