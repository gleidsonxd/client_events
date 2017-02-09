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
	<div class="jumbotron" style = "background-color: #999999;margin-bottom:5%; padding-top:0px;">
        <h3 style ="text-align:center">Importante</h3>    
        <ul style ="text-align:left">
        	<b><li>O evento deve ser marcado com antecedência, de acordo com o tempo dos serviços solicitados.</li></b>
          	<b><li>É necessário reservar o lugar no SUAP.</li></b>
          	<b><li>Não marque eventos em finais de semana ou feriados.</li></b>
          	<b><li>Eventos independentes, que não necessitam dos serviços das coordenações, não poderão solicitar apoio das mesmas no futuro.</li></b>
        </ul>
     </div>
	<h1>Cadastro Evento</h1>
	<form action="eventos" method="POST">
		
		<div class="form-group" style="">
			<label for="nome">Nome do Evento:</label>
			<input type="text" class="form-control" name="nome" id="nome" required>
			<!--<input type="text" name="nome" placeholder="Digite o nome"><br>-->
			<label for="desc">Descrição do evento:</label>
	  		<textarea class="form-control" rows="5" name="desc" id="desc"></textarea>
			<!--<textarea rows="4" cols="50" placeholder="Descrição do evento" name="desc"></textarea><br>-->
			<label for="servicos">Servicos:</label>
		    <select class="form-control" id="servicos" name="servicos[]" multiple="multiple">
		    	<?php 
				@$servicos = json_decode($results);
					foreach (@$servicos as $servico) {
				?>	
				<option value="{{ @$servico->id }}"> {{ @$servico->nome }} - (Tempo: {{@$servico->tempo}} {{@$servico->tempo > 1 ?  "dias" : "dia"}})</option>
				<?php	
					}
				 ?>
		    </select>
			
			<label for="lugares">Lugares:</label>
			<select class="form-control" id="lugares" name="lugares[]" multiple="multiple">
				<?php 
				$lugares = json_decode($resultl);
					foreach ($lugares as $lugar) {
				?>	
	
				<option value="{{ $lugar->id }}"> {{ $lugar->nome }} - (Quantidade de Pessoas: {{$lugar->quantidade}})</option>
				<?php	
					}
				 ?>
			</select>
	
			<label for="data_ini">Data Inicial:</label>
			<input  type="datetime-local" name="data_ini" class="form-control" id="data_ini" required>
			<label for="data_fim">Data Final:</label>
			<input  type="datetime-local" name="data_fim" class="form-control" id="data_fim" required><br>
			
	
			{{ csrf_field() }}
			<button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top:10px;width:150px;">Cadastrar</button>
		</div>
		
	</form>
	<!--<a href="/index">Volta</a>-->
@endsection