@extends('layouts.default')
@section('content')
	<h1>Lista</h1>
	<ul>
		
	<?php 
		// var_dump(json_decode($result,true));
		// echo "<br><br>";
		$usuarios = json_decode($result);
		foreach ($usuarios as $u) {
			echo "<li><a href=".'"/usuarios/'.$u->{'id'}.'"'."> Nome: ".$u->{'nome'}."- Email: ".$u->{'email'}."- Matricula: ".$u->{'matricula'}."</a></li>";
		}

	 ?>
		
	</ul>
	<a href="/index">Volta</a>
@endsection