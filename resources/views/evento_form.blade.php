@extends('layouts.default')
@section('content')
	
	<style type="text/css">
	.form-group{
		border-style: double; 
		margin-right:25%;
		margin-left: 25%;
		padding-left: 5%;
		padding-right:5%;
		padding-top: 1%;
		padding-bottom: 1%;
		
	}
		
	</style>
	<div class="jumbotron" style = "background-color: #999999;margin-bottom:5%; padding-top:0px;">
        <h3 style ="text-align:center">Importante</h3>    
        <ul style ="text-align:left">
        	<b><li>O evento deve ser marcado com antecedência, de acordo com o tempo dos serviços solicitados.</li></b>
          	<b><li>É necessário reservar o local do evento no SUAP.</li></b>
          	<b><li>Não marque eventos em finais de semana ou feriados.</li></b>
          	<b><li>Eventos independentes, que não necessitam dos serviços das coordenações, não poderão solicitar apoio das mesmas no futuro.</li></b>
			<b><li>Quando escolher um serviço informe a coordenação responsável como quer que o serviço seja feito.</li></b>
        </ul>
     </div>
	<h1>Cadastro Evento</h1>
	<form action="eventos" method="POST">
		
		<div class="form-group" style="">
			<label for="nome">Nome do Evento:</label>
			<input type="text" class="form-control" name="nome" id="nome" required>

			<label for="desc">Descrição do evento:</label>
	  		<textarea class="form-control" rows="5" name="desc" id="desc"></textarea>
			<?php 
				@$servicos = json_decode($results);
				$array= array();
				foreach($servicos as $servico){
					if ((in_array($servico->coord_id, $array)) == false){
						$array[$servico->coord->id] =  $servico->coord->nome;	
					}
					#echo $servico->coord->nome;
				}
				
				#var_dump($array);
			?>
		

			<label for="servicos">Servicos:</label>
		    <select class="form-control" id="servicos" name="servicos[]" multiple="multiple" style="height:150px">
		    	
				
					
			<?php foreach ($array as $key => $value) { ?>
				<optgroup label="{{ $value }}">
				@foreach(@$servicos as $servico)
					@if($servico->coord_id == $key)
						<option value="{{ @$servico->id }}"> {{ @$servico->nome }} - (Tempo: {{@$servico->tempo}} {{@$servico->tempo > 1 ?  "dias" : "dia"}})</option>	
					@endif
				@endforeach
				</optgroup>
			<?php } ?>
				
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
			<input type="datetime-local" name="data_ini" class="form-control" id="data_ini" required>
			<label for="data_fim">Data Final:</label>
			<input type="datetime-local" name="data_fim" class="form-control" id="data_fim" required><br>

			

			
	
			{{ csrf_field() }}
			<button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top:10px;width:150px;">Cadastrar</button>
		</div>
		
	</form>
	<!--<a href="/index">Volta</a>-->
@endsection