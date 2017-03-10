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
				
			 ?>
			 
			 @foreach($usuarios as $u)
			 @if($u->admin == true)
			 <li><a href="/usuarios/{{$u->id}}" style="color:red"> Nome: {{$u->nome}} | Email: {{$u->email}} | Matricula: {{$u->matricula}}</a></li>
			 @elseif($u->tcoord == true)
			 <li><a href="/usuarios/{{$u->id}}" style="color:green"> Nome: {{$u->nome}} | Email: {{$u->email}} | Matricula: {{$u->matricula}}</a></li>
			 @else
			 <li><a href="/usuarios/{{$u->id}}"> Nome: {{$u->nome}} | Email: {{$u->email}} | Matricula: {{$u->matricula}}</a></li>
			 @endif
			 @endforeach
				
			</ul>
		</div>
	</div>

@endsection