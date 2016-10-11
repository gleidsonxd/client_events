@extends('layouts.default')
@section('content')
	<?php 
		// var_dump(json_decode($result,true));
		// echo "<br><br>";
		$lugars = json_decode($result);
		
		echo "Nome: ".$lugars->{'nome'}."-"." Quantidade de Pessoas: ".$lugars->{'quantidade'};
		

	 ?>
	
	<form action="\editar_lugar" method="POST">
		<input type="hidden" name="lugarid" value="{{ $lugars->{'id'} }}">
		{{ csrf_field() }}
		<input type="submit" value="Editar">
		
	</form>

	<br><br><a href="/index">Volta</a>
@endsection