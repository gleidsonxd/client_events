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
	<h1>Cadastro Coordenação</h1>
	<form action="coords" method="POST">
		
		<div class="form-group">
		<label for="nome">Nome da Coordenção:</label>
		<input type="text" class="form-control" name="nome" id="nome" >
		<label for="email">Email da Coordenção</label>
		<input type="email" name="email" id="email" class="form-control" required>
		
		<!--<input type="text" name="nome" placeholder="Digite o nome"><br>-->
		<!--<input type="text" name="email" placeholder="Digite o email"><br>-->

		{{ csrf_field() }}
		<!--<input type="submit">-->
		<button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top:10px;width:150px;">Cadastrar</button>
		</div>
	</form>
	<!--<a href="/index">Volta</a>-->
@endsection