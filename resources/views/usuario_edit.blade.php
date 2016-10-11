@extends('layouts.default')
@section('content')
	<?php 
		// var_dump(json_decode($result,true));
		// echo "<br><br>";
		$usuarios = json_decode($result);
		
		//echo "Nome: ".$coords->{'nome'}." Email: ".$coords->{'email'};

	 ?>
	<form action="/usuarios/{{ $usuarios->id }}" method="POST">
		<input type="text" name="nome" value="{{ $usuarios->{'nome'} }}"><br>
		<input type="text" name="email" value="{{ $usuarios->{'email'} }}"><br>
		<input type="text" name="matricula" value="{{ $usuarios->{'matricula'} }}"><br>

		
		{{ csrf_field() }}
		<input type="submit" value="ATT">
		<input type="hidden" value="PUT" name="_method">
	</form>

	<form action="/usuarios/{{ $usuarios->id }}" method="POST">
		{{ csrf_field() }}
		<input type="submit" value="DELETAR">
		<input type="hidden" value="DELETE" name="_method">
	</form>
		
		
	</form>
	<a href="/index">Volta</a>
@endsection