@extends('layouts.default')
@section('content')
	<?php 
		// var_dump(json_decode($result,true));
		// echo "<br><br>";
		$coords = json_decode($result);
		
		//echo "Nome: ".$coords->{'nome'}." Email: ".$coords->{'email'};

	 ?>
	<form action="/coords/{{ $coords->id }}" method="POST">
		<input type="text" name="nome" value="{{ $coords->{'nome'} }}"><br>
		<input type="text" name="email" value="{{ $coords->{'email'} }}"><br>

		
		{{ csrf_field() }}
		<input type="submit" value="ATT">
		<input type="hidden" value="PUT" name="_method">
	</form>

	<form action="/coords/{{ $coords->id }}" method="POST">
		{{ csrf_field() }}
		<input type="submit" value="DELETAR">
		<input type="hidden" value="DELETE" name="_method">
	</form>
		
		
	</form>
	<a href="/index">Volta</a>
@endsection