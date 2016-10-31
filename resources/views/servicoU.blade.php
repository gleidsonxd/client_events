@extends('layouts.default')
@section('content')
<div class="form-group">
	<div class="well">
		<?php 
			// var_dump(json_decode($result,true));
			// echo "<br><br>";
			$servicos = json_decode($result);
			// echo "Nome: ".$servicos->nome." - Tempo: ".$servicos->tempo." - Coord: ". $servicos->coord->nome;
		 ?>
		 <h2>Serviço</h2>
		<h3>Nome: {{$servicos->nome}}</h3>
		<h3>Tempo: {{$servicos->tempo}}</h3>
		<h3>Coordenação do Servico: {{$servicos->coord->nome}}</h3>
	</div>
	
	<form action="\editar_servico" method="POST">
		<input type="hidden" name="servicoid" value="{{ $servicos->id }}">
		{{ csrf_field() }}
		<button class="btn btn-lg btn-primary btn-block" type="submit">Editar</button>
		
	</form>
	</div>

	<br><br><a href="/index">Volta</a>
@endsection