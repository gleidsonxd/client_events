@extends('layouts.default')
@section('content')
	<h1>Lista</h1>
	<div class="form-group">
		<div class="well">
			<ul>
			<?php 
				// var_dump(json_decode($result,true));
				// echo "<br><br>";
				$servicos = json_decode($result);
				$servicos2 = json_decode($result);
				// foreach ($servicos as $s) {
				// 	echo "<li><a href=".'"/servicos/'.$s->id.'"'."> Nome: ".$s->nome."- Tempo: ".$s->tempo."</a></li>";
				// }
				
				$array= array();
				foreach($servicos as $servico){
					if ((in_array($servico->coord_id, $array)) == false){
						$array[$servico->coord->id] =  $servico->coord->nome;	
					}
					#echo $servico->coord->nome;
				}
			 ?>
			 <h3>Serviços</h3>
			 
			 @foreach($array as $key => $value)
			  {{ $value }}
				@foreach($servicos as $s)
				@if($s->coord_id == $key)
				<li><a href="/servicos/{{$s->id}}"> Nome: {{$s->nome}} | Tempo:{{$s->tempo}} {{$s->tempo > 1 ?  "dias" : "dia"}}</a></li>
				@endif
				@endforeach
			@endforeach
			
			</ul>
		</div>
	</div>
	<!--<a href="/index">Volta</a>-->
@endsection