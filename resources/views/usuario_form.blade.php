@extends('layouts.default')
@section('content')
<?php $email = session('email')?>
	<form action="usuarios" method="POST">
		
		<input type="text" name="nome" placeholder="Digite o nome" ><br>
		<input type="text" name="matricula" placeholder="Digite a matricula"><br>
		<?php $pri = session('pri');?>
		@if($pri == true)
		<input type="email" name="email" placeholder="Digite o email" value="{{@$email}}"><br>
		@else
		<input type="email" name="email" placeholder="Digite o email"><br>
		@endif

		{{ csrf_field() }}
		<input type="submit">
	</form>
	<a href="/index">Volta</a>
@endsection