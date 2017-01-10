@extends('layouts.default')
@section('content')
	<h1>Usuarios</h1>
	<div class="form-group">
		<div class="well">
			<ul>
			<?php 
				// var_dump(json_decode($result,true));
				// echo "<br><br>";
				$usuarios = json_decode($result);
				// foreach ($usuarios as $u) {
				// 	echo "<li><a href=".'"/usuarios/'.$u->{'id'}.'"'."> Nome: ".$u->{'nome'}."- Email: ".$u->{'email'}."- Matricula: ".$u->{'matricula'}."</a></li>";
				// }
			 ?>
			 
			 @foreach($usuarios as $u)
			 <li><a href="/usuarios/{{$u->id}}"> Nome: {{$u->nome}} | Email: {{$u->email}} | Matricula: {{$u->matricula}}</a></li>
			 @endforeach
				
			</ul>
		</div>
	</div>
<!--	<a href="/index">Volta</a>-->
@endsection