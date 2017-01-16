@extends('layouts.default')
@section('content')

<?php
if(isset($result)){
    $servicos = json_decode($result);
}
?>

<h1> {{ $erro or $sucesso }} </h1>
@if (isset($result))
<br><br>
<h3>Serviços</h3>
<p>Nome: {{$servicos->nome}}</p>
<p>Tempo: {{$servicos->tempo}} {{$servicos->tempo > 1 ?  "dias" : "dia"}}</p>
<p>Coordenação do Servico: {{$servicos->coord->nome}}</p>
@endif
@endsection