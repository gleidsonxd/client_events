<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edita Servicos</title>
</head>
<body>
	<?php 
		// var_dump(json_decode($result,true));
		// echo "<br><br>";
		$servicos = json_decode($result);
		
		//echo "Nome: ".$coords->{'nome'}." Email: ".$coords->{'email'};

	 ?>
	<form action="/servicos/{{ $servicos->{'id'} }}" method="POST">
		<input type="text" name="nome" value="{{ $servicos->{'nome'} }}"><br>
		<input type="number" name="tempo" value="{{ $servicos->{'tempo'} }}"><br>
		
		<select name="coord">
			<?php 
			$coords = json_decode($resultC);
				foreach ($coords as $coord) {
					if ($coord->id == $servicos->coord->id) {
						
			?>	

			<option value="{{ $coord->id }}" selected> {{ $coord->nome }}</option>
			<?php 
					}else{

			 ?>
			<option value="{{ $coord->id }}"> {{ $coord->nome }}</option>
			<?php
					
					}
				}
			 ?>
		</select><br><br>

		
		{{ csrf_field() }}
		<input type="submit" value="ATT">
		<input type="hidden" value="PUT" name="_method">
	</form>

	<form action="/servicos/{{ $servicos->id }}" method="POST">
		{{ csrf_field() }}
		<input type="submit" value="DELETAR">
		<input type="hidden" value="DELETE" name="_method">
	</form>
		
		
	</form>
	<a href="/">Volta</a>
</body>
</html>