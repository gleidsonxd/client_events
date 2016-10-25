@extends('layouts.default')
@section('content')
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
			
		
	 ?>
	<form action="/eventos/{{ $eventos->id }}" method="POST">
				
		<input type="text" name="nome" value="{{ $eventos->nome }}"><br>
		<textarea rows="4" cols="50" name="desc">{{ $eventos->descricao }}</textarea><br>

		
		
		<select name="servicos[]" multiple="multiple">
		<option value="" disabled>---</option>
		
		 
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
		<!--<option value="" selected>S1</option>-->
		<!--<option value="" selected>S2</option>-->
		<!--<option value="">S3</option>-->

		</select><br>

		<select name="lugares[]" multiple="multiple">
		<option value="" disabled>---</option>
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
	
		</select><br>
		

		<input type="datetime" name="data_ini" value="{{ $eventos->data_ini }}"><br>
		<input type="datetime" name="data_fim" value="{{ $eventos->data_fim }}"><br>
		
		
		{{ csrf_field() }}
		<input type="submit" value="ATT">
		<input type="hidden" value="PUT" name="_method">
	</form>

	<form action="/eventos/{{ $eventos->id }}" method="POST">
		{{ csrf_field() }}
		<input type="submit" value="DELETAR">
		<input type="hidden" value="DELETE" name="_method">
	</form>
		
		
	</form>
	<a href="/index">Volta</a>
@endsection