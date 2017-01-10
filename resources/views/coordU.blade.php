@extends('layouts.default')
@section('content')
<div class="form-group">
	<div class="well">
		
		<?php 
			// var_dump(json_decode($result,true));
			// echo "<br><br>";
			$coords = json_decode($result);
			// echo "Nome: ".$coords->{'nome'}."-"." Email: ".$coords->{'email'};
		 ?>
		 
		<h2>Coordenação</h2>
		<h3>Nome: {{$coords->nome}}</h3>
		<h3>Email: {{$coords->email}}</h3>
	</div>
		<form action="\editar_coord" method="POST">
			<input type="hidden" name="coordid" value="{{ $coords->{'id'} }}">
			{{ csrf_field() }}
			<button class="btn btn-lg btn-primary btn-block" type="submit">Editar</button>
			
		</form>
	</div>
	<!--<br><br><a href="/index">Volta</a>-->
@endsection