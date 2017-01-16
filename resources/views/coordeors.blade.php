@extends('layouts.default')
@section('content')

<?php
if(isset($result)){
    $coords = json_decode($result);
}
?>

<h1> {{ $erro or $sucesso }} </h1>
@if (isset($result))
<br><br>
<h3>Coordenação</h3>
<p>Nome: {{ $coords->nome }}</p> 
<p>Email: {{ $coords->email }}</p> 
@endif
@endsection