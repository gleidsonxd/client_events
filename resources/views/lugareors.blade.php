@extends('layouts.default')
@section('content')

<?php
if(isset($result)){
    $lugars = json_decode($result);
}
?>

<h1> {{ $erro or $sucesso }} </h1>
@if (isset($result))
<br><br>
<h3>Lugar</h3>
<p>Nome: {{ $lugars->nome }}</p> 
<p>Quantidade: {{ $lugars->quantidade }}</p> 
@endif
@endsection