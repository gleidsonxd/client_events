<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Form Lugar</title>
</head>
<body>
	<form action="usuarios" method="POST">
		
		<input type="text" name="nome" placeholder="Digite o nome"><br>
		<input type="text" name="matricula" placeholder="Digite a matricula"><br>
		<input type="email" name="email" placeholder="Digite o email"><br>

		{{ csrf_field() }}
		<input type="submit">
	</form>
	<a href="/">Volta</a>
</body>
</html>