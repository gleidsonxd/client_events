@extends('layouts.default')
@section('content')
	<style type="text/css">
		.form-group{
			border-style: double; 
			margin-right:30%;
			margin-left: 30%;
			padding-left: 10%;
			padding-right:10%;
			padding-top: 1%;
			padding-bottom: 1%;
		}
			
	</style>
<?php $email = session('email')?>
	<form action="usuarios" method="POST">
		
		<div class="form-group">
			<label for="nome">Nome do Usuario:</label>
			<input type="text" id="nome" name="nome" class="form-control" >
			<label for="matricula">Matricula:</label>
			<input type="text" id="matricula" name="matricula" class="form-control">
			<label for="email">Email:</label>
			<?php $pri = session('pri');?>
			@if($pri == true)
			<input type="email" id="email" name="email"  value="{{@$email}}" class="form-control">
			@else
			<input type="email" id="email" name="email"  class="form-control">
			@endif
	
			{{ csrf_field() }}
			<button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top:10px;width:150px;">Cadastrar</button>
		</div>
	</form>
	<a href="/index">Volta</a>
@endsection