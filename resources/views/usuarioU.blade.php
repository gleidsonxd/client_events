@extends('layouts.default')
@section('content')
<div class="form-group">
	<div class="well">
		<?php 
		// var_dump(json_decode($result,true));
		// echo "<br><br>";
		$usuarios = json_decode($result);
	//	echo "Nome: ".$usuarios->{'nome'}."- Email: ".$usuarios->{'email'}."- Matricula: ".$usuarios->{'matricula'};
	 	?>
	 	<h2>Usuario</h2>
		<h3>Nome: {{$usuarios->nome}}</h3>
		<h3>Email: {{$usuarios->email}}</h3>
		<h3>Matricula: {{$usuarios->matricula}}</h3>
	</div>
		<form action="\editar_usuario" method="POST">
			<input type="hidden" name="usuarioid" value="{{ $usuarios->{'id'} }}">
			{{ csrf_field() }}
			<button class="btn btn-lg btn-primary btn-block" type="submit">Editar</button>
			
	</form>
	</div>
	<!--<br><br><a href="/index">Volta</a>-->
@endsection