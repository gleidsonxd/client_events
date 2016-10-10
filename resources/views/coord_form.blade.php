<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Form Coord</title>
</head>
<body>
	<form action="coords" method="POST">
		
		<input type="text" name="nome" placeholder="Digite o nome"><br>
		<input type="text" name="email" placeholder="Digite o email"><br>

		{{ csrf_field() }}
		<input type="submit">
	</form>
	<a href="/">Volta</a>
</body>
</html>