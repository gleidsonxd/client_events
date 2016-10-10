<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edita Lugars</title>
</head>
<body>
	<?php 
		// var_dump(json_decode($result,true));
		// echo "<br><br>";
		$lugars = json_decode($result);
		
		//echo "Nome: ".$coords->{'nome'}." Email: ".$coords->{'email'};

	 ?>
	<form action="/lugars/{{ $lugars->id }}" method="POST">
		<input type="text" name="nome" value="{{ $lugars->{'nome'} }}"><br>
		<input type="number" name="quantidade" value="{{ $lugars->{'quantidade'} }}"><br>

		
		{{ csrf_field() }}
		<input type="submit" value="ATT">
		<input type="hidden" value="PUT" name="_method">
	</form>

	<form action="/lugars/{{ $lugars->id }}" method="POST">
		{{ csrf_field() }}
		<input type="submit" value="DELETAR">
		<input type="hidden" value="DELETE" name="_method">
	</form>
		
		
	</form>
	<a href="/">Volta</a>
</body>
</html>