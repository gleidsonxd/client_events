@extends('layouts.default')
@section('content')
	<?php 
		// var_dump(json_decode($result,true));
		// echo "<br><br>";
		$coords = json_decode($result);
		
		echo "Nome: ".$coords->{'nome'}."-"." Email: ".$coords->{'email'};
		

	 ?>
	
	<form action="\editar_coord" method="POST">
		<input type="hidden" name="coordid" value="{{ $coords->{'id'} }}">
		{{ csrf_field() }}
		<input type="submit" value="Editar">
		
	</form>

	<br><br><a href="/index">Volta</a>
@endsection