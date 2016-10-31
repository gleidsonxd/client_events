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
				// foreach ($servicos as $s) {
				// 	echo "<li><a href=".'"/servicos/'.$s->id.'"'."> Nome: ".$s->nome."- Tempo: ".$s->tempo."</a></li>";
				// }
			 ?>
			 <h3>Serviços</h3>
			 @foreach($servicos as $s)
			 <li><a href="/servicos/{{$s->id}}"> Nome: {{$s->nome}} | Tempo: {{$s->tempo}}</a></li>
			 @endforeach
			</ul>
		</div>
	</div>
	<a href="/index">Volta</a>
@endsection