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
	<form action="servicos" method="POST">
		
		<div class="form-group">
			<label for="nome">Nome do Serviço:</label>
			<input type="text" id="nome" name="nome" class="form-control">
			<label for="tempo">Quantidade de Pessoas:</label>
			<input type="number" id="tempo" name="tempo" value="0" min="0" class="form-control">
			
			<label for="coord">Coordenação do serviço:</label>
			<select name="coord" id="coord" class="form-control">
				<?php 
				$coords = json_decode($result);
					foreach ($coords as $coord) {
				?>	
	
				<option value="{{ $coord->id }}"> {{ $coord->nome }}</option>
				<?php	
					}
				 ?>
			</select><br><br>
			
	
			{{ csrf_field() }}
			<button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top:10px;width:150px;">Cadastrar</button>
		</div>
	</form>
	<a href="/index">Volta</a>
@endsection