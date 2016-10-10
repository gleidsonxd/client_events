<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Form Servicos</title>
</head>
<body>
	<form action="servicos" method="POST">
		
		<input type="text" name="nome" placeholder="Digite o nome"><br>
		<input type="number" name="tempo" value="0"><br>
		
		<select name="coord">
			<?php 
			$coords = json_decode($result);
				foreach ($coords as $coord) {
			?>	

			<option value="{{ $coord->id }}"> {{ $coord->nome }}</option>
			<?php	
				}
			 ?>
		</select><br><br>
		

		{{ csrf_field() }}
		<input type="submit">
	</form>
	<a href="/">Volta</a>
</body>
</html>