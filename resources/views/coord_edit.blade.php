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
		$coords = json_decode($result);
		//echo "Nome: ".$coords->{'nome'}." Email: ".$coords->{'email'};
	 ?>
	<div class="form-group">
		<form action="/coords/{{ $coords->id }}" method="POST">
			<label for="nome">Nome da Coordenção:</label>
			<input type="text" class="form-control" name="nome" id="nome" value="{{ $coords->{'nome'} }}" required>
			<label for="email">Email da Coordenção</label>
			<input type="text" name="email" id="email" class="form-control" value="{{ $coords->{'email'} }}" required>
			
			
			{{ csrf_field() }}
			<button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top:10px;width:150px;">Atualizar</button>
			<input type="hidden" value="PUT" name="_method">
		</form>
	
		<form action="/coords/{{ $coords->id }}" method="POST">
			{{ csrf_field() }}
			<button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top:10px;width:150px;">Deletar</button>
			<input type="hidden" value="DELETE" name="_method">
		</form>
	</div>	
		
	
	<a href="/index">Volta</a>
@endsection