@extends('layouts.default')
@section('content')
	<h1>Lista</h1>
	<ul>
		
	<?php 
		// var_dump(json_decode($result,true));
		// echo "<br><br>";
		$coords = json_decode($result);
		foreach ($coords as $c) {
			echo "<li><a href=".'"/coords/'.$c->{'id'}.'"'."> Nome: ".$c->{'nome'}." Email: ".$c->{'email'}."</a></li>";
		}

	 ?>
		
	</ul>
	<a href="/index">Volta</a>
@endsection