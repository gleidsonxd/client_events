@extends('layouts.default')
@section('content')
	<h1>Lista</h1>
	<div class="form-group">
		<div class="well">
			<ul>
			<?php 
				// var_dump(json_decode($result,true));
				// echo "<br><br>";
				$coords = json_decode($result);
				// foreach ($coords as $c) {
				// 	echo "<li><a href=".'"/coords/'.$c->{'id'}.'"'."> Nome: ".$c->{'nome'}." Email: ".$c->{'email'}."</a></li>";
				// }
			 ?>
			 <h3>Coordenações</h3>
			 @foreach($coords as $c)
			 <li><a href="/coords/{{$c->id}}"> Nome: {{$c->nome}} | Email: {{$c->email}}</a></li>
			 @endforeach
			</ul>
		</div>
	</div>
	
	<a href="/index">Volta</a>
@endsection