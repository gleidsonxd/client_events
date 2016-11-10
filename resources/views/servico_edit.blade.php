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
		$servicos = json_decode($result);
		//echo "Nome: ".$coords->{'nome'}." Email: ".$coords->{'email'};
	 ?>
	 <h1>Editar Serviços</h1>
	 <div class="form-group">
		<form action="/servicos/{{ $servicos->{'id'} }}" method="POST">
			<label for="nome">Nome do Serviço:</label>
			<input type="text" id="nome" name="nome" class="form-control" value="{{ $servicos->{'nome'} }}">
			<label for="tempo">Tempo do Serviço(Dias):</label>
			<input type="number" id="tempo" name="tempo"  min="0" class="form-control" value="{{ $servicos->{'tempo'} }}">
		
			
			<label for="coord">Coordenação do serviço:</label>
			<select name="coord" id="coord" class="form-control">
				<?php 
				$coords = json_decode($resultC);
					foreach ($coords as $coord) {
						if ($coord->id == $servicos->coord->id) {
							
				?>	
	
				<option value="{{ $coord->id }}" selected> {{ $coord->nome }}</option>
				<?php 
						}else{
	
				 ?>
				<option value="{{ $coord->id }}"> {{ $coord->nome }}</option>
				<?php
						}
					}
				 ?>
			</select><br><br>

			{{ csrf_field() }}
			<button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top:10px;width:150px;">Atualizar</button>
			<input type="hidden" value="PUT" name="_method">
		</form>
	
		<form action="/servicos/{{ $servicos->id }}" method="POST">
			{{ csrf_field() }}
			<button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top:10px;width:150px;">Deletar</button>
			<input type="hidden" value="DELETE" name="_method">
		</form>
		
	</div>
	<a href="/index">Volta</a>
@endsection