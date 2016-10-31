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
	<form action="eventos" method="POST">
		
		<div class="form-group" style="">
			<label for="nome">Nome do Evento:</label>
			<input type="text" class="form-control" name="nome" id="nome">
			<!--<input type="text" name="nome" placeholder="Digite o nome"><br>-->
			<label for="desc">Descrição do evento:</label>
	  		<textarea class="form-control" rows="5" name="desc" id="desc"></textarea>
			<!--<textarea rows="4" cols="50" placeholder="Descrição do evento" name="desc"></textarea><br>-->
			<label for="servicos">Servicos:</label>
		    <select class="form-control" id="servicos" name="servicos[]" multiple="multiple">
		    	<?php 
				$servicos = json_decode($results);
					foreach ($servicos as $servico) {
				?>	
				<option value="{{ $servico->id }}"> {{ $servico->nome }}</option>
				<?php	
					}
				 ?>
		    </select>
			<!--<select name="servicos[]" multiple="multiple">-->
			<!--	// <?php
				// $servicos = json_decode($results);
				// 	foreach ($servicos as $servico) {
				?>	-->
	
			<!--	<option value="{{ $servico->id }}"> {{ $servico->nome }}</option>-->
			<!--	<?php
					// }
				 ?>-->
			<!--</select><br>-->
			<label for="lugares">Lugares:</label>
			<select class="form-control" id="lugares" name="lugares[]" multiple="multiple">
				<?php 
				$lugares = json_decode($resultl);
					foreach ($lugares as $lugar) {
				?>	
	
				<option value="{{ $lugar->id }}"> {{ $lugar->nome }}</option>
				<?php	
					}
				 ?>
			</select><br>
	<!--BOOTSTRAP NOS DATAPICKERS-->
			<input type="datetime-local" name="data_ini"><br>
			<input type="datetime-local" name="data_fim">
			
	
			{{ csrf_field() }}
			<button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top:10px;width:150px;">Cadastrar</button>
		</div>
		
	</form>
	<a href="/index">Volta</a>
@endsection