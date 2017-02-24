@extends('layouts.default')
@section('content')
<div class="form-group">
	<div class="well">
		<?php 
			// var_dump(json_decode($result,true));
			// echo "<br><br>";
			$lugars = json_decode($result);
			// echo "Nome: ".$lugars->{'nome'}."-"." Quantidade de Pessoas: ".$lugars->{'quantidade'};
		 ?>
		<h2>Local</h2>
		<h3>Nome: {{$lugars->nome}}</h3>
		<h3>Quantidade: {{$lugars->quantidade}}</h3>
	</div>
		<form action="\editar_lugar" method="POST">
			<input type="hidden" name="lugarid" value="{{ $lugars->{'id'} }}">
			{{ csrf_field() }}
			<button class="btn btn-lg btn-primary btn-block" type="submit">Editar</button>
			
		</form>
	</div>

	
@endsection