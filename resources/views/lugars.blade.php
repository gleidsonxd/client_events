@extends('layouts.default')
@section('content')
	<h1>Locais</h1>
	<div class="form-group">
		<div class="well">
			<ul>
			<?php 
				// var_dump(json_decode($result,true));
				// echo "<br><br>";
				$lugars = json_decode($result);
				// foreach ($lugars as $l) {
				// 	echo "<li><a href=".'"/lugars/'.$l->{'id'}.'"'."> Nome: ".$l->{'nome'}." Quantidade de Pessoas: ".$l->{'quantidade'}."</a></li>";
				// }
			 ?>
			
			 @foreach($lugars as $l)
			<li><a href="/lugars/{{$l->id}}"> Nome: {{$l->nome}} | Quantidade de Pessoas: {{$l->quantidade}}</a></li>
			 @endforeach
			</ul>
		</div>
	</div>
	<!--<a href="/index">Volta</a>-->
@endsection