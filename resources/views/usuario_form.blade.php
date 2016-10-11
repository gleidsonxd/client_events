@extends('layouts.default')
@section('content')
	<form action="usuarios" method="POST">
		
		<input type="text" name="nome" placeholder="Digite o nome"><br>
		<input type="text" name="matricula" placeholder="Digite a matricula"><br>
		<input type="email" name="email" placeholder="Digite o email"><br>

		{{ csrf_field() }}
		<input type="submit">
	</form>
	<a href="/index">Volta</a>
@endsection