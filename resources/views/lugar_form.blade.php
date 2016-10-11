@extends('layouts.default')
@section('content')
	<form action="lugars" method="POST">
		
		<input type="text" name="nome" placeholder="Digite o nome"><br>
		<input type="number" name="quantidade" value="0"><br>

		{{ csrf_field() }}
		<input type="submit">
	</form>
	<a href="/index">Volta</a>
@endsection