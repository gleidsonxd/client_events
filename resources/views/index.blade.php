@extends('layouts.default')
@section('content')
	<!-- <a href="/mlogin">login</a><br> -->
	<?php @$adm = session('adm'); ?>
	@if($adm == true)
	<a href="/form_coord">Cadastrar Coords</a><br>
	<a href="/coords">Listar Coords</a><br><br>

	<a href="/form_lugar">Cadastrar Lugars</a><br>
	<a href="/lugars">Listar Lugars</a><br><br>

	<a href="/form_usuario">Cadastrar Usuarios</a><br>
	<a href="/usuarios">Listar Usuarios</a><br><br>

	<a href="/form_servico">Cadastrar Servicos</a><br>
	<a href="/servicos">Listar Servicos</a><br><br>

	<a href="/form_evento">Cadastrar Eventos</a><br>
	<a href="/eventos">Listar Eventos</a><br><br>
	@else
	
	<a href="/form_evento">Cadastrar Eventos</a><br>
	<a href="/eventos">Listar Eventos</a><br><br>
	@endif
@endsection	
