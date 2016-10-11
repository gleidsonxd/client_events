@extends('layouts.default')
@section('content')
	<h1>Lista</h1>
	<ul>
		
	<?php 
		// var_dump(json_decode($result,true));
		// echo "<br><br>";
		$lugars = json_decode($result);
		foreach ($lugars as $l) {
			echo "<li><a href=".'"/lugars/'.$l->{'id'}.'"'."> Nome: ".$l->{'nome'}." Quantidade de Pessoas: ".$l->{'quantidade'}."</a></li>";
		}

	 ?>
		
	</ul>
	<a href="/index">Volta</a>
@endsection