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
	<h1>Cadastro Lugar</h1>
	<form action="lugars" method="POST">
	
	<div class="form-group">
		<label for="nome">Nome do Lugar:</label>
		<input type="text" id="nome" name="nome" class="form-control">
		<label for="nome">Quantidade de Pessoas:</label>
		<input type="number" id="quantidade" name="quantidade" value="0" min="0" class="form-control">

		{{ csrf_field() }}
	
		<button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top:10px;width:150px;">Cadastrar</button>
	</div>
	</form>
	<a href="/index">Volta</a>
@endsection