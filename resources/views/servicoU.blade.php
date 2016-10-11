@extends('layouts.default')
@section('content')
	<?php 
		// var_dump(json_decode($result,true));
		// echo "<br><br>";
		$servicos = json_decode($result);
		
		
		echo "Nome: ".$servicos->nome." - Tempo: ".$servicos->tempo." - Coord: ". $servicos->coord->nome;
		

	 ?>
	
	<form action="\editar_servico" method="POST">
		<input type="hidden" name="servicoid" value="{{ $servicos->id }}">
		{{ csrf_field() }}
		<input type="submit" value="Editar">
		
	</form>

	<br><br><a href="/index">Volta</a>
@endsection