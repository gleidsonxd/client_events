@extends('layouts.default')
@section('content')
	<form action="eventos" method="POST">
		
		<input type="text" name="nome" placeholder="Digite o nome"><br>
		<textarea rows="4" cols="50" placeholder="Descrição do evento" name="desc"></textarea><br>
		
		<select name="servicos[]" multiple="multiple">
			<?php 
			$servicos = json_decode($results);
				foreach ($servicos as $servico) {
			?>	

			<option value="{{ $servico->id }}"> {{ $servico->nome }}</option>
			<?php	
				}
			 ?>
		</select><br>
		<select name="lugares[]" multiple="multiple">
			<?php 
			$lugares = json_decode($resultl);
				foreach ($lugares as $lugar) {
			?>	

			<option value="{{ $lugar->id }}"> {{ $lugar->nome }}</option>
			<?php	
				}
			 ?>
		</select><br>

		<input type="datetime-local" name="data_ini"><br>
		<input type="datetime-local" name="data_fim">
		

		{{ csrf_field() }}
		<input type="submit">
	</form>
	<a href="/index">Volta</a>
@endsection