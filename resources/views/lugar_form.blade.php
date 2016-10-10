<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Form Lugar</title>
</head>
<body>
	<form action="lugars" method="POST">
		
		<input type="text" name="nome" placeholder="Digite o nome"><br>
		<input type="number" name="quantidade" value="0"><br>

		{{ csrf_field() }}
		<input type="submit">
	</form>
	<a href="/">Volta</a>
</body>
</html>