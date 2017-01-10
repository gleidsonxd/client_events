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
		//var_dump(json_decode($result,true));
		// echo "<br><br>";
		$eventos = json_decode($result);
		$servicos = json_decode($results);
		$lugars = json_decode($resultl);
		$serv = $eventos->servicos;
		$lug = $eventos->lugars;
		
		// EXIBIR OS SERVICOS ESCOLHIDOS MARCADOS
		foreach($servicos as $s){
			@$si .="". $s->id.",";
		}
		$si= substr($si,0,-1);
		foreach($serv as $s){
			@$ssi .="". $s->id.",";
		}
		$ssi =substr($ssi,0,-1);
		$psi = explode(",", $si);
		$pssi = explode(",", $ssi);
		$ress = array_diff($psi,$pssi);
		//FIM SERVICOS MARCADOS 
		
		// EXIBIR OS LUGARES ESCOLHIDOS MARCADOS
		foreach($lugars as $l){
			@$li .="". $l->id.",";
		}
		$li= substr($li,0,-1);
		foreach($lug as $l){
			@$lli .="". $l->id.",";
		 
		}
		$lli =substr($lli,0,-1);
		$pli = explode(",", $li);
		$plli = explode(",", $lli);
		$resl = array_diff($pli,$plli);
		//FIM LUGARES MARCADOS 
		$datei = new DateTime($eventos->data_ini);
		$datef = new DateTime($eventos->data_fim);	
	 ?>
	 <h1>Editar Evento</h1>
	<div class=" form-group">
	<form action="/eventos/{{ $eventos->id }}" method="POST">
			<label for="nome">Nome do Evento:</label>
			<input type="text" class="form-control" name="nome" id="nome" value="{{ $eventos->nome }}">
			
			<label for="criador">Criado por:</label>
			<input type="text" class="form-control"  id="criador" value="{{ $eventos->usuario->nome }}" disabled>
			<input type="hidden" value="{{ $eventos->usuario->id }}" name="criador">
			
			<label for="desc">Descrição do evento:</label>
	  		<textarea class="form-control" rows="5" name="desc" id="desc">{{ $eventos->descricao }}</textarea>
		
			<label for="servicos">Servicos:</label>
		    <select class="form-control" id="servicos" name="servicos[]" multiple="multiple">
		    	<!--<option value="" disabled>---</option>-->
				@foreach($servicos as $s)
					@foreach($pssi  as $p)
						@if($s->id == $p)
							<option value="{{ $s->id }}" selected>{{ $s->nome }}</option>
					
						@endif
					@endforeach
					@foreach($ress  as $r)
						@if($s->id == $r)
							<option value="{{ $s->id }}" >{{ $s->nome }}</option>
					
						@endif
					@endforeach
				@endforeach
		    </select>
		
			
			<label for="lugares">Lugares:</label>
			<select class="form-control" id="lugares" name="lugares[]" multiple="multiple">
				<!--<option value="" disabled>---</option>-->
				@foreach($lugars as $l)
					@foreach($plli  as $p)
						@if($l->id == $p)
							<option value="{{ $l->id }}" selected>{{ $l->nome }}</option>
					
						@endif
					@endforeach
					@foreach($resl  as $r)
						@if($l->id == $r)
							<option value="{{ $l->id }}" >{{ $l->nome }}</option>
					
						@endif
					@endforeach
				@endforeach
			</select>
	
		<!--BOOTSTRAP DATEPICKER-->
			<label for="data_ini">Data Inicial:</label>
			<input type="datetime-local" name="data_ini" value="{{ $datei->format('Y-m-d\TH:i:s') }}" class="form-control" id="data_ini">
			<label for="data_fim">Data Final:</label>
			<input type="datetime-local" name="data_fim" value="{{ $datef->format('Y-m-d\TH:i:s') }}" class="form-control" id="data_fim"><br>
			
			
			{{ csrf_field() }}
			
			<button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top:10px;width:150px;">Atualizar</button>
			<input type="hidden" value="PUT" name="_method">
			
			
	</form>

	<form action="/eventos/{{ $eventos->id }}" method="POST">
		{{ csrf_field() }}
		<!--<input type="submit" value="DELETAR">-->
		<button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top:10px;width:150px;">Deletar</button>
		<input type="hidden" value="DELETE" name="_method">
	</form>
		
	</div>		

	<!--<a href="/index">Volta</a>-->
@endsection