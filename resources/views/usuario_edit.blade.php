@extends('layouts.default')
@section('content')
	<style type="text/css">
		.form-group{
			border-style: double; 
			margin-right:30%;
			margin-left: 30%;
			padding-left: 10%;
			padding-right:10%;
			padding-top: 1%;
			padding-bottom: 1%;
		}
			
	</style>
	<?php 
		// var_dump(json_decode($result,true));
		// echo "<br><br>";
		$usuarios = json_decode($result);
		//echo "Nome: ".$coords->{'nome'}." Email: ".$coords->{'email'};
	 ?>
	 <h1>Editar Usuário</h1>
	<div class="form-group">
		<form action="/usuarios/{{ $usuarios->id }}" method="POST">
			<label for="nome">Nome do Usuario:</label>
			<input type="text" id="nome" name="nome" class="form-control" value="{{ $usuarios->{'nome'} }}" required>
			<label for="matricula">Matricula:</label>
			<input type="text" id="matricula" name="matricula" class="form-control" value="{{ $usuarios->{'matricula'} }}">
			<label for="email">Email:</label>
			@if(session('adm') != false)
			<input type="email" id="email" name="email"  class="form-control"value="{{ $usuarios->{'email'} }}" required>
			@else
			<input type="email" id="email" name="email"  class="form-control"value="{{ $usuarios->{'email'} }}" required disabled>
			@endif
			@if(session('adm') != false)
				<label for="coord">Coordenação:</label>
				@if($usuarios->tcoord == true)
					<input type="checkbox" name="coord" id="coord" value="coordenacao" checked>
				@else
					<input type="checkbox" name="coord" id="coord" value="coordenacao">
				@endif
					<label for="admin">Administrador:</label>
				@if($usuarios->admin == true)
					<input type="checkbox" name="admin" id="admin" value="administrador" checked>
				@else
					<input type="checkbox" name="admin" id="admin" value="administrador">
				@endif
			@endif
			
	
			
			{{ csrf_field() }}
			<button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top:10px;width:150px;">Atualizar</button>
			<input type="hidden" value="PUT" name="_method">
		</form>
		@if(@$acc != true)
		<form action="/usuarios/{{ $usuarios->id }}" method="POST">
			{{ csrf_field() }}
			<button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top:10px;width:150px;">Deletar</button>
			<input type="hidden" value="DELETE" name="_method">
		</form>
		@endif
	</div>
	<!--<a href="/index">Volta</a>-->
@endsection