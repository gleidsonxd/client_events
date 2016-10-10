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
		$usuarios = json_decode($result);
		
		echo "Nome: ".$usuarios->{'nome'}."- Email: ".$usuarios->{'email'}."- Matricula: ".$usuarios->{'matricula'};
		

	 ?>
	
	<form action="\editar_usuario" method="POST">
		<input type="hidden" name="usuarioid" value="{{ $usuarios->{'id'} }}">
		{{ csrf_field() }}
		<input type="submit" value="Editar">
		
	</form>

	<br><br><a href="/">Volta</a>
</body>
</html>