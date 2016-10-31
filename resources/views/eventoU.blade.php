@extends('layouts.default')
@section('content')
<div class="form-group">
	<div class="well">
	<?php 
		// var_dump(json_decode($result));
		// echo "<br><br>";
		$eventos = json_decode($result);
		$serv = $eventos->servicos;
		$lug = $eventos->lugars;
		
		// $eve =  "Nome: ".$eventos->nome."- Descrição: ".$eventos->descricao." - Data Inicial: ".$eventos->data_ini." - Data Final: ".$eventos->data_fim;
		// $s = " - Servicos:";
		//  foreach ($serv as $se) {
		//  	$s.= " Nome: ".$se->nome." - Tempo: ".$se->tempo;
		 	
		//  }
		//  $l = " - Lugares:";
		//  foreach ($lug as $lu) {
		//  	$l.= " Nome: ".$lu->nome." - Quant: ".$lu->quantidade;
		//  }
		$datei = new DateTime($eventos->data_ini);
		$datef = new DateTime($eventos->data_fim);
	
		//echo "Evento: ".$eve."<br>".$s."<br>".$l;
		

	 ?>
	 <h2>Evento</h2>
	 <h3>Nome: {{$eventos->nome}}</h3>
	 @if($eventos->descricao != '')
	 <h3>Descrição: {{$eventos->descricao}}</h3>
	 @endif
	 <h3>Data Inicial: {{$datei->format('d/m/Y H:i:s')}}</h3>
	 <h3>Data Final: {{$datef->format('d/m/Y H:i:s')}}</h3>
	 <h3>Servicos</h3>
	 <ul>
	 @foreach($serv as $se)
	 <h4><li>Nome: {{ $se->nome }} - Tempo: {{$se->tempo}}</li></h4>
	 @endforeach
	 </ul>
	 <h3>Lugares</h3>
	 <ul>
	 @foreach($lug as $lu)
	 <h4><li>Nome: {{ $lu->nome }} - Quantidade: {{$lu->quantidade}}</li></h4>
	 @endforeach
	 </ul>
	 
	</div>
	<form  action="\editar_evento" method="POST">
		<input type="hidden" name="eventoid" value="{{ $eventos->id }}">
		{{ csrf_field() }}
		<!--<input type="submit" value="Editar">-->
		<button class="btn btn-lg btn-primary btn-block" type="submit">Editar</button>
	</form>
	</div>

	<br><br><a href="/index">Volta</a>
@endsection