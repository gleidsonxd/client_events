@extends('layouts.default')
@section('content')

<?php

if(isset($result)){
    $eventos = json_decode($result);
    $serv = $eventos->servicos;
	$lug = $eventos->lugars;
	$datei = new DateTime($eventos->data_ini);
	$datef = new DateTime($eventos->data_fim);
}
?>

<h1> {{ $erro or $sucesso }} </h1>
@if (isset($result))
<br><br>
<h3>Eventos</h3>
<p>Criado por: {{$eventos->usuario->nome}}</p>
 <p>Nome: {{$eventos->nome}}</p> 
 @if($eventos->descricao != '')
 <p>Descrição: {{$eventos->descricao}}</p>
 @endif
 <p>Data Inicial: {{$datei->format('d/m/Y H:i:s')}}</p>
 <p>Data Final: {{$datef->format('d/m/Y H:i:s')}}</p>
 <p>Servicos</p>
 <ul>
 @foreach($serv as $se)
 <h5><li>Nome: {{ $se->nome }} - Tempo: {{$se->tempo}}</li></h5>
 @endforeach
 </ul>
 <p>Lugares</p>
 <ul>
 @foreach($lug as $lu)
 <h5><li>Nome: {{ $lu->nome }} - Quantidade: {{$lu->quantidade}}</li></h5>
 @endforeach
 </ul>
@endif


@endsection