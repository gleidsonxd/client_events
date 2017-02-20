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
	<?php 
		//var_dump(json_decode($result,true));
		// echo "<br><br>";
		$eventos = json_decode($result);
		$servicos = json_decode($results);
		$lugars = json_decode($resultl);
		$serv = $eventos->servicos;
		$lug = $eventos->lugars;
		
		if ($serv != null) {
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
		}
		
		if ($lug != null) {
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
		} 
		
		 
		$datei = new DateTime($eventos->data_ini);
		$datef = new DateTime($eventos->data_fim);	

		
		$array= array();
		foreach($servicos as $servico){
			if ((in_array($servico->coord_id, $array)) == false){
				$array[$servico->coord->id] =  $servico->coord->nome;	
			}
			#echo $servico->coord->nome;
		}
				
	 ?>
	 <div class="jumbotron" style = "background-color: #999999;margin-bottom:5%; padding-top:0px;">
        <h3 style ="text-align:center">Importante</h3>    
        <ul style ="text-align:left">
        	<b><li>O evento so pode ser alterado, durante 30% do tempo do menor serviço.</li></b>
          	<b><li>É necessário reservar o local do evento no SUAP.</li></b>
          	<b><li>Não marque eventos em finais de semana ou feriados.</li></b>
          	<b><li>Eventos independentes, que não necessitam dos serviços das coordenações, não poderão solicitar apoio das mesmas no futuro.</li></b>
			<b><li>Quando escolher um serviço informe a coordenação responsável como quer que o serviço seja feito.</li></b>
        </ul>
     </div>
	 <h1>Editar Evento</h1>
	<div class=" form-group">
	<form action="/eventos/{{ $eventos->id }}" method="POST">
			<label for="nome">Nome do Evento:</label>
			<input type="text" class="form-control" name="nome" id="nome" value="{{ $eventos->nome }}" required>
			
			<label for="criador">Criado por:</label>
			<input type="text" class="form-control"  id="criador" value="{{ $eventos->usuario->nome }}" disabled>
			<input type="hidden" value="{{ $eventos->usuario->id }}" name="criador">
			
			<label for="desc">Descrição do evento:</label>
	  		<textarea class="form-control" rows="5" name="desc" id="desc">{{ $eventos->descricao }}</textarea>
		
			<label for="servicos">Servicos:</label>
			 
			@if($serv != null)
		    <select class="form-control" id="servicos" name="servicos[]" multiple="multiple" style="height:150px">
				@foreach($servicos as $s)				
					@foreach($pssi  as $p)
						@if($s->id == $p)
						<optgroup label="{{ $s->coord->nome }}">
							<option value="{{ $s->id }}" selected>{{ $s->nome }} - (Tempo: {{@$s->tempo}} {{@$servico->tempo > 1 ?  "dias" : "dia"}})</option>
						</optgroup>
						@endif
					@endforeach
					@foreach($ress  as $r)
						@if($s->id == $r)
						<optgroup label="{{ $s->coord->nome }}">
							<option value="{{ $s->id }}" >{{ $s->nome }} - (Tempo: {{@$s->tempo}} {{@$servico->tempo > 1 ?  "dias" : "dia"}})</option>
						</optgroup>
						@endif
					@endforeach	
				@endforeach
				
		    </select>
			<?php @$adm = session('adm'); ?>
			@elseif (session('adm') == true)
			<select class="form-control" id="servicos" name="servicos[]" multiple="multiple" >
				@foreach($servicos as $s)
					<option value="{{ $s->id }}" >{{ $s->nome }}</option>
				@endforeach
			</select>
			@else
			<select class="form-control" id="servicos" name="servicos[]" multiple="multiple" disabled>
				@foreach($servicos as $s)
					<option value="{{ $s->id }}" >{{ $s->nome }}</option>
				@endforeach
			</select>
			@endif
			<label for="lugares">Lugares:</label>
			@if($lug != null)
			<select class="form-control" id="lugares" name="lugares[]" multiple="multiple">
				
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
			@elseif(session('adm') == true)
			<select class="form-control" id="lugares" name="lugares[]" multiple="multiple" >
				@foreach($lugars as $l)
					<option value="{{ $l->id }}" >{{ $l->nome }}</option>
				@endforeach
			</select>
			@else
			<select class="form-control" id="lugares" name="lugares[]" multiple="multiple" disabled>
				@foreach($lugars as $l)
					<option value="{{ $l->id }}" >{{ $l->nome }}</option>
				@endforeach
			</select>
			@endif
		<!--BOOTSTRAP DATEPICKER-->
			@if(session('adm') == true)
			<label for="data_ini">Data Inicial:</label>
			<input type="datetime-local" name="data_ini" value="{{ $datei->format('Y-m-d\TH:i:s') }}" class="form-control" id="data_ini" required>
			<label for="data_fim">Data Final:</label>
			<input type="datetime-local" name="data_fim" value="{{ $datef->format('Y-m-d\TH:i:s') }}" class="form-control" id="data_fim" required><br>
			@else
			<label for="data_ini">Data Inicial:</label>
			<input type="datetime-local" name="data_ini" value="{{ $datei->format('Y-m-d\TH:i:s') }}" class="form-control" id="data_ini" required disabled>
			<label for="data_fim">Data Final:</label>
			<input type="datetime-local" name="data_fim" value="{{ $datef->format('Y-m-d\TH:i:s') }}" class="form-control" id="data_fim" required disabled><br>
			@endif
			
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

	
@endsection